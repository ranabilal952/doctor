<?php

namespace App\Http\Controllers;

use App\Models\HomeAccordin;
use Illuminate\Http\Request;

class HomeAccordinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeAccordin = HomeAccordin::all();
        return view('Home.home_accordion', compact('homeAccordin'));
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
        $home_accordion = new HomeAccordin();
        $home_accordion->title = $request->title;
        $home_accordion->description = $request->description;
        $home_accordion->arabic_title = $request->arabic_title;
        $home_accordion->arabic_description = $request->arabic_description;
        $home_accordion->save();
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
        $faq = HomeAccordin::find($id);
        $faq->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }
}
