@extends('layouts.app')
@section('title')
    Payment Details
@endsection
@section('content')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <h4 class="mt-0 header-title">Schedule Date</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ $slotTime->date_from }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mt-0 header-title">Schedule Time</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ $slotTime->time }}
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <h4 class="mt-0 header-title">Schedule Duration</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ $slotTime->duration }} Minutes
                                    </p>
                                </div>


                                <div class="col-md-6">
                                    <h4 class="mt-0 header-title">Schedule Amount</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ $slotTime->amount }} USD
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>

                    {{-- PaymentGateway --}}
                    <h5 class="text-center">Book this session</h5>
                    <div class="card m-b-200">
                        <div class="card-body">
                            <div class="row mt-5">
                                <div class="col-md-12 text-center">
                                    <h6 class="\">Here we will place stripe payment</h6>

                                    <a href="{{ url('book-schedule', $slotTime->id) }}" class="">Book your
                                        session</a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
@endsection
