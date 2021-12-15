<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use App\Models\CouponUsage;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Coupon;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupons::latest()->get();
        $doctors = User::where('role', 'doctor')->get();
        return view('coupons.index', compact('coupons', 'doctors'));
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

        Coupons::create([
            'coupon_code' => $this->generateCouponCode(),
            'coupon_value' => $request->value,
            'coupon_max_uses' => $request->max_uses,
            'doctor_id' => $request->doctor,
            'coupon_status' => 'active',
            'method' => $request->method
        ]);
        toastr()->success('Coupon created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function show(Coupons $coupons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupons $coupons)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupons $coupons)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupons $coupons)
    {
        //
    }

    public function generateCouponCode($length = 8)
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $ret = '';
        for ($i = 0; $i < $length; ++$i) {
            $random = str_shuffle($chars);
            $ret .= $random[0];
        }
        return $ret;
    }

    public function couponToggle($id)
    {
        $coupon = Coupons::findorFail($id);
        if ($coupon) {
            if ($coupon->coupon_status == 'active')
                $coupon->coupon_status = 'not-active';
            else
                $coupon->coupon_status = 'active';

            $coupon->save();
            toastr()->success('Coupon status changed successfully');
        } else {
        }

        return redirect()->back();
    }

    /****************
     * 
     * DOCTOR_ID
     * COUPON CODE
     * 
     */

    public function checkCouponValid(Request $request)
    {
        $coupon = Coupons::where('coupon_code', $request->coupon_code)->first();
        $couponUsage = CouponUsage::where('coupon_id', $coupon->id)->get()->count();
        if ($coupon && $coupon->coupon_status == 'active' && $couponUsage < $coupon->coupon_max_uses) {
            if ($coupon->doctor_id == 'all') {
                return response()->json([
                    'success' => true,
                    'data' => $coupon,
                    'message' => 'You got a discount',
                ]);
            } else if (intval($coupon->doctor_id) == $request->doctor_id) {
            } else {
                return response()->json([
                    'success' => false,
                    'data' => [],
                    'message' => 'Coupon code is invalid'
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'data' => [],
                'message' => 'Coupon code is invalid'
            ]);
        }
    }
}
