<?php

namespace App\Http\Controllers;

use App\Models\OnlineStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlineStatusController extends Controller
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
        $onlineStatus = OnlineStatus::where('user_id', Auth::id())->first();
        return view('status.index', compact('onlineStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        request()->validate([
            'is_active' => 'required',
            // 'online_from' => 'required_if:is_active,active',
            // 'online_to' => 'required_if:is_active,active|after:online_from',
        ]);
        $onlineStatus = OnlineStatus::where('user_id', Auth::id())->first();
        if ($onlineStatus) {
            $requestData = $request->all();
            $requestData['is_active'] = $request->is_active == 'active' ? true : false;
            $onlineStatus->update($requestData);
        } else {
            OnlineStatus::create([
                'is_active' => $request->is_active == 'active' ? true : false,
                'online_from' => $request->online_from,
                'online_to' => $request->online_to,
                'schedule_days' => implode($request->schedule_days),
                'instant_30_minutes_amount' => $request->instant_30_minutes_amount,
                'instant_60_minutes_amount' => $request->instant_60_minutes_amount,
                'user_id' => Auth::id(),
            ]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OnlineStatus  $onlineStatus
     * @return \Illuminate\Http\Response
     */
    public function show(OnlineStatus $onlineStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OnlineStatus  $onlineStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(OnlineStatus $onlineStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OnlineStatus  $onlineStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OnlineStatus $onlineStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OnlineStatus  $onlineStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(OnlineStatus $onlineStatus)
    {
        //
    }
}
