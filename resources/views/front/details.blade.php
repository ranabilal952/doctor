@extends('front.layout')
@section('title')
    Details Doctoor
@endsection
@section('content') 

<!-- Google Fonts -->

<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.css"
  rel="stylesheet"
/>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.0/mdb.min.js"
></script>
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
                            <div class="video-service" style="margin: 5px; margin-right: 28px; margin-top: 20px; background: #138DE7;">
                                <i class="las la-video mt-1" style=" font-size: 18px;"></i>
                            </div>
                            <div class="chat-service" style="margin: 5px;margin-top: 20px; background: #138DE7;">
                                <i class="las la-comment-alt mt-1"></i>
                            </div>
                            <div class="whatsapp-service" style="margin: 5px;margin-top: 20px;">
                                <i class="lab la-whatsapp"></i></i>
                            </div>
                        </div>
                    </div>
                    <!-- col3 -->
                    <div class="col-12 col-sm-4 col-lg-5 col-xl-4 ">
                        <div class="doctor-single-info text-md-start text-center ">
                            <h1 class="ng-binding "> {{$doctor->doctor_name}}</h1>
                            <h6 class="ng-binding "> {{$doctor->doctor_specility}}</h6>
                            <h5 class="fw-normal text-white m-0 "><span class="ng-scope ">اللغة</span>:
                                <div class="me-2 d-inline ">العربية</div>
                                <div class="me-2 d-inline ">الإنجليزية</div>
                                <div class="me-2 d-inline ">الفرنسية</div>
                            </h5>

                            <h5 class="fw-normal text-white m-0 mt-3 ng-scope "><span class="ng-scope ">سنوات الخبرة</span>:
                                <span class="ng-binding ">{{$doctor->year_experience}}</span>
                            </h5>


                            </h5>
                            <div class="doctor-rate ">
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked "></span>
                                <span class="ng-binding">( {{$doctor->total_rating}} )</span>
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

                                <a href="# " data-id="doctor-info-tab " translate="More " class="ng-scope ">More</a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- Tabs navs -->
            <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist" style="background: #E7F3F5; ">
                <li class="nav-item" role="presentation">
                  <a  class="nav-link active" id="ex3-tab-1" data-mdb-toggle="tab" href="#ex3-tabs-1" role="tab" aria-controls="ex3-tabs-1" aria-selected="true">التقييمات</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab" aria-controls="ex3-tabs-2" aria-selected="false">الشخصي الملف </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="ex3-tab-3" data-mdb-toggle="tab" href="#ex3-tabs-3" role="tab" aria-controls="ex3-tabs-3" aria-selected="false">الفيديوهات</a>
                </li>
              </ul>
              <!-- Tabs navs -->
              
              <!-- Tabs content -->
              <div class="tab-content" id="ex2-content">
                <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                    <div class="doctor-single-tab-comments ">
                        <div ng-repeat="rate in rates " class="doctor-single-tab-comment ng-scope ">
                            <div class="d-flex ">
                                <div class="flex-shrink-0 ">
                                    <div class="doctor-comment-avatar " style="background-image: url(//secure.gravatar.com/avatar/1397658d2c23edcf97a73fda84c04460?d=mm); "></div>
                                </div>
                                <div class="flex-grow-1 ms-3 ">
                                    <div class="doctor-single-tab-comment-co ">
                                        <h5 class="ng-binding ">{{$doctor->user_name_rating}}</h5>


                                        <div class=" ">
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                        </div>
                                        <p class="ng-binding "> {{$doctor->user_comment}}</p>
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
                    <div class="doctor-info-page-sesction mb-3 ng-binding " ng-bind-html="tAttr(doctor.description)">{{$doctor->about_therapist}}</div>
                    <div class="title-forth mb-3 mt-4">
                        <h5 class="ng-binding">Certificates</h5>
                    </div>
                    <div class="doctor-info-page-sesction mb-3 ng-binding" ng-bind-html="tAttr(doctor.certificates)">- {{$doctor->certification_detail}}</div>
                    <div class="title-forth mb-3 mt-4">
                        <h5 class="ng-binding">Experiences</h5>
                    </div>
                    <div class="doctor-info-page-sesction mb-3 ng-binding" ng-bind-html="tAttr(doctor.experiences)">
                        {{$doctor->experience_detail}}
                    </div>
                </div>
                <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
                   <div class="row">
                       <div class="col-md-4">
                        <iframe width="100%" height="480" src="{{$doctor->video_link1 ?? ''}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                       </div>                      
                        <div class="col-md-4">
                        <iframe width="100%" height="480" src="{{$doctor->video_link2 ?? ''}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                       </div>                      
                        <div class="col-md-4">
                        <iframe width="100%" height="480" src="{{$doctor->video_link3 ?? ''}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                       </div>                       
                       <div class="col-md-4">
                        <iframe width="100%" height="480" src="{{$doctor->video_link4 ?? ''}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                       </div>                       
                       <div class="col-md-4">
                        <iframe width="100%" height="480" src="{{$doctor->video_link5 ?? ''}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                       </div>
                   </div>
                </div>
              </div>
        </div>

        <div class="col-12 col-sm-12 col-lg-4 col-md-12">
            <div ng-controller="DoctorBookController" class="doctor-reservation-tool ng-scope">
                <div class="">
                    <button class="btn btn-lg btn-outline-white w-100 fw-bold mb-3 "  style="border: 2px solid black;color: black;">احجز فورا</button>
                    {{-- <a class="btn btn-lg btn-outline-white w-100 fw-bold mb-3 ng-scope" style="border: 2px solid black;color: black;">احجز من الجدول</a> --}}
                    <a class="btn btn-lg btn-outline-white w-100 fw-bold mb-3 ng-scope" style="border: 2px solid black;color: black;">عروض الجلسات</a>
                </div>
                <h1 class="ng-binding">المواعيد المتاحة</h1>
             
            <div id="schedule-date-picker-plugin" class="app-carousel-wrap" ng-class="schedule_loading ? 'schedule-loading' : '' ">
                {{-- <div id="app-schedule-loading">
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div> --}}
                <div id="schedule-date-picker-header" class="text-center">
                    
                    <div  class="d-inline-block ng-scope">
                        <span class="ng-scope">30 minutes
                            </span>: 
                            <span class="ng-binding">{{$doctor->thirty_minute_price}} USD</span>
                        </div>
                   <div  class="d-inline-block ng-scope">
                    <span class="mx-3">-</span>
                    <span  class="ng-scope">60 minutes</span>: 
                    <span>{{$doctor->sixty_minute_price}} USD</span></div>
                </div>
                <div carousel="" items="calandar_dates"   id="schedule-date-picker" class="app-carousel ng-isolate-scope" style="">
                    <div id="schedule-date-picker-inner" class="app-carousel-inner" style="width: 300px; margin-right: 0px; margin-left: 0px;">
                        <div ng-repeat="(index, time) in calandar_dates" class="schedule-picker-item item ng-scope" style="width: 100px;">
                            <div class="schedule-picker-card card">
                                <div class="card-header">
                                   <span ng-if="time.title" translate="Today" class="ng-scope">Today</span>
                                </div>
                                <div class="card-body" style="padding: 0rem;">
                                    <div class="schedule-picker-time-expand expanded" >
                                        <div ng-repeat="schedule in time.items" class="schedule-picker-time ng-scope">
                                            @if (Auth::check())
                                            <a style="padding: 8px" class="schedule-picker-time-available ng-binding ng-scope" href="{{url('available_appointment')}}">02:00 PM</a> 
                                            @else
                                            <a style="padding: 8px" class="schedule-picker-time-available ng-binding left1 left2_a" data-toggle="modal" data-target="#exampleModal" href="{{url('available_appointment')}}">02:00 PM</a> 
                                            @endif
                                            <div class="schedule-picker-time-duration">
                                                (<span class="ng-scope">30 minutes</span>)
                                            </div>
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="card-footer"><span  translate="More" class="ng-scope">More</span></div>
                            </div>
                        </div>
                       
                           
                        </div>
                   
                    </div>
                    {{-- <a href="#" data-carousel-dir="left" id="schedule-date-picker-left"><i class="fal fa-caret-left" aria-hidden="true"></i></a>
                    <a href="#" data-carousel-dir="right" id="schedule-date-picker-right"><i class="fal fa-caret-right" aria-hidden="true"></i></a> --}}
                </div>
            </div>
            
           
            </div>

        </div>
    </div>
</div>

@endsection