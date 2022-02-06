@extends('front.layout')
@section('title')
    {{ __('All Doctors') }}
@endsection
@section('content')
    <div class="online-header" style="margin-top: -200px;">
        <div class="container">
            <div class="online-header-co">
                <h1 translate="Choose your doctor now" class="ng-scope">{{ __('Choose your doctor now') }}</h1>
                <p class="ng-binding">
                    {{ __('Receive psychotherapy online while you are sitting at home. Instant sessions or at times that suit you.') }}
                </p>
            </div>

        </div>

    </div>

    <!-- wizerd -->
    <div class="mt-5">
        <p class="title-primary-boxed title-boxed ng-binding text-center"
            style="font-family: 'hnn';font-weight: bold;font-size: 1.5rem;">{{ __('Available now') }}</p>
        <p class="text-center" style="    padding: 15px;margin-right: 50px;font-size: 15px;color:#3362CC">
            {{ __('You can book with the available therapist and talk immediately') }}
        </p>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 col-md-12 col-sm-12 text-center">
                <!-- <button class="btn  button-doctor">المتاحين الأن</button> -->

            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
    {{-- online doctors --}}
    <div class=" p-5">
        <div class="row">
            @foreach ($onlineDoctors as $doctor)
                <div class="col-lg-3 col-md-4 col-sm-12 mt-2 mb-2">
                    <div class="card doc_doctor" style="background: #EAEDF2;">
                        <div class="top-bi">
                            <div class="">
                                <img src="{{ asset('web/assets/ma.png') }}" alt="" style="width:35px;margin:5px">
                            </div>
                            <div class="">
                                <img src="{{ asset('web/assets/wat.png') }}" alt="" style="width:35px;margin:5px">
                            </div>
                            <div class="">
                                <img src="{{ url('web/assets/zo.png') }}" alt="" style="width:35px;margin:5px">
                            </div>
                        </div>
                        <div class="top-doctor-item-available-alert mt-1 online"><span style=" float: right;
                                                                         margin-top: -8px;">
                            </span>
                        </div>
                        <div class="top-doctor-item-img">
                            <a href="{{ url('doctor_detail', $doctor->id) }}"> <img alt="ربيع الحوراني"
                                    src="{{ asset($doctor->image ?? '') }}"></a>
                            <i class="doctor-item-availablity online"
                                ng-class="$ctrl.doctor.online ? 'online' : 'offline'"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="text-center">{{ $doctor->user->name ?? 'Not Available' }}</h5>
                            <p class="text-center">
                                {{ App::getLocale() == 'en' ? $doctor->doctor_specility : $doctor->doctor_specility_ar }}
                            </p>
                            <p class="text-center"> {{ __('Years of experience') }}
                                ({{ $doctor->year_experience ?? 'Not Available' }})</p>
                            <div class="text-center">
                                ( {{ $doctor->total_rating }} )
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            <div class="d-flex">
                                <a href="#" class="btn" style="margin: 5px; width: 50%;font-size: 18px;">
                                    {{ currency()->getUserCurrency() }}
                                    {{ (ceil(preg_replace('/[^A-Za-z0-9\-]/','',currency(intVal($doctor->discount_price), 'USD', currency()->getUserCurrency())))) }}
                                </a>
                                <a href="#" class="btn" style="margin: 5px;width: 50%;font-size: 18px;"><del>
                                        {{ currency()->getUserCurrency() }}
                                        {{ (ceil(preg_replace('/[^A-Za-z0-9\-]/','',currency(intVal($doctor->original_price), 'USD', currency()->getUserCurrency())))) }}</del>
                                </a>
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
    <div class="mt-5">
        <p class="title-primary-boxed2 title-boxed ng-binding text-center"
            style="font-family: 'hnn';font-weight: bold;font-size: 1.5rem;">
            {{ __('Choose a doctor and book from the schedule') }}</p>
        <p class="text-center" style="    padding: 15px;margin-right: 50px;font-size: 15px;color:#3362CC">
            {{ __("You can enter the therapist's schedule, and choose a session at the time that suits you") }}</p>
        {{-- offline doctors --}}
        <div class=" p-5">
            <div class="row">
                @foreach ($offlineDoctors as $doctor)
                    <div class="col-lg-3 col-md-4 col-sm-12 mt-2 mb-2">
                        <div class="card doc_doctor" style="background: #EAEDF2;">
                            <div class="top-bi">
                                <div class="">
                                    <img src="{{ asset('web/assets/ma.png') }}" alt="" style="width:35px;margin:5px">
                                </div>
                                <div class="">
                                    <img src="{{ asset('web/assets/wat.png') }}" alt="" style="width:35px;margin:5px">
                                </div>
                                <div class="">
                                    <img src="{{ url('web/assets/zo.png') }}" alt="" style="width:35px;margin:5px">
                                </div>
                            </div>
                            <div class=" mt-1 online"><span style="    float: right;
                                                                           margin-top: -8px;">
                                </span>
                            </div>
                            <div class="top-doctor-item-img">
                                <a href="{{ url('doctor_detail', $doctor->id) }}"> <img alt="ربيع الحوراني"
                                        src="{{ asset($doctor->image ?? '') }}"></a>
                                <i class="doctor-item-not-availablity online"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="text-center">{{ $doctor->user->name ?? 'Not Available' }}</h5>
                                <p class="text-center">
                                    {{ App::getLocale() == 'en' ? $doctor->doctor_specility : $doctor->doctor_specility_ar }}
                                </p>
                                <p class="text-center"> {{ __('Years of experience') }}
                                    ({{ $doctor->year_experience ?? 'Not Available' }})</p>
                                <div class="text-center">
                                    ({{ $doctor->total_rating }})
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <div class="d-flex">
                                    <a href="#" class="btn" style="margin: 5px; width: 50%;font-size: 18px;">
                                        {{ currency()->getUserCurrency() }}
                                        {{ (ceil(preg_replace('/[^A-Za-z0-9\-]/','',currency(intVal($doctor->discount_price), 'USD', currency()->getUserCurrency())))) }}
                                        <a href="#" class="btn"
                                            style="margin: 5px;width: 50%;font-size: 18px;"><del>
                                                {{ currency()->getUserCurrency() }}
                                                {{ (ceil(preg_replace('/[^A-Za-z0-9\-]/','',currency(intVal($doctor->orignal_price), 'USD', currency()->getUserCurrency())))) }}</del>
                                        </a>
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

    <div class="row mb-5">

        <h3 class="text-center" style="padding: 45px;font-size: 40px;font-weight: 700;">
            {{ __('Questions about treatment') }}</h3>
        <div class="col-lg-12" style="padding: 0px 10%;">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <strong> {{ __('Can a psychiatrist treat depression without drugs?') }}</strong>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ __('Depression has enemy types, the most severe of which is severe depression, as it is possible to prescribe medications in this case. As for other types of depression, the treating psychiatrist can use modern techniques in psychological treatment without resorting to medication. On the platform, we have psychotherapists with great experience in this type of treatment. You can choose the appropriate psychiatrist, or you can contact us through the blue chat icon, and we help you choose the appropriate psychiatrist.') }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <strong> {{ __('Can a psychologist solve marital problems?') }}</strong>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ __('Marriage problems are often caused by disagreements between the two parties. But sometimes the cause may not be known! That is, there is no real problem, but rather a psychological problem on one of the parties, or perhaps both. Certainly, in this case, the psychologist has an important role in treating these problems, and returning the relationship that brings the spouses to its previous normal. If you find it difficult to choose a specialist! Contact us through the blue chat icon, and we will help you choose the right psychologist.') }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <strong> {{ __('Can a psychiatrist treat anxiety?') }}</strong>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ __('Anxiety is a very prevalent psychological problem in society, and it has many types that are countless to mention now. And each type of anxiety has different psychological therapeutic mechanisms. Sometimes medications are used, or only psychological therapy, or perhaps both. The type of anxiety you experience and its severity will be diagnosed by a psychotherapist. In the Doctor Psychological platform, we have more than 12 psychiatrists with great experience in treating types of anxiety. You can choose, or talk to us through the blue chat icon, and we will help you by choosing a psychiatrist.') }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <strong> {{ __('Can a psychotherapist treat obsessive-compulsive disorder?') }}</strong>
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{ __('Obsessive-compulsive disorder is a type of disorder associated with anxiety, and people with this type often feel that their actions do not make sense and try to change them, and the evidence is that you are now looking for a treatment for your problem and you are reading this description. A psychotherapist can reduce this obsession to a large extent through psychological treatments that rely on modern psychological techniques. You can choose a psychotherapist on the site, or if you want, you can contact us through the blue chat icon that appears in front of you, and we will help you choose the appropriate therapist.') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
