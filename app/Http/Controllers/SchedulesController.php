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
use Illuminate\Support\Facades\Session;
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

        $callingCodes =   array(
            'BD' => '880',
            'BE' => '32',
            'BF' => '226',
            'BG' => '359',
            'BA' => '387',
            'BB' => '+1-246',
            'WF' => '681',
            'BL' => '590',
            'BM' => '+1-441',
            'BN' => '673',
            'BO' => '591',
            'BH' => '973',
            'BI' => '257',
            'BJ' => '229',
            'BT' => '975',
            'JM' => '+1-876',
            'BV' => '',
            'BW' => '267',
            'WS' => '685',
            'BQ' => '599',
            'BR' => '55',
            'BS' => '+1-242',
            'JE' => '+44-1534',
            'BY' => '375',
            'BZ' => '501',
            'RU' => '7',
            'RW' => '250',
            'RS' => '381',
            'TL' => '670',
            'RE' => '262',
            'TM' => '993',
            'TJ' => '992',
            'RO' => '40',
            'TK' => '690',
            'GW' => '245',
            'GU' => '+1-671',
            'GT' => '502',
            'GS' => '',
            'GR' => '30',
            'GQ' => '240',
            'GP' => '590',
            'JP' => '81',
            'GY' => '592',
            'GG' => '+44-1481',
            'GF' => '594',
            'GE' => '995',
            'GD' => '+1-473',
            'GB' => '44',
            'GA' => '241',
            'SV' => '503',
            'GN' => '224',
            'GM' => '220',
            'GL' => '299',
            'GI' => '350',
            'GH' => '233',
            'OM' => '968',
            'TN' => '216',
            'JO' => '962',
            'HR' => '385',
            'HT' => '509',
            'HU' => '36',
            'HK' => '852',
            'HN' => '504',
            'HM' => ' ',
            'VE' => '58',
            'PR' => '+1-787 and 1-939',
            'PS' => '970',
            'PW' => '680',
            'PT' => '351',
            'SJ' => '47',
            'PY' => '595',
            'IQ' => '964',
            'PA' => '507',
            'PF' => '689',
            'PG' => '675',
            'PE' => '51',
            'PK' => '92',
            'PH' => '63',
            'PN' => '870',
            'PL' => '48',
            'PM' => '508',
            'ZM' => '260',
            'EH' => '212',
            'EE' => '372',
            'EG' => '20',
            'ZA' => '27',
            'EC' => '593',
            'IT' => '39',
            'VN' => '84',
            'SB' => '677',
            'ET' => '251',
            'SO' => '252',
            'ZW' => '263',
            'SA' => '966',
            'ES' => '34',
            'ER' => '291',
            'ME' => '382',
            'MD' => '373',
            'MG' => '261',
            'MF' => '590',
            'MA' => '212',
            'MC' => '377',
            'UZ' => '998',
            'MM' => '95',
            'ML' => '223',
            'MO' => '853',
            'MN' => '976',
            'MH' => '692',
            'MK' => '389',
            'MU' => '230',
            'MT' => '356',
            'MW' => '265',
            'MV' => '960',
            'MQ' => '596',
            'MP' => '+1-670',
            'MS' => '+1-664',
            'MR' => '222',
            'IM' => '+44-1624',
            'UG' => '256',
            'TZ' => '255',
            'MY' => '60',
            'MX' => '52',
            'IL' => '972',
            'FR' => '33',
            'IO' => '246',
            'SH' => '290',
            'FI' => '358',
            'FJ' => '679',
            'FK' => '500',
            'FM' => '691',
            'FO' => '298',
            'NI' => '505',
            'NL' => '31',
            'NO' => '47',
            'NA' => '264',
            'VU' => '678',
            'NC' => '687',
            'NE' => '227',
            'NF' => '672',
            'NG' => '234',
            'NZ' => '64',
            'NP' => '977',
            'NR' => '674',
            'NU' => '683',
            'CK' => '682',
            'XK' => '',
            'CI' => '225',
            'CH' => '41',
            'CO' => '57',
            'CN' => '86',
            'CM' => '237',
            'CL' => '56',
            'CC' => '61',
            'CA' => '1',
            'CG' => '242',
            'CF' => '236',
            'CD' => '243',
            'CZ' => '420',
            'CY' => '357',
            'CX' => '61',
            'CR' => '506',
            'CW' => '599',
            'CV' => '238',
            'CU' => '53',
            'SZ' => '268',
            'SY' => '963',
            'SX' => '599',
            'KG' => '996',
            'KE' => '254',
            'SS' => '211',
            'SR' => '597',
            'KI' => '686',
            'KH' => '855',
            'KN' => '+1-869',
            'KM' => '269',
            'ST' => '239',
            'SK' => '421',
            'KR' => '82',
            'SI' => '386',
            'KP' => '850',
            'KW' => '965',
            'SN' => '221',
            'SM' => '378',
            'SL' => '232',
            'SC' => '248',
            'KZ' => '7',
            'KY' => '+1-345',
            'SG' => '65',
            'SE' => '46',
            'SD' => '249',
            'DO' => '+1-809 and 1-829',
            'DM' => '+1-767',
            'DJ' => '253',
            'DK' => '45',
            'VG' => '+1-284',
            'DE' => '49',
            'YE' => '967',
            'DZ' => '213',
            'US' => '1',
            'UY' => '598',
            'YT' => '262',
            'UM' => '1',
            'LB' => '961',
            'LC' => '+1-758',
            'LA' => '856',
            'TV' => '688',
            'TW' => '886',
            'TT' => '+1-868',
            'TR' => '90',
            'LK' => '94',
            'LI' => '423',
            'LV' => '371',
            'TO' => '676',
            'LT' => '370',
            'LU' => '352',
            'LR' => '231',
            'LS' => '266',
            'TH' => '66',
            'TF' => '',
            'TG' => '228',
            'TD' => '235',
            'TC' => '+1-649',
            'LY' => '218',
            'VA' => '379',
            'VC' => '+1-784',
            'AE' => '971',
            'AD' => '376',
            'AG' => '+1-268',
            'AF' => '93',
            'AI' => '+1-264',
            'VI' => '+1-340',
            'IS' => '354',
            'IR' => '98',
            'AM' => '374',
            'AL' => '355',
            'AO' => '244',
            'AQ' => '',
            'AS' => '+1-684',
            'AR' => '54',
            'AU' => '61',
            'AT' => '43',
            'AW' => '297',
            'IN' => '91',
            'AX' => '+358-18',
            'AZ' => '994',
            'IE' => '353',
            'ID' => '62',
            'UA' => '380',
            'QA' => '974',
            'MZ' => '258',
        );

        $call = $callingCodes[Session::get('isoCode')];


        $slotTime = SlotTime::findorFail($id);
        if ($slotTime) {
            $appointmentDate =  Carbon::parse($slotTime->date_from . $slotTime->time);
            $dateDiff = (Carbon::now()->diffInMinutes($appointmentDate, false));
            if ($dateDiff <= 30) {
                toastr()->error('You cannot select this appointment now');
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
            $call = $callingCodes[Session::get('isoCode')];
            return view('payments.payment-schedule', compact('slotTime', 'doctorPercent', 'totalAmount', 'totalTax', 'call'));
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
