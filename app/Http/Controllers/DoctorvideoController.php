<?php

namespace App\Http\Controllers;

use App\Models\Doctorvideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorvideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctorvideo = Doctorvideo::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();

        return view('doctor.video', compact('doctorvideo'));
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
        $request->validate([
            'video_url' => 'required|url'
        ]);
        $doctorvideo = new Doctorvideo();
        $doctorvideo->title_english = $request->title_english;
        $doctorvideo->title_arabic = $request->title_arabic;
        $doctorvideo->video_url = $request->video_url;
        $doctorvideo->user_id = Auth::id();
        $doctorvideo->save();
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
