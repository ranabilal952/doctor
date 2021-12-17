<?php

namespace App\Http\Controllers;

use App\Models\AppointmentSchedule;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->type = $request->type;

        $imageName = '';
        if ($request->has('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(('images/userProfiles'), $imageName);
        }
        $user->image = 'images/userProfiles' . '/' . $imageName;
        $user->save();

        //creating wallet for every user
        wallet::create([
            'user_id' => Auth::id(),
        ]);

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
    public function update(Request $request)
    {
        // dd($request->all());
        // $this->validate(request(), [
        //     'id' => 'required',

        // ]);
        // $user = User::find($request->id);
        // if ($request->has('name'))
        //     $user->name = request('name');

        // if ($request->has('password'))
        //     $user->password = bcrypt(request('password'));

        // $user->save();
        // toastr()->success('Profile updated successfully');

        // return back();
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
    public function checkLogin()
    {
        if (Auth::check()) {
            return redirect('appointment.create');
        } else {
            return redirect()->back();
        }
    }

    public function showPatients()
    {
        $patients = User::where('role', 'user')->get()->pluck('id');

        $patientsData = array();
        $patientsData =    AppointmentSchedule::whereIn('user_id', $patients)->with(['doctor', 'slot', 'user'])->get();


        return view('admin.patients.index', compact('patientsData'));
    }
}
