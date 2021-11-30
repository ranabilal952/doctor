<?php

namespace App\Http\Controllers;

use App\Models\SlotTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SlotTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slotTimes=SlotTime::all();
        return view('slottime.index')->with(compact('slotTimes'));
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
        $request->merge((['user_id' => Auth::id()]));
        SlotTime::create($request->all());
        toastr()->success('Time added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SlotTime  $slotTime
     * @return \Illuminate\Http\Response
     */
    public function show(SlotTime $slotTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SlotTime  $slotTime
     * @return \Illuminate\Http\Response
     */
    public function edit(SlotTime $slotTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SlotTime  $slotTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SlotTime $slotTime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SlotTime  $slotTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(SlotTime $slotTime)
    {
        //
    }
}
