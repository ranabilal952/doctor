@extends('layouts.app')
@section('title')
    Schedule Details
@endsection
@section('content')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="float-left">
                                        <h4 class="mt-0 header-title">Schedule By</h4>
                                        <p class="text-muted m-b-30 font-16">
                                            Mr/Ms {{ ucfirst($appointmentSchedule->user->name) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-right">
                                        <h4 class="mt-0 header-title">Schedule to</h4>
                                        <p class="text-muted m-b-30 font-16">
                                            Dr {{ ucfirst($appointmentSchedule->doctor->name) }}
                                        </p>
                                    </div>
                                </div>
                        </div>
                            <h6 class="text-center">Schedule Status:
                            </h6>
                            <div class="w-100 text-center">
                                <span class=""
                                    style="color: #D23830;font-weight:bold">{{ ucfirst($appointmentSchedule->appointment_status) }}</span>
                            </div>
                            <hr>
                            <div class="row">
                                <div class=" col-md-12">
                                    <h5>Schedule Details</h5>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <h4 class="mt-0 header-title">Patient Name</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        Mr/Ms {{ ucfirst($appointmentSchedule->user->name) }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mt-0 header-title">Doctor name</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        Dr {{ ucfirst($appointmentSchedule->doctor->name) }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mt-0 header-title">Schedule Date</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ ucfirst(\Carbon\Carbon::parse($appointmentSchedule->slot->date_from)->toFormattedDateString()) }}
                                    </p>
                                </div>
                                {{-- 2ndrow --}}
                                <div class="col-md-4">
                                    <h4 class="mt-0 header-title">Schedule Time</h4>
                                    <p class="m-b-30 font-16">
                                        {{ ucfirst($appointmentSchedule->slot->time) }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mt-0 header-title">Schedule Duration</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ $appointmentSchedule->slot->duration }} Minutes
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mt-0 header-title">Schedule Price</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ $appointmentSchedule->slot->amount }} USD

                                    </p>
                                </div>

                                {{-- 3rdRow --}}
                                <div class="col-md-4">
                                    @if (Auth::user()->role == 'doctor')
                                        <a href="{{ url('meeting', $appointmentSchedule->id) }}" class="btn btn-primary">
                                            Start Meeting
                                        </a>
                                    @elseif($appointment->meetingLink!=null &&
                                        $appointment->meetingLink->status=='started')
                                        <a href="{{ url('meeting', $appointmentSchedule->id) }}" class="btn btn-primary">
                                            Join Meeting
                                        </a>
                                    @endif

                                    {{-- <button class="btn btn-primary">Start Meeting </button> --}}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
