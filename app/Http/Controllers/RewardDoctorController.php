<?php

namespace App\Http\Controllers;

use App\Models\PaymentTransaction;
use App\Models\RewardDoctor;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;

class RewardDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::where('role', 'doctor')->get();
        $rewards = RewardDoctor::with('user')->get();
        return view('rewards.index', compact('doctors', 'rewards'));
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

        $rewardDoctor = RewardDoctor::create([
            'amount' => doubleval($request->amount),
            'doctor_id' => intval($request->doctor_id),
            'reason' => $request->reason,
        ]);

        $adminToDoc =     PaymentTransaction::create([
            'from_user_id' => 1,
            'to_user_id' => $rewardDoctor->doctor_id,
            'amount' => doubleval($rewardDoctor->amount),
            'payment_type' => 'Reward From Admin',
        ]);

        $wallet = wallet::where('user_id', $rewardDoctor->doctor_id)->first();
        $wallet->total_balance += doubleval($rewardDoctor->amount);
        $wallet->available_balance += doubleval($rewardDoctor->amount); // don't need to put in pending because, its comes from admin
        $wallet->save();
        toastr()->success('Reward has been sent successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RewardDoctor  $rewardDoctor
     * @return \Illuminate\Http\Response
     */
    public function show(RewardDoctor $rewardDoctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RewardDoctor  $rewardDoctor
     * @return \Illuminate\Http\Response
     */
    public function edit(RewardDoctor $rewardDoctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RewardDoctor  $rewardDoctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RewardDoctor $rewardDoctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RewardDoctor  $rewardDoctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(RewardDoctor $rewardDoctor)
    {
        //
    }
}
