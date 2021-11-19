@extends('front.layout')
@section('title')
    Blog Details
@endsection
@section('content')

    <div class="doctor-breadcrumb" style="margin-top: 150px">
        <div class="" >
            <h1 class="ng-binding">Blog Detail</h1>
            <div class="doctor-breadcrumb-list">
                <a href="{{url('/')}}" translate="Home" class="ng-scope">Home</a>
                <a><span class="ng-binding">Blog Detail</span></a>
            </div>
        </div>
    </div>
    <div class="doctor-main mr-5 ml-5 container">
        <div class="">
            <div class="doctor-main-co ">
                {!! $blog->blog_description_arabic !!}
                </div>
        </div>
    </div>

@endsection
