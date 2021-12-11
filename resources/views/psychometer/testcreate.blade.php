@extends('front.layout')
@section('title')
    Privacy Policy
@endsection
@section('content')

    <div class="doctor-breadcrumb" style="margin-top: 150px">
        <div class="">
            <h1 class="ng-binding">Psychometer</h1>
            <div class="doctor-breadcrumb-list">
                {{-- <a href="{{url('/')}}" translate="Home" class="ng-scope">Home</a> --}}
                {{-- <a><span class="ng-binding">Psychometer</span></a> --}}
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-lg-2 mb-5"></div>
        <div class="col-lg-8">
            <div class="row d-md-flex d-none no-m  pt16 pb16" style="background: rgba(61,168,192,.19);padding: 28px;">
                <div class="col-md-8 text-orange fz14">Test Title</div>
                <div class="col-md-2 text-orange fz14 text-center">Recommendation</div>
                <div  class="col-md-2 text-orange fz14 text-center">Free</div>
            </div>
            <div  class="row">
                @foreach ($test as $test)
                <div  class="col-md-8 col-8 order-0">
                    <a href="" style="text-decoration: none"><div  class="" style="color:#3da8c0;margin-top:20px;">{{$test->test_name}} </div></a>
                    <div class="">{{$test->test_description}}
                        <br>
                        {{-- <span  class="" id="seeMore2" style="color: brown">See More</span> --}}
                    </div>
                    <!---->
                </div>
               
               
                <div  class="col-md-2 col-6 mt-4 text-right">
                    <span style="margin-top:20px;">Every 2 weeks</span>
                </div>               

                <div  class="col-md-2 col-6  text-center sm-mt10 mt-3">
                    <i  class="fa fa-check-circle text-blue d-none d-md-block mt-3"></i>
                </div>
                @endforeach
            </div>


            <!---->
            <!---->
        </div>
        <div class="col-lg-2"></div>
    </div>

@endsection
