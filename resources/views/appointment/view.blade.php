@extends('layouts.app')
@section('title')
    Appointment Details
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
                                        <h4 class="mt-0 header-title">Appointment By</h4>
                                        <p class="text-muted m-b-30 font-16">
                                            Mr/Ms {{ ucfirst($appointment->user->name) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-right">
                                        <h4 class="mt-0 header-title">Appointment to</h4>
                                        <p class="text-muted m-b-30 font-16">
                                            Dr {{ ucfirst($appointment->doctor->name) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-center">Appointment Status:
                            </h6>
                            <div class="w-100 text-center">
                                <span class=""
                                    style="color: #D23830;font-weight:bold">{{ ucfirst($appointment->status) }}</span>
                            </div>
                            <hr>
                            <div class="row">
                                <div class=" col-md-12">
                                    <h5>Appointment Details</h5>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4">
                                    <h4 class="mt-0 header-title">Patient Name</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        Mr/Ms {{ ucfirst($appointment->user->name) }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mt-0 header-title">Doctor name</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        Dr {{ ucfirst($appointment->doctor->name) }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mt-0 header-title">Appointment Date</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ ucfirst($appointment->date->toFormattedDateString()) }}
                                    </p>
                                </div>
                                {{-- 2ndrow --}}
                                <div class="col-md-4">
                                    <h4 class="mt-0 header-title">Appointment Time</h4>
                                    <p class="m-b-30 font-16">
                                        {{ ucfirst($appointment->time) }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mt-0 header-title">User Appointment Time</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ ucfirst($appointment->user_time) }}
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="mt-0 header-title">User Time Zone</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ ucfirst($appointment->timezone) }}
                                    </p>
                                </div>

                                {{-- 3rdRow --}}
                                <div class="col-md-4">
                                    @if (Auth::user()->role == 'doctor')
                                        <a href="{{ url('meeting', $appointment->id) }}" class="btn btn-primary">
                                            Start Meeting
                                        </a>
                                    @elseif($appointment->meetingLink!=null &&
                                        $appointment->meetingLink->status=='started')
                                        <a href="{{ url('meeting', $appointment->id) }}" class="btn btn-primary">
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
