@extends('front.layout')
@section('title')
    Canceltion Policy
@endsection
@section('content')

    <div class="doctor-breadcrumb" style="margin-top: 150px">
        <div class="" >
            <h1 class="ng-binding">Cancellation policy</h1>
            <div class="doctor-breadcrumb-list">
                <a href="{{url('/')}}" translate="Home" class="ng-scope">Home</a>
                <a><span class="ng-binding">Cancellation policy</span></a>
            </div>
        </div>
    </div>
    <div class="doctor-main mr-5 ml-5">
        <div class="">
            <div class="doctor-main-co ">
                {!! $cancelltion_policy->cancelltion_policy_description_arabic !!}
                </div>
        </div>
    </div>

@endsection
