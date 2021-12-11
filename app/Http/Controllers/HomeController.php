<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'user') {
            return redirect('get-next-session');
        } else if (Auth::user()->role == 'admin') {
            $users = User::latest()->limit(10)->get();
            $doctorsCount = Doctor::all()->count();
            $usersCount = User::all()->count();
            return view('home', compact('users', 'doctorsCount', 'usersCount'));
        } else {
            $user = User::with(['wallet', 'payment_transaction_debited', 'payment_transaction_credited'])->findOrFail(Auth::id());
            return view('home', compact('user'));
        }
    }
}
