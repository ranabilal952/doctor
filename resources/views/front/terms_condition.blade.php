@extends('front.layout')
@section('title')
    Terms Condition
@endsection
@section('content')

    <div class="doctor-breadcrumb" style="margin-top: 150px">
        <div class="" >
            <h1 class="ng-binding">Terms Condition</h1>
            <div class="doctor-breadcrumb-list">
                <a href="{{url('/')}}" translate="Home" class="ng-scope">Home</a>
                <a><span class="ng-binding">Terms Condition</span></a>
            </div>
        </div>
    </div>
    <div class="doctor-main mr-5 ml-5">
        <div class="">
            <div class="doctor-main-co ">
                {!! $terms_condition->terms_condition_description !!}
                </div>
        </div>
    </div>

@endsection
