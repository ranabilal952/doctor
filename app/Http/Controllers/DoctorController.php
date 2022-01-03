<?php

namespace App\Http\Controllers;

use App\Models\AppointmentSchedule;
use App\Models\Diseases;
use App\Models\Doctor;
use App\Models\Payment;
use App\Models\Speciality;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Doctor::all();
        return view('front.doctor', compact('doctor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialities = Speciality::all();
        $diseases = Diseases::all();
        return view('doctor.create', compact(['specialities', 'diseases']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        User::create([
            'name' => $request->doctor_name,
            'email' => $request->email,
            'password' => $request->password ?? Hash::make('12345678'),
            'role' => 'doctor',
        ]);

        $doctor = new Doctor();
        $doctor->doctor_name = $request->doctor_name;
        $doctor->doctor_specility = $request->doctor_specility;
        $doctor->orignal_price = $request->orignal_price;
        $doctor->discount_price = $request->discount_price;
        $doctor->thirty_minute_price = $request->thirty_minute_price;
        $doctor->sixty_minute_price = $request->sixty_minute_price;
        $doctor->year_experience = $request->year_experience;
        $doctor->rating_number = $request->rating_number;
        $doctor->language = $request->language;
        $doctor->availablity = $request->availablity;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->whatsapp = $request->whatsapp;
        $doctor->message = $request->message;
        $doctor->total_rating = $request->total_rating;
        $doctor->user_name_rating = $request->user_name_rating;
        $doctor->user_comment = $request->user_comment;
        $doctor->about_therapist = $request->about_therapist;
        $doctor->certification_detail = $request->certification_detail;
        $doctor->experience_detail = $request->experience_detail;
        $doctor->video_link1 = $request->video_link1;
        $doctor->video_link2 = $request->video_link2;
        $doctor->video_link3 = $request->video_link3;
        $doctor->video_link4 = $request->video_link4;
        $doctor->video_link5 = $request->video_link5;



        $imageName = '';
        if ($request->has('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(('images/blog'), $imageName);
        }
        $doctor->image = 'images/blog' . '/' . $imageName;
        $doctor->save();
        toastr()->success('Data Sucessfully Added');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function addDoctorTime()
    {
        $doctorTime = Time::where('user_id', Auth::id())->first()->toArray();
        $newTimeArray = $doctorTime['time'];
        $newTimeArray = array_map(function ($v) {
            return (int)$v;
        }, $newTimeArray);

        $newTimeArray =  array_values($newTimeArray);
        $newTimeArray = implode(",", $newTimeArray);

        // $doctorTime = $doctorTime[0];
        // dd(($doctorTime[0]));
        // $doctorTime=$doctorTime->time;

        // data: {
        //     1: [1, 2, 3, 4]
        //   },
        return view('doctor.calander.create')->with(compact('newTimeArray'));
    }

    public function getAllDoctors()
    {
        $doctors = User::where('role', 'doctor')->with(['doctorData', 'wallet', 'sessions', 'bookedSessions' => function ($q) {
            $q->where('appointment_status', 'booked');
        }, 'completedSessions' => function ($query) {
            $query->where('appointment_status', 'completed');
        }])->get();
        return view('admin.doctor.index', compact('doctors'));
    }

    public function getDoctorDetails($id)
    {
        $doctorData = User::with('doctorData')->findOrFail($id);
    }

    public function hideDoctor($id)
    {
        $user = Doctor::where('user_id', $id)->first();
        $user->is_hide = !$user->is_hide;
        $user->save();
        toastr()->success('Doctor Status Changed Successfully');
        return redirect()->back();
    }

    function getPatients()
    {
        $allPatients = AppointmentSchedule::distinct()->with(['user', 'doctor'])->get()->unique('user_id');
        // dd($allPatients);
        return view('admin.patients.all_patients', compact('allPatients'));
    }
}
