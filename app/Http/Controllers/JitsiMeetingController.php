<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\JitsiMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JitsiMeetingController extends Controller
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
        $randomNumber = md5(rand(100, 5000));
        $serverURL = env('Video_Server_URL');

        $meetingLink = $serverURL . $randomNumber;
        return redirect()->to($meetingLink);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JitsiMeeting  $jitsiMeeting
     * @return \Illuminate\Http\Response
     */
    public function show(JitsiMeeting $jitsiMeeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JitsiMeeting  $jitsiMeeting
     * @return \Illuminate\Http\Response
     */
    public function edit(JitsiMeeting $jitsiMeeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JitsiMeeting  $jitsiMeeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JitsiMeeting $jitsiMeeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JitsiMeeting  $jitsiMeeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(JitsiMeeting $jitsiMeeting)
    {
        //
    }

    public function getIntoMeeting(Request $request)
    {
        $appointment = Appointment::findorfail($request->appointment_id);
        $appointment = $appointment::with(['user', 'doctor'])->first();
        $serverURL = env('Video_Server_URL');
        $currentUser = Auth::user();
        $alreadyLinkPresent =   JitsiMeeting::where('appointment_id', $request->appointment_id)->first();
        if (!$alreadyLinkPresent && $appointment) {
            JitsiMeeting::create([
                'appointment_id' => $appointment->id,
                'meeting_link' => $serverURL . $appointment->user->name . '/' . $appointment->doctor->name,
            ]);
        }
        return view('jitsi.index')->with(compact('appointment', 'currentUser'));
    }

    public function changeMeetingStatus(Request $request)
    {
        $meeting =  JitsiMeeting::where('appointment_id', $request->appointment_id)->first();
        $appointment = Appointment::findorFail($request->appointment_id);
        if ($appointment) {
            $appointment->status = 'completed';
            $appointment->save();
        }
        if ($meeting) {
            $meeting->status = $request->status;
            $meeting->save();
        }
        return response()->json([
            'success' => 200,
        ]);
    }
}
