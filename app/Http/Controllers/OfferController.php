<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offer = Offer::where('user_id', Auth::id())->with('user')->orderBy('created_at', 'DESC')->get();
        return view('offer.index', compact('offer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offer = new Offer();
        $offer->offer_arabic = $request->offer_arabic;
        $offer->offer_english = $request->offer_english;
        $offer->description_arabic = $request->description_arabic;
        $offer->description_english = $request->description_english;
        $offer->number_session = $request->number_session;
        $offer->offer_amount = $request->offer_amount;
        $offer->user_id = Auth::id();
        $offer->save();
        toastr()->success('Data Sucessfully Added');
        return redirect('/offer');
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

    public function toggleOffer($id)
    {
        $offer = Offer::findorFail($id);
        if ($offer) {
            $offer->is_active = !$offer->is_active;
            $offer->save();
            return redirect()->back();
        }
    }
}
