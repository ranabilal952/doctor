<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cancelltion;
use App\Models\Counter;
use App\Models\Doctor;
use App\Models\HomeAccordin;
use App\Models\Sessionbook;
use App\Models\Title;
use App\Models\User;
use App\Models\WebsiteLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function create()
    {
        $title = Title::first();
        $counter = Counter::latest()->first();
        $accordians = HomeAccordin::latest()->get();
        $websiteVideoLink = WebsiteLink::latest()->first();
        $blog = Blog::latest()->first();
        $doctor = Doctor::all();
        
        return view('front.home')->with(compact('title', 'counter', 'accordians', 'websiteVideoLink','blog','doctor'));
    }

    public function howBookSession()
    {
        $data = Sessionbook::latest()->first();
        return view('front.how_book')->with(compact('data'));
    }  
    public function cancel()
    {
        $cancelltion_policy = Cancelltion::latest()->first();
        return view('front.cancelation_policy')->with(compact('cancelltion_policy'));
    } 
    public function privacy()
    {
        $privacy_policy = Cancelltion::latest()->first();
        return view('front.privacy_policy')->with(compact('privacy_policy'));
    } 
    public function condition()
    {
        $terms_condition = Cancelltion::latest()->first();
        return view('front.terms_condition')->with(compact('terms_condition'));
    }
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('front.blog_detail')->with('blog',$blog);
    } 
    public function doctor()
    {
        $doctor = Doctor::all();
        return view('front.home')->with(compact('doctor'));
    }
    public function doctor_detail($id)
    {
        $doctor = Doctor::find($id);
        return view('front.details')->with('doctor',$doctor);
    }   
     public function profile()
    {
        $user = Auth::user();
        return view('profile.view')->with('user',$user);
    } 
    
}
