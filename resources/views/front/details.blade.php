@extends('front.layout')
@section('title')
    {{ __('Doctor Details') }}
@endsection
<style>
    .disabled {
        text-decoration: line-through !important;
    }

    #schedule-date-picker-header {

        background: #1266f1 !important;

    }

    .datepicker-days {
        font-size: 23px !important;
    }

    .highlighted {
        background: white !important;
    }

    .slick-arrow {
        width: 0 !important;
    }

    .slick-next:before,
    .slick-prev:before {
        font-family: slick;
        font-size: 20px;
        line-height: 1;
        background: white;
        opacity: 1 !important;
        color: #1266f1 !important;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /*  */

    .slick-slider .slick-track,
    .slick-slider .slick-list {
        direction: ltr;
    }

</style>


@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="doctor-single-about">
                    <div class="row">
                        <div class="col-5 col-sm-3 col-lg-3">
                            <div class="doctor-single-avatar-wrap">
                                <div class="doctor-single-avatar row kpk" style="margin-left: 30px;
                                                                        width: 110px;
                                                                        height: 119px;
                                                                        margin-top: 11px;">
                                    <img src="{{ url($doctor->image ?? '') }}" alt="">
                                    @if (Cache::has('is_online' . $doctor->user->id))
                                        <i class="doctor-item-availablity online"></i>
                                    @else
                                        <i class="doctor-item-not-availablity online"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="top-bi detailspage" style="float: right">
                                <div class="">
                                    <img src="{{ asset('web/assets/ma.png') }}" alt="" style="width:25px;margin:5px">
                                </div>
                                <div class="">
                                    <img src="{{ asset('web/assets/wat.png') }}" alt="" style="width:25px;margin:5px">
                                </div>
                                <div class="">
                                    <img src="{{ url('web/assets/zo.png') }}" alt="" style="width:25px;margin:5px">
                                </div>
                            </div>
                        </div>
                        <!-- col3 -->
                        <div class="col-7 col-sm-4 col-lg-5 col-xl-4 ">
                            <div class="doctor-single-info text-md-start text-center " style="margin-left: 30px;">
                                <h1 class="ng-binding "> {{ $doctor->user->name }}</h1>
                                <h6 class="ng-binding "> {{ __($doctor->doctor_specility) }}</h6>
                                <h6 class="ng-binding "><span class="ng-scope ">{{ __('Language') }}</span>:
                                    <div class="me-2 d-inline ">{{ $doctor->language }}</div>
                                </h6>
                                {{-- <h6 class="ng-binding "> {{ __('Years of experience') }}
                                    {{ $doctor->year_experience }}</h6> --}}
                                </h5>
                                <div class="doctor-rate ">
                                    <span class="fa fa-star checked "></span>
                                    <span class="fa fa-star checked "></span>
                                    <span class="fa fa-star checked "></span>
                                    <span class="fa fa-star checked "></span>
                                    <span class="fa fa-star checked "></span>
                                    <span class="ng-binding" style="color: white">({{ $doctor->total_rating }})</span>
                                </div>
                                <!-- doctor-rate -->
                            </div>
                            <!-- doctor-single-info -->
                        </div>
                        <!-- col9 -->
                        <div class="col-12 col-sm-5 col-lg-4 col-xl-5 mt-3">
                            <div class="card ng-scope ">
                                <div class="card-body ">
                                    <div class="d-inline ">
                                        {{ App::getLocale() == 'ar' ? 'الاكتئاب' : 'Depression' }}
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                </div>
                <!-- Tabs navs -->
                <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist" style="background: #E7F3F5; ">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="ex3-tab-1" data-mdb-toggle="tab" href="#ex3-tabs-1" role="tab"
                            aria-controls="ex3-tabs-1" aria-selected="true">{{ __('Rates') }}</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab"
                            aria-controls="ex3-tabs-2" aria-selected="false">{{ __('Profile') }}</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex3-tab-3" data-mdb-toggle="tab" href="#ex3-tabs-3" role="tab"
                            aria-controls="ex3-tabs-3" aria-selected="false">{{ __('Videos') }}</a>
                    </li>
                    {{-- <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex3-tab-4" data-mdb-toggle="tab" href="#ex3-tabs-4" role="tab"
                            aria-controls="ex3-tabs-4" aria-selected="false" style="border: 2px solid black;color: black;">عروض الجلسات </a>
                    </li> --}}
                </ul>
                <!-- Tabs navs -->

                <!-- Tabs content -->
                <div class="tab-content" id="ex2-content">
                    <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                        <div class="doctor-single-tab-comments ">
                            <div ng-repeat="rate in rates " class="doctor-single-tab-comment ng-scope ">
                                <div class="d-flex ">
                                    <div class="flex-shrink-0 ">
                                        <div class="doctor-comment-avatar "
                                            style="background-image: url(//secure.gravatar.com/avatar/1397658d2c23edcf97a73fda84c04460?d=mm); ">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3 ">
                                        <div class="doctor-single-tab-comment-co ">
                                            <h5 class="ng-binding ">{{ $doctor->user_name_rating }}</h5>


                                            <div class=" ">
                                                <span class="fa fa-star checked "></span>
                                                <span class="fa fa-star checked "></span>
                                                <span class="fa fa-star checked "></span>
                                                <span class="fa fa-star checked "></span>
                                                <span class="fa fa-star checked "></span>
                                            </div>
                                            <p class="ng-binding "> {{ $doctor->user_comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                        <div class="title-forth mb-3 mt-4 ">
                            <h5 class="ng-binding ">{{ __('About therapist') }}</h5>
                        </div>
                        <div class="doctor-info-page-sesction mb-3 ng-binding " ng-bind-html="tAttr(doctor.description)">
                            {{ $doctor->about_therapist }}</div>
                        <div class="title-forth mb-3 mt-4">
                            <h5 class="ng-binding">{{ __('Certificates') }}</h5>
                        </div>
                        <div class="doctor-info-page-sesction mb-3 ng-binding" ng-bind-html="tAttr(doctor.certificates)">-
                            {{ $doctor->certification_detail }}</div>
                        <div class="title-forth mb-3 mt-4">
                            <h5 class="ng-binding">{{ __('Experiences') }}</h5>
                        </div>
                        <div class="doctor-info-page-sesction mb-3 ng-binding" ng-bind-html="tAttr(doctor.experiences)">
                            {{ $doctor->experience_detail }}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
                        <div class="row">
                            @if ($doctor->user->doctorVideos && count($doctor->user->doctorVideos) > 0)
                                @foreach ($doctor->user->doctorVideos as $video)
                                    <div class="col-md-4 mb-4">
                                        <p class="text-center mt-4">
                                            {{ App::getLocale() == 'en' ? $video->title_english : $video->title_arabic }}
                                        </p>
                                        <iframe width="100%" height="auto" src="{{ $video->video_url }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>

                                    </div>

                                @endforeach
                            @else
                                <h6 class="text-primary text-center">No Videos Available</h6>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ex3-tabs-4" role="tabpanel" aria-labelledby="ex3-tab-4">
                        <div class="doctor-single-tab-plans-list">
                            <div class="row">
                                @foreach ($doctor->user->offers as $offer)


                                    <div ng-repeat="(key, offer) in offers"
                                        class="col-md-4 col-sm-12 col-12 py-3  order-md-1 order-2 ">
                                        <div class="doctor-single-tab-plan">

                                            <h4 class="ng-binding">{{ $offer->offer_english }}</h4>
                                            <div class="doctor-single-tab-plan-price">
                                                <div class="row">
                                                    {{-- <div class="col mb-3"><strong class="ng-binding">{{$offer->offer_amount}} USD</strong></div> --}}
                                                    {{-- <div class="col mb-3"><span class="ng-binding">وفر 16.67%</span></div> --}}
                                                </div>
                                            </div>

                                            <h3 class="ng-binding">{{ $offer->offer_amount }} USD</h3>
                                            <div class="doctor-single-tab-plan-items">
                                                <ul>
                                                    <li class="ng-binding">&rlm;{{ $offer->description_english }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <a class="btn btn-primary ng-scope" href="offer/3" translate="">Order Now</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-lg-4 col-md-12">
                <div ng-controller="DoctorBookController" class="doctor-reservation-tool ng-scope">
                    <div class="dl">

                        <button type="button" class="btn btn-lg btn-outline-white w-100 fw-bold mb-3 " data-toggle="modal"
                            data-target="#bookingModal" style="border: 2px solid black;color: black;">
                            {{ __('Book an instant session') }}
                        </button>
                        <button type="button" id="scheduleBtn" class="btn btn-lg btn-outline-white w-100 fw-bold mb-3 "
                            style="border: 2px solid black;color: black;">
                            {{ __('Book a session from calandar') }}
                        </button>
                        {{-- @if ($doctor->user->onlineStatus && $doctor->user->onlineStatus->is_active)
                            @php
                                $date1 = DateTime::createFromFormat('h:i a', now());
                                $date2 = DateTime::createFromFormat('h:i a', $doctor->user->onlineStatus->online_from);
                                $date3 = DateTime::createFromFormat('h:i a', $doctor->user->onlineStatus->online_to);
                                
                            @endphp
                            @if ($date1 > $date2 && $date1 < $date3)
                                <button class="btn btn-lg btn-outline-white w-100 fw-bold mb-3 "
                                    style="border: 2px solid black;color: black;">{{ __('Book Instantly') }}</button>
                            @endif

                        @endif --}}


                        {{-- <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist" style=" ">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex3-tab-4" data-mdb-toggle="tab" href="#ex3-tabs-4" role="tab"
                                    aria-controls="ex3-tabs-4" aria-selected="false"
                                    style="border: 2px solid black;color: black;">{{ __('Sessions') }} </a>
                            </li>
                        </ul> --}}
                    </div>
                    <h1 class="ng-binding">{{ __('Available Schedules') }} </h1>
                    <br>
                    <div id="schedule-date-picker-plugin" class=""
                        style="background-color: white;;border:1px solid rgb(225, 225, 225)">
                        <div id="schedule-date-picker-header" class="text-center">
                            <div class="">
                                <span class=""> 30 {{ __('minutes') }}
                                </span>:
                                <span class="">
                                    {{ currency()->getUserCurrency() }}
                                    {{ round(preg_replace('/[^A-Za-z0-9\-]/','',currency(intVal($doctor->thirty_minute_price) / 100, 'USD', currency()->getUserCurrency()))) }}

                                </span>
                                &nbsp;&nbsp; -&nbsp;&nbsp;
                                <span class="">60 {{ __('minutes') }}</span>:
                                <span class=""> {{ currency()->getUserCurrency() }}
                                    {{ round(preg_replace('/[^A-Za-z0-9\-]/','',currency(intVal($doctor->sixty_minute_price) / 100, 'USD', currency()->getUserCurrency()))) }}</span>
                            </div>


                        </div>
                        <div class="row autoplay br">
                            @foreach ($slotTimes as $ss => $time)

                                <div class="col-lg-3 text-center mt-3 mb-5"
                                    style="margin-right:10px;border:1px solid rgba(230, 219, 219, 0.125);">
                                    <div class="heading bg-primary rb" style="">
                                        <small> {{ strtok(\Carbon\Carbon::parse($ss)->calendar(), ' ') }}</small>

                                    </div>

                                    @foreach ($time as $key => $value)
                                        @if (Auth::check())
                                            <a href="{{ url('payment-schedule', $value->id) }}">
                                                <div class="d-block">
                                                    <div class="scheduleTime text-primary">
                                                        <small
                                                            style="color: #007bff;
                                                                                                                        font-weight: bold;
                                                                                                                        display: block;
                                                                                                                        padding: 0.2rem;">{{ $value->time }}</small>

                                                        <p class="text-muted" style="font-size: 9px">
                                                            ({{ $value->duration }}
                                                            {{ __('Minutes') }})</p>
                                                    </div>
                                                </div>
                                            </a>

                                        @else
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">
                                                <div class="d-block">
                                                    <div class="scheduleTime text-primary">
                                                        <small>{{ $value->time }}</small>
                                                    </div>
                                                    <small class="text-muted" style="  white-space: nowrap;    overflow: hidden;
                                                        text-overflow: clip;">
                                                        ({{ __('minutes') }}
                                                        {{ $value->duration }})</small>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                    <div class="card-footer" style="font-size: .8rem;
                                                                                font-weight: bold;
                                                                                text-align: center;
                                                                                cursor: pointer;
                                                                                background: #D6E0F5;
                                                                                margin-left: -15px;
                                                                                width: 86px;"><span
                                            class="ng-scope">More</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="bookingModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="width: 70%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Book a session') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-4 ng-scope">
                        @if (Cache::has('is_online' . $doctor->user->id) && $doctor->user->onlineStatus && $doctor->user->onlineStatus->is_active)
                            <div class="card instant-session shadow light-grey-bg">
                                <div class="card-header">
                                    <h5 class="title-primary">
                                        <span ng-if="key == 30" translate="Half hour session"
                                            class="ng-scope">{{ __('Half hour session') }}</span>
                                        <span class="text-danger">(<span
                                                translate="The session will be start after payment"
                                                class="ng-scope">{{ __('The session will be start after payment') }}
                                            </span>)</span>
                                    </h5>
                                </div>
                                <div class="card-body text-center">
                                    <h4 class="title-forth mb-4"><span translate="Amount"
                                            class="ng-scope">{{ __('price') }}</span>
                                        : <span class="ng-binding"> {{ currency()->getUserCurrency() }}
                                            {{ round(preg_replace('/[^A-Za-z0-9\-]/','',currency(intVal($doctor->thirty_minute_price) / 100, 'USD', currency()->getUserCurrency()))) }}
                                        </span></h4>
                                    <a href="{{ url('book-instantly/' . $doctor->user->id . '/' . '0') }}"
                                        class="btn btn-primary w-100" style="max-width: 25rem;">
                                        <!-- ngIf: creating_waiting[key] --> <span translate="Book now"
                                            class="ng-scope">{{ __('Book Now') }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="card instant-session shadow light-grey-bg">
                                <div class="card-header">
                                    <h5 class="title-primary">
                                        <span class="ng-scope">{{ __('1 hour session') }}</span>
                                        <span class="text-danger">(<span
                                                translate="The session will be start after payment"
                                                class="ng-scope">{{ __('The session will be start after payment') }}
                                            </span>)</span>
                                    </h5>
                                </div>
                                <div class="card-body text-center">
                                    <h4 class="title-forth mb-4"><span translate="Amount"
                                            class="ng-scope">{{ __('price') }}</span>
                                        : <span class="ng-binding"> {{ currency()->getUserCurrency() }}
                                            {{ round(preg_replace('/[^A-Za-z0-9\-]/','',currency(intVal($doctor->sixty_minute_price) / 100, 'USD', currency()->getUserCurrency()))) }}
                                        </span></h4>
                                    <a href="{{ url('book-instantly/' . $doctor->user->id . '/' . '1') }}"
                                        class="btn btn-primary w-100" style="max-width: 25rem;">
                                        <!-- ngIf: creating_waiting[key] --> <span translate="Book now"
                                            class="ng-scope">{{ __('Book Now') }}</span>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="card instant-session shadow light-grey-bg">
                                <div class="card-header">
                                    <h5 class="title-primary">
                                        <span ng-if="key == 30" translate="Half hour session"
                                            class="ng-scope">{{ __('Book From Schedule') }}</span>

                                    </h5>
                                </div>
                                <div class="card-body text-center">

                                    <button id="scheduleBtnModal" class="btn btn-primary w-100" style="max-width: 25rem;">
                                        <span translate="Book now" class="ng-scope">{{ __('Schedule') }}</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css"
        integrity="sha512-p4vIrJ1mDmOVghNMM4YsWxm0ELMJ/T0IkdEvrkNHIcgFsSzDi/fV7YxzTzb3mnMvFPawuIyIrHcpxClauEfpQg=="
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.autoplay').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3
                // autoplay: true,
                // autoplaySpeed: 1000,
            });

            $('#scheduleBtn').click(function(e) {
                e.preventDefault();
                var element = document.getElementById("schedule-date-picker-plugin");
                element.scrollIntoView({
                    behavior: "smooth"
                });
            });
            $('#scheduleBtnModal').click(function(e) {
                e.preventDefault();
                $("#bookingModal").modal('hide');
                var element = document.getElementById("schedule-date-picker-plugin");
                element.scrollIntoView({
                    behavior: "smooth"
                });
            });


        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        var doctor = {!! json_encode($doctor) !!};

        var date = new Date();
        var slotss = JSON.parse($('#sall').val());
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

        $('#datepicker').datepicker({
            todayBtn: true,
            startDate: today,
            weekStart: 1,
            daysOfWeekDisabled: "0,5",
            todayHighlight: true,
            format: 'yyyy/mm/dd'
        });
        $('#datepicker').on('changeDate', function() {
            $('#my_hidden_input').val(
                $('#datepicker').datepicker('getFormattedDate')
            );
            var curr_date = $('#datepicker').datepicker('getFormattedDate'); //.split("/")

            $.ajax({
                url: "{{ url('getavailability') }}",
                method: "post",
                data: {
                    "date": curr_date,
                    "doctor_id": doctor.user.id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('#sall').val(JSON.stringify(data));
                    covertTimeToTimeZone();
                    $('#m').prop("disabled", false);
                },
                error: function(err) {
                    console.log(err);
                }
            });

        });

        function setUserTime() {
            $('#user_time').val($('#m').find(':selected').attr('ut'));
        }
        $(document).ready(function() {
            $("#makeAppointmentBtn").click(function() {
                var data = {
                    'doctor_id': doctor.user.id,
                    'timezone': $('#timezone').val(),
                    'user_time': $('#user_time').val(),
                    'time': $('#m').val(),
                    'date': $('#my_hidden_input').val(),
                }
                validateInput();
                console.log(data);
                $.ajax({
                    url: "{{ url('appointment') }}",
                    method: "post",
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        alert('Your appointment has been sent to approval');
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });

        function validateInput() {
            isAllValid = true;
            if ($('#timezone').val() == '')
                isAllValid = false;
            if ($('#user_time').val() == '')
                isAllValid = false;
            if ($('#m').val() == '')
                isAllValid = false;
            if ($('#my_hidden_input').val() == '')
                isAllValid = false;
            if (isAllValid) {

            } else {
                alert('All fields are required');
                return;

            }

        }

        function convertUpdatedTime() {
            var element = $('#timezone').find('option:selected');
            var tzoffset = element.attr("ofs");
            var timezoneOffset = tzoffset.replace(":", ".");
            var nt = [];
            slotss.forEach((time, index) => {
                if (time['st'].includes('AM')) {
                    nt[index] = time['st'].replace('AM', '');
                    nt[index] = parseInt(nt[index]) + parseInt(timezoneOffset);
                } else {
                    nt[index] = time['st'].replace('PM', '');
                    if (parseInt(time['st']) != 12) {
                        nt[index] = parseInt(time['st']) + 12;
                    }
                    nt[index] = parseInt(nt[index]) + parseInt(timezoneOffset);
                }
            });
            // console.log(nt);
            nt.forEach((ntime, index) => {
                // console.log(ntime.toString().length);
                if (ntime.toString().length == 1) {
                    ntime = '0' + ntime;
                }
                let timeString = ntime + ':00:00';
                console.log(timeString);
                // Append any date. Use your birthday.
                let timeString12hr = new Date('1970-01-01' + timeString + 'Z')
                    .toLocaleTimeString({}, {
                        timeZone: 'UTC',
                        hour12: true,
                        hour: 'numeric',
                        minute: 'numeric'
                    });
                nt[index] = timeString12hr;
                console.log(nt);
            });
            // console.log(nt);    
            var opt = '<option value="">Select time</option>';
            nt.forEach((nslot, index) => {
                opt += '<option ut = "" value="' + nslot + '">' + nslot + '</option>';
            });
            $('#m').html(opt);
        }

        function covertTimeToTimeZone() {
            slotss = JSON.parse($('#sall').val());
            slotss = Object.values(slotss);
            var element = $('#timezone').find('option:selected');
            var tzoffset = element.attr("ofs");
            var timezoneOffset = tzoffset.replace(":", ".");
            var nt = [];
            console.log('Slots');
            console.log(slotss);
            slotss.forEach((time, index) => {
                if (time.includes('AM')) {
                    nt[index] = time.replace('AM', '');
                    nt[index] = parseInt(nt[index]) + parseInt(timezoneOffset);
                    if (nt[index] < 0) {
                        nt[index] = nt[index] + 24;
                    }
                    if (nt[index] > 24) {
                        nt[index] = nt[index] - 24;
                    }
                } else {
                    nt[index] = time.replace('PM', '');
                    if (parseInt(time) != 12) {
                        nt[index] = parseInt(time) + 12;
                    }
                    nt[index] = parseInt(nt[index]) + parseInt(timezoneOffset);
                    console.log(nt[index]);
                    if (nt[index] > 24) {
                        nt[index] = nt[index] - 24;
                    }
                }
            });

            nt.forEach((ntime, index) => {
                // console.log(ntime.toString().length);
                if (ntime.toString().length == 1) {
                    ntime = '0' + ntime;
                }
                let timeString = ntime + ':00';
                // Append any date. Use your birthday.
                let timeString12hr = new Date('1970-01-01T' + timeString + 'Z')
                    .toLocaleTimeString({}, {
                        timeZone: 'UTC',
                        hour12: true,
                        hour: 'numeric',
                        minute: 'numeric'
                    });
                nt[index] = timeString12hr;
            });
            var opt = '<option value="">Select time</option>';
            nt.forEach((nslot, index) => {
                opt += '<option ut="' + nslot + '" value="' + slotss[index] + '">' + nslot + '</option>';
            });
            $('#m').html(opt);


        }
    </script>
@endsection
