<?php

namespace App\Http\Controllers;

use App\Models\AppointmentSchedule;
use App\Models\Payment;
use App\Models\SlotTime;
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

            $paymentObject =   Charge::create([
                "amount" => intval($slotData->amount) * 100,
                "currency" => "usd",
                "source" => $token->id,
                "description" => "Schedule Payment"
            ]);

            if ($paymentObject->status == 'succeeded') {
                Payment::create([
                    'user_id' => Auth::id(),
                    'status' => $paymentObject->status,
                    'slot_id' => $slot_id,
                    'transaction_id' => $paymentObject->id,
                ]);
                $slotData->booking_status = 0;
                $slotData->save();
                toastr()->success('Your appointment has been scheduled');
                // yaha pr user ko redirect krwana hai user dashboard me
            } {
                toastr()->error('Card is not verified');
                return redirect()->back();
            }

            AppointmentSchedule::create([
                'user_id' => Auth::id(),
                'doctor_id' => $slotData->user_id,
                'slot_id' => $slotData->id,
            ]);
        } else {
            toastr()->error('Appointment is not available right now');
        }

        return back();
    }
}
