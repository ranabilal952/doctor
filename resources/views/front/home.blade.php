@extends('front.layout')
@section('title')
    Home Page
@endsection
@section('content')
    <section class="image_text">

        <div class="text_img">
            <img src="{{ url('web/assets/home.png') }}" alt="" />
        </div>
        <div class="text_first">
            <h1 class="text_h1 col-12 col-sm-7">تحدث مع معالج نفسي اونلاين</h1>
            <p class="text_p">دكتورك أول موقع للعلاج النفسى فى الشرق الأوسط</p>
            <div class="text_a">
                <a href="" class="imgtxt_a">ابدأ الأن</a>
            </div>
        </div>
    </section>
    <div class="text-center mt-3">
        <h1>{{ $title ? $title->title : 'Temporary Title' }}</h1>
        <div style="padding: 2% 20% 0% 20%;">
            <p>{{ $title
                ? $title->description
                : 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error impedit iusto dolores repudiandae numquam
                                                                                                                                                    minus explicabo, placeat non possimus, temporibus fugiat tenetur dolorem velit ratione assumenda quidem quia
                                                                                                                                                    commodi asperiores!' }}
            </p>
        </div>
    </div>
    <!-- doctor -->
    <div class="doctor-home">
        <div class="container">
            <div class="row">

                @foreach ($doctor as $doctor)
                    <div class="col-lg-3 col-md-4 col-sm-12 mt-2 mb-2">
                        <div class="card doc_doctor">
                            <div class="top-bi">
                                <div class="whatsapp-service"><i class="lab la-whatsapp" style="margin-right: 3px;"></i>
                                </div>
                                <div class="chat-service" style="background: #138DE7;">
                                    <i class="las la-comment-alt" style="margin-right: 4px;"></i>
                                </div>
                                <div class="video-service" style="background: #138DE7;">
                                    <i class="las la-video" style="margin-right: 4px; font-size: 15px;"></i>
                                </div>
                            </div>
                            <div class="top-doctor-item-available-alert mt-1 online" style="float: right;">
                                <span>{{ $doctor->availablity }} </span></div>
                            <div class="top-doctor-item-img">
                                <img alt="ربيع الحوراني" src="{{ url($doctor->image ?? '') }}">
                                <i class="doctor-item-availablity online"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="text-center">{{ $doctor->doctor_name }}</h5>
                                <p class="text-center"> {{ $doctor->doctor_specility }}</p>
                                <div class="text-center">
                                    ( {{ $doctor->total_rating }} )
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="#" class="btn"
                                        style="margin: 5px; width: 50%;font-size: 18px;">{{ $doctor->discount_price }}
                                        USD</a>
                                    <a href="#" class="btn"
                                        style="margin: 5px;width: 50%;font-size: 18px;"><del>{{ $doctor->orignal_price }}
                                            USD</del> </a>
                                </div>
                                <div class="d-flex">
                                    <a href="{{ url('doctor_detail', $doctor->id) }}" class="btn btn-primary"
                                        style="margin: 5px;width: 50%;color: black;background-color: #D6E0F5; border:none;">عرض</a>
                                    <a href="{{ url('doctor_detail', $doctor->id) }}" class="btn btn-primary"
                                        style="margin: 5px;width: 50%;color: #fff;background-color: #0d6efd;border-color: #0d6efd;">احجز
                                        الأن</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-lg-3 col-md-4 col-sm-12 mt-2 mb-2">

                    <div class="card doc_doctor">
                        <div class="top-bi">
                            <div class="whatsapp-service"><i class="lab la-whatsapp" style="margin-right: 3px;"></i></div>
                            <div class="chat-service" style="    background: #138DE7;   "><i class="las la-comment-alt"
                                    style="margin-right: 4px;"></i></div>
                            <div class="video-service" style="    background: #138DE7;
                                                                "><i class="las la-video"
                                    style="margin-right: 4px; font-size: 15px;"></i>
                            </div>
                        </div>
                        <div class="top-doctor-item-available-alert mt-1 online" style="float: right;"><span> </span></div>
                        <div class="top-doctor-item-img">
                            <img ng-src="https://api.doctoorc.com/wp-content/uploads/2021/08/الدكتور-ربيع-الحوراني.webp"
                                alt="ربيع الحوراني"
                                src="https://api.doctoorc.com/wp-content/uploads/2021/08/الدكتور-ربيع-الحوراني.webp">
                            <i class="doctor-item-availablity online"
                                ng-class="$ctrl.doctor.online ? 'online' : 'offline'"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="text-center">د. ميراي فرنسيس</h5>
                            <p class="text-center">اخصائي نفسي</p>
                            <div class="text-center">
                                (13)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            <div class="d-flex">
                                <a href="#" class="btn"
                                    style="margin: 5px; width: 50%;font-size: 18px;">1576PKR</a>
                                <a href="#" class="btn"
                                    style="margin: 5px;width: 50%;font-size: 18px;"><del>1576PKR</del> </a>
                            </div>

                            <div class="d-flex">
                                <a href="details.html" class="btn btn-primary"
                                    style="margin: 5px;width: 50%;color: black;background-color: #D6E0F5; border:none;">عرض</a>
                                <a href="details.html" class="btn btn-primary" style="margin: 5px;
                                                width: 50%;
                                                color: #fff;
                                                background-color: #0d6efd;
                                                border-color: #0d6efd;">احجز الأن</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 mt-2 mb-2">

                    <div class="card doc_doctor">
                        <div class="top-bi">
                            <div class="whatsapp-service"><i class="lab la-whatsapp" style="margin-right: 3px;"></i></div>
                            <div class="chat-service" style="    background: #138DE7;   "><i class="las la-comment-alt"
                                    style="margin-right: 4px;"></i></div>
                            <div class="video-service" style="    background: #138DE7;
                                                                "><i class="las la-video"
                                    style="margin-right: 4px; font-size: 15px;"></i>
                            </div>
                        </div>
                        <div class="top-doctor-item-available-alert mt-1 online" style="float: right;"><span> </span></div>
                        <div class="top-doctor-item-img">
                            <img ng-src="https://api.doctoorc.com/wp-content/uploads/2021/08/الدكتور-ربيع-الحوراني.webp"
                                alt="ربيع الحوراني"
                                src="https://api.doctoorc.com/wp-content/uploads/2021/08/الدكتور-ربيع-الحوراني.webp">
                            <i class="doctor-item-availablity online"
                                ng-class="$ctrl.doctor.online ? 'online' : 'offline'"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="text-center">د. ميراي فرنسيس</h5>
                            <p class="text-center">اخصائي نفسي</p>
                            <div class="text-center">
                                (13)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            <div class="d-flex">
                                <a href="#" class="btn"
                                    style="margin: 5px; width: 50%;font-size: 18px;">1576PKR</a>
                                <a href="#" class="btn"
                                    style="margin: 5px;width: 50%;font-size: 18px;"><del>1576PKR</del> </a>
                            </div>

                            <div class="d-flex">
                                <a href="details.html" class="btn btn-primary"
                                    style="margin: 5px;width: 50%;color: black;background-color: #D6E0F5; border:none;">عرض</a>
                                <a href="details.html" class="btn btn-primary" style="margin: 5px;
                                                width: 50%;
                                                color: #fff;
                                                background-color: #0d6efd;
                                                border-color: #0d6efd;">احجز الأن</a>
                            </div>

                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- <button class="btn btn-primary text-center">Show all doctors</button> -->
        </div>
    </div>
    <!-- accourdin -->
    <div class="row mt-5">
        <h3 class="text-center" style="padding: 45px; font-size: 40px; font-weight: 700">
            اسئلة حول دكتورك | طبيب نفسي اونلاين
        </h3>
        <div class="col-lg-12" style="padding: 0px 10%">
            <div class="accordion" id="accordionExample">
                @foreach ($accordians as $accordian)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $accordian->id }}" aria-expanded="true"
                                aria-controls="collapseOne">
                                <strong> {{ $accordian->title }}</strong>
                            </button>
                        </h2>
                        <div id="collapse{{ $accordian->id }}" class="accordion-collapse collapse show"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {{ $accordian->description }}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- counter -->
    <section class="wow mt-5">
        <div class="">
            <div class="row">
                <h3 class="text-center" style="padding: 45px; font-size: 40px; font-weight: 700">
                    إحصائيات موقع دكتورك | دكتور نفسي
                </h3>
                <div class="
          col-md-3 col-sm-6
          bottom-margin
          text-center
          counter-section
          wow
          fadeInUp
          sm-margin-bottom-ten
          animated
        "
                    data-wow-duration="600ms" style="
                                                          visibility: visible;
                                                          animation-duration: 600ms;
                                                          margin-bottom: 30px;
                                                          animation-name: fadeInUp;
                                                        ">
                    <span class="timer counter alt-font appear"
                        style="font-size: 50px; color: #3362cc; font-weight: 700">{{ $counter->number_patient ?? '0' }}</span>
                    <span class="counter-title">عدد المتعالجين</span>
                </div>
                <!-- end counter -->
                <div class="
          col-md-3 col-sm-6
          bottom-margin
          text-center
          counter-section
          wow
          fadeInUp
          sm-margin-bottom-ten
          animated
        "
                    data-wow-duration="600ms" style="
                                                          visibility: visible;
                                                          animation-duration: 600ms;
                                                          margin-bottom: 30px;
                                                          animation-name: fadeInUp;
                                                        ">
                    <span class="timer counter alt-font appear"
                        style="font-size: 50px; color: #3362cc; font-weight: 700">{{ $counter->number_session ?? '0' }}</span>
                    <span class="counter-title">عدد الجلسات المنتهية</span>
                </div>
                <!-- end counter -->
                <!-- counter -->
                <div class="
          col-md-3 col-sm-6
          bottom-margin-small
          text-center
          counter-section
          wow
          fadeInUp
          xs-margin-bottom-ten
          animated
        "
                    data-wow-duration="900ms" style="
                                                          visibility: visible;
                                                          animation-duration: 900ms;
                                                          margin-bottom: 30px;
                                                          animation-name: fadeInUp;
                                                        ">
                    <span class="timer counter alt-font appear"
                        style="font-size: 50px; color: #3362cc; font-weight: 700">{{ $counter->treated_case ?? '0' }}</span>
                    <span class="counter-title">الحالات التي تم علاجها</span>
                </div>
                <!-- end counter -->
                <!-- counter -->
                <div class="
          col-md-3 col-sm-6
          text-center
          counter-section
          wow
          fadeInUp
          animated
        "
                    data-wow-duration="1200ms" style="
                                                          visibility: visible;
                                                          animation-duration: 1200ms;
                                                          margin-bottom: 30px;
                                                          animation-name: fadeInUp;
                                                        ">
                    <span class="timer counter alt-font appear"
                        style="font-size: 50px; color: #3362cc; font-weight: 700">{{ $counter->under_treatment ?? '0' }}</span>
                    <span class="counter-title">حالات تحت العلاج</span>
                </div>
                <!-- end counter -->
            </div>
        </div>
    </section>
    <!-- world -->
    <section class="container">
        <div class="row">
            <div class="col-lg-6">
                <iframe width="100%" height="480" src="{{ $websiteVideoLink->video_link ?? '' }}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid" src="{{ url('web/assets/images/map.svg') }}" alt="" />
            </div>
        </div>
    </section>
    <!-- blog -->
    <section class="blog-home mt-5 ">
        <h3 class="text-center" style="padding: 45px; font-size: 40px">
            مقالات المعالجين النفسيين
        </h3>
        <div class="">
            <div class="row">
                <div class="col-lg-4 ml-5 mr-5">
                    <a href="{{ url('blog_detail', $blog->id) }}" style="text-decoration: none">
                        <div class="card mb-4">
                            <img class="card-img-top" src="{{ url($blog->image ?? '') }}" alt="Card image cap" />
                            <div class="card-body">
                                <p class="mr-2">{{ $blog->created_at->toDateString() }}</p>
                                <p class="card-text">{{ $blog->blog_title_arabic }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('web/assets/images/blog2.webp') }}"
                            alt="Card image cap" />
                        <div class="card-body">
                            <p>Jun 14, 2021</p>
                            <p class="card-text">فوبيا الأماكن المزدحمة: الأسباب والعلاج</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ url('web/assets/images/blog1.webp') }}"
                            alt="Card image cap" />
                        <div class="card-body">
                            <p>Jun 14, 2021</p>
                            <p class="card-text">فوبيا الأماكن المزدحمة: الأسباب والعلاج</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
