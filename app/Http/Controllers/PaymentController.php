<?php

namespace App\Http\Controllers;

use App\Models\AppointmentSchedule;
use App\Models\Payment;
use App\Models\PaymentTransaction;
use App\Models\SlotTime;
use App\Models\wallet;
use Illuminate\Contracts\Session\Session;
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
        $slot_id = $request->slot_id;
        $slotData = SlotTime::find($slot_id);
        $doctorCommission = intval($slotData->amount) - (intval($slotData->amount) * 0.40);
        $totalAmount = intval($slotData->amount) + $doctorCommission;
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
                'amount' => $slotData->amount
            ]);
            //this is doctor to admin transaction
            $docToAdmin =    PaymentTransaction::create([
                'from_user_id' => Auth::id(),
                'to_user_id' => 1,
                'amount' => $slotData->amount
            ]);

            if ($paymentObject->status == 'succeeded') {

                $userToDoc->status = 'pending';
                $userToDoc->save();
                $docToAdmin->status = 'succeeded';
                $docToAdmin->save();

                // storing data in doctor wallet
                $doctorWallet = wallet::where('user_id', $slotData->user_id)->first();
                $doctorWallet->total_balance += doubleval($slotData->amount);
                $doctorWallet->pending_balance += doubleval($slotData->amount);
                $doctorWallet->save();;
                // storing data in admin wallet

                $adminWallet = wallet::where('user_id', 1)->first();
                $adminWallet->total_balance += $doctorCommission;
                $adminWallet->save();
                // $doctorWallet->pending_balance += doubleval($slotData->amount);

                $appointmentData = AppointmentSchedule::create([
                    'user_id' => Auth::id(),
                    'doctor_id' => $slotData->user_id,
                    'slot_id' => $slotData->id,
                ]);

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

        return back();
    }
}
