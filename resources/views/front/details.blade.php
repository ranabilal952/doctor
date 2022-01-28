@extends('front.layout')
@section('title')
    Details Doctor
@endsection

<style>
    .disabled {
        text-decoration: line-through !important;
    }

    .datepicker-days {
        font-size: 23px !important;
    }

    .highlighted {
        background: white !important;
    }

</style>
@section('content')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
                        <div class="col-12 col-sm-3 col-lg-3">
                            <div class="doctor-single-avatar-wrap">
                                <div class="doctor-single-avatar">
                                    <img src="{{ url($doctor->image ?? '') }}" alt="">
                                    <i class="doctor-item-availablity online"></i>
                                </div>
                            </div>
                            <div class="top-doctor-services" style="display: inline-flex;">
                                <div class="">
                                    <img src="{{ url('web/assets/ma.PNG') }}" alt="" style="width:35px;margin:5px">
                                </div>
                                <div class="" >
                                    <img src="{{ url('web/assets/wat.PNG') }}" alt="" style="width:35px;margin:5px">
                                </div>
                                <div class="" >
                                    <img src="{{url('web/assets/zo.PNG')}}" alt="" style="width:35px;margin:5px">
                                </div>
                            </div>
                        </div>
                        <!-- col3 -->
                        <div class="col-12 col-sm-4 col-lg-5 col-xl-4 ">
                            <div class="doctor-single-info text-md-start text-center ">
                                <h1 class="ng-binding "> {{ $doctor->doctor_name }}</h1>
                                <h6 class="ng-binding "> {{ $doctor->doctor_specility }}</h6>
                                <h5 class="fw-normal text-white m-0 "><span class="ng-scope ">اللغة</span>:
                                    <div class="me-2 d-inline ">العربية</div>
                                    <div class="me-2 d-inline ">الإنجليزية</div>
                                    <div class="me-2 d-inline ">الفرنسية</div>
                                </h5>

                                {{-- <h5 class="fw-normal text-white m-0 mt-3 ng-scope "><span class="ng-scope ">سنوات
                                        الخبرة</span>:
                                    <span class="ng-binding ">{{ $doctor->year_experience }}</span>
                                </h5> --}}


                                </h5>
                                <div class="doctor-rate ">
                                    <span class="fa fa-star checked "></span>
                                    <span class="fa fa-star checked "></span>
                                    <span class="fa fa-star checked "></span>
                                    <span class="fa fa-star checked "></span>
                                    <span class="fa fa-star checked "></span>
                                    <span class="ng-binding">( {{ $doctor->total_rating }} )</span>
                                </div>
                                <!-- doctor-rate -->
                            </div>
                            <!-- doctor-single-info -->
                        </div>
                        <!-- col9 -->
                        <div class="col-12 col-sm-5 col-lg-4 col-xl-5 ">

                            <div class="card ng-scope ">
                                <div class="card-body ">

                                    <div class="d-inline ">الاكتئاب<span>,</span> </div>

                                    <div class="d-inline ">القلق<span>,</span> </div>

                                    <div class="d-inline ">مشاكل العلاقات<span>,</span> </div>

                                    <div class="d-inline ">الاكتئاب<span>,</span> </div>

                                    <div class="d-inline ">الفوبيا<span>,</span> </div>

                                    <div class="d-inline ">اضطراب الهوية الجنسية<span>,</span> </div>

                                    <div class="d-inline ">الاكتئاب<span>,</span> </div>

                                    <div class="d-inline ">مشاكل العلاقات<span>,</span> </div>
                                    <div class="d-inline ">الاكتئاب<span>,</span> </div>

                                    <div class="d-inline ">القلق<span>,</span> </div>

                                    <div class="d-inline ">مشاكل العلاقات<span>,</span> </div>

                                    <div class="d-inline ">الاكتئاب<span>,</span> </div>

                                    <div class="d-inline ">الفوبيا<span>,</span> </div>

                                    <div class="d-inline ">اضطراب الهوية الجنسية<span>,</span> </div>

                                    <div class="d-inline ">الاكتئاب<span>,</span> </div>

                                    <div class="d-inline ">مشاكل العلاقات<span>,</span> </div>
                                    <div class="d-inline ">الاكتئاب<span>,</span> </div>

                                    <div class="d-inline ">القلق<span>,</span> </div>

                                    <div class="d-inline ">مشاكل العلاقات<span>,</span> </div>

                                    <div class="d-inline ">الاكتئاب<span>,</span> </div>

                                    <div class="d-inline ">الفوبيا<span>,</span> </div>

                                    <div class="d-inline ">اضطراب الهوية الجنسية<span>,</span> </div>

                                    <div class="d-inline ">الاكتئاب<span>,</span> </div>

                                    <div class="d-inline ">مشاكل العلاقات<span>,</span> </div>

                                    <div class="d-inline "><span>,</span> </div>

                                    <a href="# " data-id="doctor-info-tab " translate="More "
                                        class="ng-scope ">More</a>
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
                            aria-controls="ex3-tabs-1" aria-selected="true">التقييمات</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab"
                            aria-controls="ex3-tabs-2" aria-selected="false">الشخصي الملف </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex3-tab-3" data-mdb-toggle="tab" href="#ex3-tabs-3" role="tab"
                            aria-controls="ex3-tabs-3" aria-selected="false">الفيديوهات</a>
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
                            <h5 class="ng-binding ">About therapist</h5>
                        </div>
                        <div class="doctor-info-page-sesction mb-3 ng-binding " ng-bind-html="tAttr(doctor.description)">
                            {{ $doctor->about_therapist }}</div>
                        <div class="title-forth mb-3 mt-4">
                            <h5 class="ng-binding">Certificates</h5>
                        </div>
                        <div class="doctor-info-page-sesction mb-3 ng-binding" ng-bind-html="tAttr(doctor.certificates)">-
                            {{ $doctor->certification_detail }}</div>
                        <div class="title-forth mb-3 mt-4">
                            <h5 class="ng-binding">Experiences</h5>
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
                                        <iframe width="100%" height="480" src="{{ $video->video_url }}"
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
                    <div class="">
                        <button class="btn btn-lg btn-outline-white w-100 fw-bold mb-3 "
                            style="border: 2px solid black;color: black;">احجز فورا</button>
                        @if ($doctor->user->onlineStatus && $doctor->user->onlineStatus->is_active)
                            @php
                                $date1 = DateTime::createFromFormat('h:i a', now());
                                $date2 = DateTime::createFromFormat('h:i a', $doctor->user->onlineStatus->online_from);
                                $date3 = DateTime::createFromFormat('h:i a', $doctor->user->onlineStatus->online_to);
                                
                            @endphp
                            @if ($date1 > $date2 && $date1 < $date3)
                                <button class="btn btn-lg btn-outline-white w-100 fw-bold mb-3 "
                                    style="border: 2px solid black;color: black;">Book Instantly</button>
                            @endif

                        @endif
                        {{-- <a class="btn btn-lg btn-outline-white w-100 fw-bold mb-3 ng-scope" style="border: 2px solid black;color: black;">احجز من الجدول</a> --}}
                        {{-- <a class="btn btn-lg btn-outline-white w-100 fw-bold mb-3 ng-scope"
                            style="border: 2px solid black;color: black;">عروض الجلسات</a> --}}

                        <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist" style=" ">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex3-tab-4" data-mdb-toggle="tab" href="#ex3-tabs-4"
                                    role="tab" aria-controls="ex3-tabs-4" aria-selected="false"
                                    style="border: 2px solid black;color: black;">عروض الجلسات </a>
                            </li>

                        </ul>
                    </div>
                    <h1 class="ng-binding">المواعيد المتاحة</h1>
                    <select name="timezone" class="form-control inline-field babel-ignore timezone-select-inactive"
                        id="timezone" onchange="covertTimeToTimeZone()">
                        @foreach ($timezones as $zone)
                            <option value="{{ $zone->name }}" @if ($zone->name == 'Europe/London') selected @endif ofs='{{ $zone->offset }}'>
                                {{ $zone->name }} ({{ $zone->offset }})
                            </option>
                        @endforeach
                    </select>
                    <br>
                    <div id="schedule-date-picker-plugin" class=""
                        style="background-color: white;;border:1px solid grey">

                        <div id="schedule-date-picker-header" class="text-center" style="display: inline-flex;">
                            <div class="d-inline-block ng-scope">
                                <span class=""> 30 minutes
                                </span>:
                                <span
                                    class="ng-binding">{{ currency(doubleVal($doctor->thirty_minute_price), 'USD', currency()->getUserCurrency()) }}
                                </span>
                            </div>
                            <div class="d-inline-block ng-scope">
                                <span class="mx-3">-</span>
                                <span class="ng-scope">60 minutes</span>:
                                <span class="ng-binding">{{ currency(doubleVal($doctor->sixty_minute_price), 'USD', currency()->getUserCurrency()) }}</span>
                            </div>
                        </div>
                        <div class="row autoplay">
                            @foreach ($slotTimes as $ss => $time)

                                <div class="col-lg-3 text-center mt-3 mb-5"
                                    style="margin-right:15px;border:1px solid rgba(0,0,0,.125);">
                                    <div class="heading bg-primary " style="    width: 145%;
                                            color: white;
                                            text-align: center;
                                            margin-left: -12px;">
                                        <small> {{ \Carbon\Carbon::parse($ss)->format('l') }}</small>
                                        <br>
                                        <small style="">{{ \Carbon\Carbon::parse($ss)->format('d/m') }}</small>
                                    </div>
                                    @foreach ($time as $key => $value)
                                        @if (Auth::check())
                                            <a href="{{ url('payment-schedule', $value->id) }}">
                                                <div class="d-block">
                                                    <div class="scheduleTime text-primary">
                                                        <small>{{ $value->time }}</small>
                                                    </div>
                                                    <small class="text-muted"> ({{ $value->duration }}
                                                        minutes)</small>
                                                </div>
                                            </a>
                                        @else
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">
                                                <div class="d-block">
                                                    <div class="scheduleTime text-primary">
                                                        <small>{{ $value->time }}</small>
                                                    </div>
                                                    <small class="text-muted"> ({{ $value->duration }}
                                                        minutes)</small>
                                                </div>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>

                            @endforeach
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('.autoplay').slick({
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                autoplay: true,
                                autoplaySpeed: 2000,
                            });
                        });
                    </script>
                    {{-- <form action="{{ url('appointment.store') }}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="form-group col-lg-12"><br><br>
                                    @if (!Auth::check())
                                        <p class="text-center" style="color: red;font-weight:bold">For making
                                            appointment you have to login first</p>
                                    @endif
                                    <div class="w-100 text-center">
                                        <label class="text-center" for="inputPassword4"><strong>Set your time zone to
                                                continue</strong></label>
                                    </div>
                                    <select name="timezone"
                                        class="form-control inline-field babel-ignore timezone-select-inactive"
                                        id="timezone" onchange="covertTimeToTimeZone()">
                                        @foreach ($timezones as $zone)
                                            <option value="{{ $zone->name }}" @if ($zone->name == 'Europe/London') selected @endif
                                                ofs='{{ $zone->offset }}'>
                                                {{ $zone->name }} ({{ $zone->offset }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>



                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 offset-2 ">
                                    <div id="datepicker"></div>
                                    <input id="date" name="date" type="hidden" id="my_hidden_input">
                                    <input type="hidden" name="slotsall" id="sall" value="{{ json_encode($slots) }}" />
                                </div>
                            </div>
                    </div>
                    <div>

                    </div>

                </div>
                </form> --}}

                    {{-- <div class="form-group col-md-6  ">
                    <div id="datepicker"></div>
                    <input name="date" type="hidden" id="my_hidden_input">
                    <input type="hidden" name="slotsall" id="sall" value="{{ json_encode($slots) }}" />
                </div>
                <div class="form-group col-md-6 d-inline">
                    <label style="color: black" for="inputPassword4"><strong>Select available time</strong></label>
                    <select name="time" id="m" class="form-control inline-field babel-ignore timezone-select-inactive"
                        id="m" disabled onchange="setUserTime()">
                        <option value="">Select time</option>
                        @foreach ($slots as $slottime)
                            <option class="dis{{ $slottime->st }}" value="{{ $slottime->st }}">
                                {{ $slottime->st }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="ususer_time" value="" id="user_time">

                </div>
                @if (Auth::check())
                    <button id="makeAppointmentBtn" class=" btn btn-primary mt-3"> Make Appointment</button>
                @endif --}}

                </div>
                {{-- <a href="#" data-carousel-dir="left" id="schedule-date-picker-left"><i class="fal fa-caret-left" aria-hidden="true"></i></a>
                    <a href="#" data-carousel-dir="right" id="schedule-date-picker-right"><i class="fal fa-caret-right" aria-hidden="true"></i></a> --}}
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
            // daysOfWeekHighlighted: "0,1,2,3,4,5,6",
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
                    // var newdata = [];
                    $('#sall').val(JSON.stringify(data));
                    console.log(data);
                    // return;
                    covertTimeToTimeZone();
                    $('#m').prop("disabled", false);
                    // var response = JSON.parse(data);
                    // var i = 0;
                    // $('#m').find('option').remove(); 
                    //     $.each(response,function(key, value){
                    //         $('#m').append('<option value=' + value + '>' + value + '</option>');
                    //     });
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
            // console.log(slotss);return;
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
            console.log('Afer Proccessing');
            console.log(nt);
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
            // console.log(nt);
            // console.log(nt);    
            var opt = '<option value="">Select time</option>';
            nt.forEach((nslot, index) => {
                opt += '<option ut="' + nslot + '" value="' + slotss[index] + '">' + nslot + '</option>';

            });
            $('#m').html(opt);
            // console.log(slotss);
            // console.log(newslotss);

        }
    </script>
@endsection
