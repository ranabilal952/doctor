<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
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
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = new Doctor();
        $doctor->doctor_name = $request->doctor_name;
        $doctor->doctor_specility = $request->doctor_specility;
        $doctor->orignal_price = $request->orignal_price;
        $doctor->discount_price = $request->discount_price;
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
}
