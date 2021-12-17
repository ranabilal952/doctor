<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentLinks;
use App\Models\PaymentTransaction;
use App\Models\User;
use App\Models\wallet;
use Error;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::where('role', 'doctor')->get();
        $paymentLinks = PaymentLinks::with('user')->orderBy('id', 'DESC')->get();
        // dd($paymentLinks);
        return view('admin.doctor.paymentLinks.index', compact('doctors', 'paymentLinks'));
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
        $doctorId = intval($request->doctor_id);
        $amount = $request->amount;
        PaymentLinks::create([
            'doctor_id' => $doctorId,
            'amount' => $amount,
        ]);

        toastr()->success('Payment Link Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentLinks  $paymentLinks
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentLinks $paymentLinks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentLinks  $paymentLinks
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentLinks $paymentLinks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentLinks  $paymentLinks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentLinks $paymentLinks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentLinks  $paymentLinks
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentLinks $paymentLinks)
    {
        //
    }

    public function showPaymentAccordingToLink($id)
    {

        $paymentLink = PaymentLinks::findorFail($id);
        return view('admin.doctor.paymentLinks.link_payment')->with('paymentLink', $paymentLink);
    }

    public function storeLinkPayment(Request $request)
    {



        $paymentLink = PaymentLinks::findorFail($request->payment_link_id);
        $amount = intval($paymentLink->amount);

        $totalAmount  = $amount;
        $doctorCommission = $totalAmount * 0.40;
        if ($paymentLink) {

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET'),
            );

            try {
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
                    "description" => "Link Payment for appointment "
                ]);
            } catch (\Exception $e) {
                toastr()->error($e->getMessage());
                return redirect()->back();
            }

            $userToDoc = PaymentTransaction::create([
                'from_user_id' => -2,
                'to_user_id' => $paymentLink->doctor_id,
                'amount' => $totalAmount - $doctorCommission,
                'payment_type' => 'link payment',
                'email' => $request->email,
                'phone_no' => $request->phone_no
            ]);


            $userToAdmin = PaymentTransaction::create([
                'from_user_id' => -2,
                'to_user_id' => 1,
                'amount' => $totalAmount,
                'payment_type' => 'link payment',
                'email' => $request->email,
                'phone_no' => $request->phone_no
            ]);


            if ($paymentObject->status == 'succeeded') {
                $userToDoc->status = 'pending';
                $userToDoc->save();
                $userToAdmin->status = 'succeeded';
                $userToAdmin->save();

                $doctorWallet = wallet::where('user_id', $paymentLink->doctor_id)->first();
                $doctorWallet->total_balance += doubleval($amount);
                $doctorWallet->pending_balance += doubleval($amount);
                $doctorWallet->save();;
                // storing data in admin wallet

                $adminWallet = wallet::where('user_id', 1)->first();
                $adminWallet->total_balance += $doctorCommission;
                $adminWallet->save();


                toastr()->success('Payment has been done, We will contact you ASAP.');
            } else {
                //  PAYMENT HAS SOME ERRORS
                toastr()->error('We are facing some issues right now');
            }
        } else {

            // PAYMENT LINK NOT FOUND
            toastr()->error('Service Not Available Right Now');
        }

        return redirect('/');
    }
}
