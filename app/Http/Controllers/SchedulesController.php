<?php

namespace App\Http\Controllers;

use App\Models\AppointmentSchedule;
use App\Models\Doctor;
use App\Models\PaymentSetting;
use App\Models\SlotTime;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;


class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $slotTimes = SlotTime::where('user_id', Auth::id())->get();
        // $filterTimes = array();
        // foreach ($slotTimes as $key => $slotTime) {
        //     if (Carbon::parse($slotTime->date_from) < Carbon::today() && Carbon::parse($slotTime->date_to) < Carbon::today()) {
        //         // WE DON'T NEED THAT BECAUSE THIS SCHEDULE HAS BEEN PASSED
        //     } else {
        //         $dateFrom = Carbon::parse($slotTime->date_from);
        //         if ($slotTime->date_to)
        //             $dateTo = Carbon::parse($slotTime->date_to);
        //         else
        //             $dateTo = Carbon::tomorrow();
        //         $period = CarbonPeriod::create($dateFrom,  $dateTo)->toArray();

        //         for ($i = 0; $i < (count($period)); $i++) {
        //             $filterTimes[$i] = [
        //                 'time' => $slotTime->time,
        //                 'duration' => $slotTime->duration,
        //                 'amount' => $slotTime->amount,
        //                 'date' => $period[$i]->format('Y-m-d'),
        //             ];
        //         }
        //     }
        // }

        // dd(($filterTimes));
        $slotTimes = SlotTime::where('user_id', Auth::id())->get();
        return view('Schedules.index')->with('slotTimes', $slotTimes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        return view('Schedules.create')->with('doctor', $doctor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'date_from' => 'required|date|after_or_equal:today',
            // 'schedule_days' => 'required|array',
            'schedule_time' => 'required',
            'duration' => 'required',
            'amount' => 'required',


        ]);



        $period = CarbonPeriod::create($request->date_from,  $request->date_to ?? Carbon::parse($request->date_from)->addDay(0))->toArray();


        for ($i = 0; $i < (count($period)); $i++) {
            SlotTime::create([
                'user_id' => Auth::id(),
                'time' => $request->schedule_time,
                'days' => $request->schedule_days ? serialize($request->schedule_days) : null,
                'duration' => $request->duration,
                'amount' => $request->amount,
                // 'date_from' => $request->date_from,
                'st' => $request->schedule_time,
                'date_from' => $period[$i]->format('Y-m-d'),
            ]);
        }

        // $schedule =   SlotTime::create([
        //     'user_id' => Auth::id(),
        //     'time' => $request->schedule_time,
        //     'days' => $request->schedule_days ? serialize($request->schedule_days) : null,
        //     'duration' => $request->duration,
        //     'amount' => $request->amount,
        //     'date_from' => $request->date_from,
        //     'st' => $request->schedule_time,

        // ]);
        return redirect('all-schedules');
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
        $slotTime = SlotTime::find($request->id);
        $slotTime->time = $request->time;
        $slotTime->days = $request->days;
        $slotTime->duration = $request->duration;
        $slotTime->amount = $request->amount;
        $slotTime->save();
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

    public function getActiveSchedule()
    {
        $slotTime = SlotTime::where([['user_id', Auth::id()], ['booking_status', 1], ['date_from', '>=', Carbon::today()]])->get();
        return view('Schedules.active')->with('slotTime', $slotTime);
    }
    public function approved($id)
    {

        $slotTime = SlotTime::find($id);
        $slotTime->update([
            'booking_status' => 1,
        ]);
        toastr()->success('Approved', 'Done');
        return redirect()->back();
    }
    public function unapproved($id)
    {
        $slotTime = SlotTime::find($id);
        $slotTime->update([
            'booking_status' => 3,
        ]);
        toastr()->error('Unapproved', 'Done');
        return redirect()->back();
    }








    public function getBookedSchedule()
    {
        $slotTime = SlotTime::where([['user_id', Auth::id()], ['booking_status', 0], ['date_from', '>=', Carbon::today()]])->get();
        return view('Schedules.booked')->with('slotTime', $slotTime);
    }

    public function paymentSchedule($id)
    {

        $slotTime = SlotTime::findorFail($id);
        if ($slotTime) {
            $appointmentDate =  Carbon::parse($slotTime->date_from . $slotTime->time);
            $dateDiff = (Carbon::now()->diffInMinutes($appointmentDate, false));
            if ($dateDiff <= 30) {
                toastr()->success('You cannot select this appointment now');
                return redirect()->back();
            }
        }

        $slotAmount = doubleval($slotTime->amount);
        $doctorPercent = ($slotAmount * 0.40);
        $siteTax = 0;
        $totalTax = 0;
        $totalAmount = 0;
        if ($slotAmount <= 200.0) {
            // tax applied  
            $siteTax = PaymentSetting::first()->value('site_fee');
            $totalTax = ($slotAmount * ($siteTax / 100));
        }

        $totalAmount = $slotAmount + $totalTax;

        if ($slotTime) {
            return view('payments.payment-schedule', compact('slotTime', 'doctorPercent', 'totalAmount', 'totalTax'));
        }
    }

    public function bookSchedule($id)
    {
        $bookSchedule = SlotTime::findorFail($id);
        if ($bookSchedule) {
            $bookSchedule->booking_status = 0;
            $bookSchedule->save();
        }

        AppointmentSchedule::create([
            'user_id' => Auth::id(),
            'doctor_id' => $bookSchedule->user_id,
            'slot_id' => $bookSchedule->id,
        ]);


        toastr()->success('Appointment booked successfully');
        return redirect()->back();
    }
}
