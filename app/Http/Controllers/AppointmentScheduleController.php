<?php

namespace App\Http\Controllers;

use App\Models\AppointmentSchedule;
use App\Models\Coupons;
use App\Models\CouponUsage;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentScheduleController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppointmentSchedule  $appointmentSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(AppointmentSchedule $appointmentSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AppointmentSchedule  $appointmentSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(AppointmentSchedule $appointmentSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AppointmentSchedule  $appointmentSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppointmentSchedule $appointmentSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppointmentSchedule  $appointmentSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppointmentSchedule $appointmentSchedule)
    {
        //
    }

    public function getNextSession()
    {
        $userRole = Auth::user()->role;
        $nextSessions = AppointmentSchedule::where($userRole == 'doctor' ? 'doctor_id' : 'user_id', Auth::id())->where('appointment_status', 'booked')->with(['slot', 'user', 'doctor'])->get();
        $upcomingSessions = array();
        foreach ($nextSessions as $key => $session) {
            $appointmentDate =  Carbon::parse($session->slot->date_from . $session->slot->time);
            if ($appointmentDate >= Carbon::today()) {
                $dateDiff = (Carbon::now()->diffInMinutes($appointmentDate, false)) / 60;
                if ($dateDiff >= 12) {
                    $session['cancel'] = true;
                } else {
                    $session['cancel'] = false;
                }
                $upcomingSessions[] = $session;
            }
        }


        return view('Sessions.next_session')->with('upcomingSessions', $upcomingSessions);
    }

    public function getPreviousSession()
    {
        $userRole = Auth::user()->role;
        $appointmentSchedule = AppointmentSchedule::where($userRole == 'doctor' ? 'doctor_id' : 'user_id', Auth::id())->where('appointment_status', 'booked')->with('slot')->get();
        $previousSessions = array();
        foreach ($appointmentSchedule as $key => $session) {
            $appointmentDate =  Carbon::parse($session->slot->date_from . $session->slot->time);

            if ($appointmentDate < Carbon::today()) {
                $previousSessions[] = $session;
            }
        }

        return view('Sessions.previous_session')->with('previousSessions', $previousSessions);
    }

    public function getCancelSession()
    {
        $userRole = Auth::user()->role;
        $previousSessions = AppointmentSchedule::where($userRole == 'doctor' ? 'doctor_id' : 'user_id', Auth::id())->where('appointment_status', 'canceled')->with('slot')->get();
       
        return view('Sessions.previous_session')->with('previousSessions', $previousSessions);
    }

    public function viewAppointment($id)
    {
        $appointmentSchedule = AppointmentSchedule::with(['slot', 'user', 'doctor', 'meetingLink', 'coupon'])->findorFail($id);
        // $coupon = CouponUsage::where('appoi')
        // dd($appointmentSchedule);
        $payment = Payment::where('appointment_schedule_id', $id)->first();
        if ($appointmentSchedule) {
            return view('Appointment_Schedule.view')->with(compact(['appointmentSchedule', 'payment']));
        }
    }

    public function getAdminDoctorsSession()
    {
        $doctors = User::where('role', 'doctor')->get();
        return view('admin.doctorsSession.index', compact('doctors'));
    }

    public function getDataAdminDoctorsSession(Request $request)
    {
        $doctors = User::where('role', 'doctor')->get();

        $nextSessions = AppointmentSchedule::where('doctor_id', $request->doctor_id)->where('appointment_status', 'booked')->with(['slot', 'user', 'doctor'])->get();
        $upcomingSessions = array();
        foreach ($nextSessions as $key => $session) {
            $appointmentDate =  Carbon::parse($session->slot->date_from . $session->slot->time);
            if ($request->session_time == 'upcoming') {
                if ($appointmentDate >= Carbon::today()) {
                    $upcomingSessions[] = $session;
                }
            } else if ($request->session_time == 'previous') {
                if ($appointmentDate < Carbon::today()) {
                    $upcomingSessions[] = $session;
                }
            } else {
            }
        }
        // dd($upcomingSessions);
        return view('admin.doctorsSession.index', compact('doctors', 'upcomingSessions'));
    }
}
