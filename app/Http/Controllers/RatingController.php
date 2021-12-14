<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rating = Rating::all();
        return view('rating.index',compact('rating'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rating.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rating = new Rating();
        $rating->user_name = $request->user_name;
        $rating->total_rating = $request->total_rating;
        $rating->description = $request->description;
        $rating->save();
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
       $rating = Rating::find($request->id);
       $rating->user_name = $request->user_name;
       $rating->total_rating = $request->total_rating;
       $rating->description = $request->description;
       $rating->save();
       toastr()->info('Data Sucessfully Updated');
       return redirect()->back();

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
    public function block($id)
    {
        
        $rating = Rating::find($id);
        $rating->update([
            'status' => 1,
        ]);
        toastr()->success('Rating Approved', 'Done');
        return redirect()->back();
    }
    public function unblock($id)
    {
        $rating = Rating::find($id);
        $rating->update([
            'status' => 0,
        ]);
        toastr()->error('Rating Unapproved', 'Done');
        return redirect()->back();
    }
}
