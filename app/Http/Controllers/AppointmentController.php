<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentSchedule;
use App\Models\SlotTime;
use App\Models\Timezone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
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
        return view('appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'user_id' => Auth::id()
        ]);
        $appointment =  Appointment::create($request->all());

        // $blog->save();
        // toastr()->success('Data Sucessfully Added');
        return response()->json([
            'success' => true,
            'data' => $appointment,
            'message' => 'Appointment Saved Successfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::where('id', $id)->with(['user', 'doctor', 'meetingLink'])->latest()->first();
        return view('appointment.view')->with('appointment', $appointment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function home()
    {
        $slots = SlotTime::all();
        $timezones = Timezone::Orderby('offset')->get();
        return view('front.demo_booking', compact('slots', 'timezones'));
    }

    public function getavailability(Request $request)
    {
        //  
        $aTmp1 = [];
        $aTmp2 = [];
        $date =  $request['date'];
        $time = Appointment::where('date', $date)->get('time')->toArray(); //booked time   10 11 12 
        $allTime = DB::table('slot_times')->select('st')->where('user_id', $request->doctor_id)->get(); // all time 10 11 12 13 14 15 16
        $allTime = (array)json_decode($allTime, true);
        $time = (array)$time;
        foreach ($allTime as $aV) {
            $aTmp1[] = $aV['st'];
        }
        foreach ($time as $aV) {
            $aTmp2[] = $aV['time'];
        }
        $result = array_diff($aTmp1, $aTmp2);
        return $result;
        // echo json_encode($result);
    }
    public function serialize_array_values($arr)
    {
        foreach ($arr as $key => $val) {
            sort($val);
            $arr[$key] = serialize($val);
        }
        return $arr;
    }


    public function loginThroughAjax(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }


    public function getCurrentAppointments()
    {
        $doctorID = Auth::id();
        $today = Carbon::today();
        if (Auth::user()->role == 'doctor')
            $appointments = Appointment::where([['doctor_id', $doctorID], ['status', '!=', 'completed']])->whereDate('date', '>=', $today)->with('user')->latest()->get();
        else
            $appointments = Appointment::where([['user_id', $doctorID], ['status', '!=', 'completed']])->whereDate('date', '>=', $today)->with('user')->latest()->get();

        $past = false;

        return view('appointment.current', compact('appointments', 'past'));
    }

    public function getPastAppointments()
    {
        $doctorID = Auth::id();
        $today = Carbon::today();
        if (Auth::user()->role == 'doctor')
            $appointments = Appointment::where('doctor_id', $doctorID)->whereDate('date', '<', $today)->with('user')->latest()->get();
        else
            $appointments = Appointment::where('user_id', $doctorID)->whereDate('date', '<', $today)->with('user')->latest()->get();

        $past = true;
        return view('appointment.current', compact('appointments', 'past'));
    }


    public function changeAppointmentStatus(Request $request)
    {
        $appointment_id = $request->appointment_id;
        $appointment = Appointment::findorFail($appointment_id);
        if ($appointment) {
            $appointment->status = $request->status;
            $appointment->save();
            toastr()->success('Status changed successfully');
        } else {
            toastr()->error('Appointment is not available');
        }

        return redirect()->back();
    }

    public function cancelAppointment($id)
    {
        $appointment = AppointmentSchedule::findorfail($id);
        if ($appointment) {
            $appointment->appointment_status = 'canceled';
            $appointment->save();
        }
        toastr()->success('appointment canceled successfully');
        return redirect()->back();
    }
}
