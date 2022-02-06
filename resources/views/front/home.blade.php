@extends('front.layout')
@section('title')
    {{ __('Home Page') }}
@endsection
@section('content')
    <section class="image_text">

        <div class="text_img">
            <img src="{{ url('web/assets/home.png') }}" alt="" />
        </div>
        <div class="text_first">
            <h1 class="text_h1 col-12 col-sm-7">{{ __('Talk to a therapist online') }}
            </h1>
            <p class="text_p">{{ __('Doctoorc is the first psychiatric treatment site in the Middle East') }}</p>
            <div class="text_a">
                <a href="{{ url('all_doctor') }}" class="imgtxt_a">{{ __('Start now') }}</a>
            </div>
        </div>
    </section>

    <!-- doctor -->
    <div class="doctor-home">
        <div class="">
            <div class="row">
                @foreach ($doctor as $doctor)
                    <div class="col-lg-3 col-md-4 col-sm-12 mt-2 mb-2 p-5">
                        <div class="card doc_doctor p-2">
                            <div class="top-bi">
                                <div class="">
                                    <img src="{{ asset('web/assets/ma.png') }}" alt="" style="width:35px;margin:7px">
                                </div>
                                <div class="">
                                    <img src="{{ asset('web/assets/wat.png') }}" alt="" style="width:35px;margin:7px">
                                </div>
                                <div class="">
                                    <img src="{{ asset('web/assets/zo.png') }}" alt="" style="width:35px;margin:7px">
                                </div>
                            </div>
                            <div class=" mt-1 online" style="float: right;">
                                @if (Cache::has('is_online' . $doctor->user->id))
                                    <span class="top-doctor-item-available-alert"
                                        style="    float: right;
                                                                                                           margin-top: -8px;">{{ __('Available now') }}
                                    </span>
                                @else
                                    <span class="mt-1 top-doctor-item-not-available-alert"
                                        style="    float: right;
                                                                                                                                                margin-top: -8px;">
                                    </span>
                                @endif


                            </div>
                            <div class="top-doctor-item-img">
                                <a href="{{ url('doctor_detail', $doctor->id) }}">
                                    <img alt="ربيع الحوراني" src="{{ asset($doctor->image ?? '') }}"></a>
                                @if (Cache::has('is_online' . $doctor->user->id))
                                    <i class="doctor-item-availablity online"></i>
                                @else
                                    <i class="doctor-item-not-availablity online"></i>
                                @endif
                            </div>
                            <div class="card-body">
                                <h5 class="text-center">{{ $doctor->user->name ?? __('Not Available') }}</h5>
                                <p class="text-center">
                                    {{ App::getLocale() == 'en' ? $doctor->doctor_specility : $doctor->doctor_specility_ar }}
                                </p>
                                <p class="text-center">
                                    {{ __('Years of experience') }}
                                    ({{ $doctor->year_experience ?? 'Not Available' }})
                                </p>
                                <div class="text-center">
                                    ({{ $doctor->total_rating }})
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="#" class="btn"
                                        style="margin: 5px; width: 50%;font-size: 18px;">{{ currency()->getUserCurrency() }}
                                        {{ ceil(preg_replace('/[^A-Za-z0-9\-]/', '', currency(intVal($doctor->discount_price), 'USD', currency()->getUserCurrency()))) }}
                                    </a>
                                    <a href="#" class="btn"
                                        style="margin: 5px;width: 50%;font-size: 18px;"><del>{{ currency()->getUserCurrency() }}
                                            {{ ceil(preg_replace('/[^A-Za-z0-9\-]/', '', currency(intVal($doctor->orignal_price), 'USD', currency()->getUserCurrency()))) }}
                                        </del> </a>
                                </div>
                                <div class="d-flex">
                                    <a href="{{ url('doctor_detail', $doctor->id) }}" class="btn btn-primary"
                                        style="margin: 5px;width: 50%;color: black;background-color: #D6E0F5; border:none;">{{ __('Show') }}</a>
                                    <a href="{{ url('doctor_detail', $doctor->id) }}" class="btn btn-primary"
                                        style="margin: 5px;width: 50%;color: #fff;background-color: #0d6efd;border-color: #0d6efd;">{{ __('Book Now') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- accourdin -->
    <div class="row mt-5">
        <h3 class="text-center" style="padding: 45px; font-size: 40px; font-weight: 700">
            {{ __('Questions about your doctor | Online psychiatrist') }}
        </h3>
        <div class="col-lg-12" style="padding: 0px 10%">
            <div class="accordion" id="accordionExample">
                @foreach ($accordians as $accordian)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $accordian->id }}" aria-expanded="true"
                                aria-controls="collapseOne">
                                <strong>
                                    {{ session()->get('locale') == 'en' ? $accordian->title : $accordian->arabic_title }}</strong>
                            </button>
                        </h2>
                        <div id="collapse{{ $accordian->id }}" class="accordion-collapse collapse show"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {{ session()->get('locale') == 'en' ? $accordian->description : $accordian->arabic_description }}
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
                    {{ __('Statistics') }}
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
                    data-wow-duration="600ms"
                    style="
                                                                                                                                                                                                                                                                                                                      visibility: visible;
                                                                                                                                                                                                                                                                                                                      animation-duration: 600ms;
                                                                                                                                                                                                                                                                                                                      margin-bottom: 30px;
                                                                                                                                                                                                                                                                                                                      animation-name: fadeInUp;
                                                                                                                                                                                                                                                                                                                    ">
                    <span class="timer counter alt-font appear"
                        style="font-size: 50px; color: #3362cc; font-weight: 700">{{ $counter->number_patient ?? '0' }}</span>
                    <span class="counter-title">{{ __('Number of patients') }}</span>
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
                    data-wow-duration="600ms"
                    style="
                                                                                                                                                                                                                                                                                                                      visibility: visible;
                                                                                                                                                                                                                                                                                                                      animation-duration: 600ms;
                                                                                                                                                                                                                                                                                                                      margin-bottom: 30px;
                                                                                                                                                                                                                                                                                                                      animation-name: fadeInUp;
                                                                                                                                                                                                                                                                                                                    ">
                    <span class="timer counter alt-font appear"
                        style="font-size: 50px; color: #3362cc; font-weight: 700">{{ $counter->number_session ?? '0' }}</span>
                    <span class="counter-title">{{ __('Number of sessions ended') }}</span>
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
                    data-wow-duration="900ms"
                    style="
                                                                                                                                                                                                                                                                                                                      visibility: visible;
                                                                                                                                                                                                                                                                                                                      animation-duration: 900ms;
                                                                                                                                                                                                                                                                                                                      margin-bottom: 30px;
                                                                                                                                                                                                                                                                                                                      animation-name: fadeInUp;
                                                                                                                                                                                                                                                                                                                    ">
                    <span class="timer counter alt-font appear"
                        style="font-size: 50px; color: #3362cc; font-weight: 700">{{ $counter->treated_case ?? '0' }}</span>
                    <span class="counter-title">{{ __('Treated cases') }}</span>
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
                    data-wow-duration="1200ms"
                    style="
                                                                                                                                                                                                                                                                                                                      visibility: visible;
                                                                                                                                                                                                                                                                                                                      animation-duration: 1200ms;
                                                                                                                                                                                                                                                                                                                      margin-bottom: 30px;
                                                                                                                                                                                                                                                                                                                      animation-name: fadeInUp;
                                                                                                                                                                                                                                                                                                                    ">
                    <span class="timer counter alt-font appear"
                        style="font-size: 50px; color: #3362cc; font-weight: 700">{{ $counter->under_treatment ?? '0' }}</span>
                    <span class="counter-title">{{ __('Cases under treatment') }}</span>
                </div>
                <!-- end counter -->
            </div>
        </div>
    </section>
    <!-- world -->
    <section class="mt-3 p-3">
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
            {{ __('Psychotherapist articles') }} </h3>
        <div class="">
            <div class="row">
                <div class="col-lg-4 ml-5 mr-5" style="flex-shrink: 1;">
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

            </div>
        </div>
    </section>
@endsection
