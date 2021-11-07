<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\HomeAccordin;
use App\Models\Sessionbook;
use App\Models\Title;
use App\Models\WebsiteLink;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function create()
    {
        $title = Title::first();
        $counter = Counter::latest()->first();
        $accordians = HomeAccordin::latest()->get();
        $websiteVideoLink = WebsiteLink::latest()->first();
        return view('front.home')->with(compact('title', 'counter', 'accordians', 'websiteVideoLink'));
    }

    public function howBookSession()
    {
        $data = Sessionbook::latest()->first();
        return view('front.how_book')->with(compact('data'));
    }
}
