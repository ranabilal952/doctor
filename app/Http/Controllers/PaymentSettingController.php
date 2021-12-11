<?php

namespace App\Http\Controllers;

use App\Models\PaymentSetting;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class PaymentSettingController extends Controller
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
        $paymentSetting = PaymentSetting::latest()->first();
        return view('PaymentSettings.create', compact('paymentSetting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputField = $request->except('_token');
        if (PaymentSetting::all()->count() > 0) {
            PaymentSetting::latest()->update($inputField);
            toastr()->success('Payment Settings Updated Successfully ');
        } else {
            PaymentSetting::create($request->all());
            toastr()->success('Payment Settings Saved Successfully ');
        }
        return redirect('/payment-setting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentSetting  $paymentSetting
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentSetting $paymentSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentSetting  $paymentSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentSetting $paymentSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentSetting  $paymentSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentSetting $paymentSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentSetting  $paymentSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentSetting $paymentSetting)
    {
        //
    }
}
