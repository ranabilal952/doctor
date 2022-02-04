<?php

namespace App\Http\Controllers;

use App\Models\AppointmentSchedule;
use App\Models\Coupons;
use App\Models\CouponUsage;
use App\Models\Payment;
use App\Models\PaymentSetting;
use App\Models\PaymentTransaction;
use App\Models\SlotTime;
use App\Models\wallet;
use App\Models\Withdraw;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function stripePost(Request $request)
    {
        $totalAmount = null;
        $siteTax = PaymentSetting::first()->value('site_fee');
        $scheduleAmount = 0.0;
        $adminCommission = 0.0;
        if ($request->has('bookInstantly')) {

            $scheduleAmount = intval($request->amount);
            $totalAmount = $scheduleAmount;
            $adminCommission = ($totalAmount *  0.40);
            $doctor_id = intval($request->doctor_id);

            if ($scheduleAmount <= 200) {
                $totalAmount += $siteTax;
            }

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET'),
            );
            $token =    $stripe->tokens->create([
                'card' => [
                    'number' => $request->card_number,
                    'exp_month' => $request->expiry_month,
                    'exp_year' => $request->year,
                    'cvc' => $request->cvc,
                ],
            ]);

            //admin will get this payment
            $paymentObject =   Charge::create([
                "amount" => $totalAmount * 100,
                "currency" => "usd",
                "source" => $token->id,
                "description" => "Schedule Payment"
            ]);

            $userToDoc =     PaymentTransaction::create([
                'from_user_id' => Auth::id(),
                'to_user_id' => $doctor_id,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'amount' => doubleval($totalAmount - $adminCommission) - $siteTax,
                'payment_type' => 'appointment',
                'site_tax' => $siteTax,

            ]);
            //this is doctor to admin transaction
            $docToAdmin =    PaymentTransaction::create([
                'from_user_id' => Auth::id(),
                'to_user_id' => 1,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'amount' => doubleval($totalAmount),
                'payment_type' => 'appointment',
                'site_tax' => $siteTax,


            ]);

            if ($paymentObject->status == 'succeeded') {

                $userToDoc->status = 'pending';
                $userToDoc->save();
                $docToAdmin->status = 'succeeded';
                $docToAdmin->save();

                // storing data in doctor wallet
                $doctorWallet = wallet::where('user_id', $doctor_id)->first();
                $doctorWallet->total_balance += doubleval($totalAmount - $adminCommission) - $siteTax;
                $doctorWallet->pending_balance += doubleval($totalAmount - $adminCommission) - $siteTax;
                $doctorWallet->save();;
                // storing data in admin wallet

                $adminWallet = wallet::where('user_id', 1)->first();
                $adminWallet->total_balance += $adminCommission;
                $adminWallet->save();
                // $doctorWallet->pending_balance += doubleval($slotData->amount);

                $appointmentData = AppointmentSchedule::create([
                    'user_id' => Auth::id(),
                    'doctor_id' => $doctor_id,
                    'slot_id' => -9,
                ]);


                $userToDoc->appointment_schedule_id = $appointmentData->id;
                $userToDoc->save();
                $docToAdmin->appointment_schedule_id = $appointmentData->id;
                $docToAdmin->save();

                //this is our local DB
                Payment::create([
                    'user_id' => Auth::id(),
                    'status' => $paymentObject->status,
                    'slot_id' => -9,
                    'transaction_id' => $paymentObject->id,
                    'appointment_schedule_id' => $appointmentData->id,
                    'total_paid' => $totalAmount,
                ]);

               


                $account_sid = getenv("TWILIO_SID");
                $auth_token = getenv("TWILIO_AUTH_TOKEN");
                $twilio_number = getenv("TWILIO_NUMBER");
                // $message = "Your appointment has been scheduled.\nAppointment Date&Time = " . $slotData->date_from . ' ' . $slotData->time;
                // $client = new Client($account_sid, $auth_token);
                // $client->messages->create(
                //     '+923040532318',
                //     ['from' => $twilio_number, 'body' => $message]
                // );


                toastr()->success('Your appointment has been scheduled');
                $randomNumber = md5(rand(100, 5000));

                return redirect('generateMeeting/'.$randomNumber);
                // yaha pr user ko redirect krwana hai user dashboard me
            } else {
                toastr()->error('Card is not verified');
                return redirect()->back();
            }
        } else {


            $slot_id = $request->slot_id;
            $slotData = SlotTime::find($slot_id);

            $couponUsage = new CouponUsage();
            $isCouponApplied = false;
            $appliedCouponId = intval($request->couponId);
            $scheduleAmount = intval($slotData->amount);
            $totalAmount = $scheduleAmount;



            $adminCommission = ($totalAmount *  0.40);

            if ($scheduleAmount <= 200) {
                $totalAmount += $siteTax;
            }


            if ($request->isCouponApplied == 'true') {
                $coupon = Coupons::findorFail($appliedCouponId);
                //first we have to subtract coupon discount
                if ($coupon->method == 'percent') {
                    $totalAmount = $totalAmount - ($totalAmount * (intval($coupon->coupon_value) / 100));
                } else {
                    $totalAmount = $totalAmount - (intval($coupon->coupon_value));
                }
                $adminCommission = ($totalAmount *  0.40);
                $couponUsage->coupon_id = $appliedCouponId;
                $isCouponApplied = true;
            }

            if ($slot_id) {
                Stripe::setApiKey(env('STRIPE_SECRET'));
                $stripe = new \Stripe\StripeClient(
                    env('STRIPE_SECRET'),
                );
                $token =    $stripe->tokens->create([
                    'card' => [
                        'number' => $request->card_number,
                        'exp_month' => $request->expiry_month,
                        'exp_year' => $request->year,
                        'cvc' => $request->cvc,
                    ],
                ]);

                //admin will get this payment
                $paymentObject =   Charge::create([
                    "amount" => $totalAmount * 100,
                    "currency" => "usd",
                    "source" => $token->id,
                    "description" => "Schedule Payment"
                ]);

                // Storing Transactions

                //this is user to doctor Transaction
                $userToDoc =     PaymentTransaction::create([
                    'from_user_id' => Auth::id(),
                    'to_user_id' => $slotData->user_id,
                    'email' => $request->email,
                    'phone_no' => $request->phone_no,
                    'amount' => doubleval($totalAmount - $adminCommission) - $siteTax,
                    'payment_type' => 'appointment',
                    'site_tax' => $siteTax,

                ]);
                //this is doctor to admin transaction
                $docToAdmin =    PaymentTransaction::create([
                    'from_user_id' => Auth::id(),
                    'to_user_id' => 1,
                    'email' => $request->email,
                    'phone_no' => $request->phone_no,
                    'amount' => doubleval($totalAmount),
                    'payment_type' => 'appointment',
                    'site_tax' => $siteTax,


                ]);

                if ($paymentObject->status == 'succeeded') {

                    $userToDoc->status = 'pending';
                    $userToDoc->save();
                    $docToAdmin->status = 'succeeded';
                    $docToAdmin->save();

                    // storing data in doctor wallet
                    $doctorWallet = wallet::where('user_id', $slotData->user_id)->first();
                    $doctorWallet->total_balance += doubleval($totalAmount - $adminCommission) - $siteTax;
                    $doctorWallet->pending_balance += doubleval($totalAmount - $adminCommission) - $siteTax;
                    $doctorWallet->save();;
                    // storing data in admin wallet

                    $adminWallet = wallet::where('user_id', 1)->first();
                    $adminWallet->total_balance += $adminCommission;
                    $adminWallet->save();
                    // $doctorWallet->pending_balance += doubleval($slotData->amount);

                    $appointmentData = AppointmentSchedule::create([
                        'user_id' => Auth::id(),
                        'doctor_id' => $slotData->user_id,
                        'slot_id' => $slotData->id,
                    ]);

                    if ($isCouponApplied) {
                        $couponUsage->appointment_schedule_id = $appointmentData->id;
                        $couponUsage->used_by = Auth::id();
                        $couponUsage->save();
                    }

                    $userToDoc->appointment_schedule_id = $appointmentData->id;
                    $userToDoc->save();
                    $docToAdmin->appointment_schedule_id = $appointmentData->id;
                    $docToAdmin->save();

                    //this is our local DB
                    Payment::create([
                        'user_id' => Auth::id(),
                        'status' => $paymentObject->status,
                        'slot_id' => $slot_id,
                        'transaction_id' => $paymentObject->id,
                        'appointment_schedule_id' => $appointmentData->id,
                        'total_paid' => $totalAmount,
                    ]);

                    $slotData->booking_status = 0;
                    $slotData->save();


                    $account_sid = getenv("TWILIO_SID");
                    $auth_token = getenv("TWILIO_AUTH_TOKEN");
                    $twilio_number = getenv("TWILIO_NUMBER");
                    $message = "Your appointment has been scheduled.\nAppointment Date&Time = " . $slotData->date_from . ' ' . $slotData->time;
                    $client = new Client($account_sid, $auth_token);
                    $client->messages->create(
                        '+923040532318',
                        ['from' => $twilio_number, 'body' => $message]
                    );


                    toastr()->success('Your appointment has been scheduled');
                    return redirect('get-next-session');
                    // yaha pr user ko redirect krwana hai user dashboard me
                } else {
                    toastr()->error('Card is not verified');
                    return redirect()->back();
                }
            } else {
                toastr()->error('Appointment is not available right now');
            }
        }
        return back();
    }

    public function getDoctorsPendingAmount()
    {
        $transactions = PaymentTransaction::where('to_user_id', '!=', 1)->where('status', 'pending')->with('doctorData')->get();
        return view('payments.pending', compact('transactions'));
    }

    public function approvePendingBalance($id)
    {
        $transaction = PaymentTransaction::with('doctorData')->findOrFail($id);
        if ($transaction) {

            $wallet = wallet::where('user_id', $transaction->to_user_id)->first();
            $wallet->available_balance += doubleval($transaction->amount);
            $wallet->pending_balance -= doubleval($transaction->amount);
            $transaction->status = 'approved';
            $wallet->save();
            $transaction->save();
            toastr()->success('Request has been approved');
        } else {
            toastr()->error('Some Error Occured');
        }

        return redirect()->back();
    }

    public function saveWithDrawRequest(Request $request)
    {
        // WithdrawAmount

        $withdrawAmount = doubleval($request->withdraw_amount);

        if (($withdrawAmount) > 50) {
            $wallet = wallet::where('user_id', Auth::id())->first();
            if ($wallet->available_balance >= $withdrawAmount) {
                Withdraw::create([
                    'user_id' => Auth::id(),
                    'withdraw_amount' => $withdrawAmount,
                ]);

                $wallet->available_balance -= $withdrawAmount;
                $wallet->save();


                toastr()->success('Your withdraw request has been received');
            } else {
                toastr()->error('You have insufficient available balance');
            }
        } else {
            toastr()->error('Your withdraw amount is less then the limit');
        }

        return redirect()->back();
    }

    public function getWithdrawRequest()
    {
        $withdrawRequest = Withdraw::where('status', 'pending')->with('user')->get();
        return view('admin.doctor.withdraw.index')->with('withdrawRequest', $withdrawRequest);
    }

    public function approveWithDrawRequest($id)
    {
        $withDraw = Withdraw::findorfail($id);

        $withDraw->status = 'withdrawn';
        $withDraw->save();


        toastr()->success('Amount has been transferred successfully');
        return redirect()->back();

        //we have to transfer the amount to other account
    }
}
