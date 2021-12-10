@extends('front.layout')
@section('title')
    Doctoor
@endsection
@section('content')
    <div class="online-header" style="margin-top: -200px;">
        <div class="container">
            <div class="online-header-co">
                <h1 translate="Choose your doctor now" class="ng-scope">ابحث عن طبيبك النفسي</h1>
                <p class="ng-binding">تلقى العلاج النفسي اون لاين .جلسات فورية في وقت يناسبك.</p>
            </div>

        </div>

    </div>

    <div class="doctor-offers-box country" style="    width: 50%; margin-right: 25%; height: 127px;">
        <p class="ng-binding"><i class="fa fa-times fa-color-yellow"></i> تحدث اونلاين مع المعالج النفسي وانت جالس في
            بيتك: جلسات فورية أو في الوقت الذي يناسبك</p>
        <div class="top-doctor-services" style="display: inline-flex;">
            <div class="video-service" style="margin: 5px; margin-right: 28px; margin-top: 20px;background: #138DE7;"><i
                    class="las la-video mt-1" style="margin-right: 4px; font-size: 18px;"></i></div>
            <div class="chat-service" style="margin: 5px;margin-top: 20px; background: #138DE7;"><i
                    class="las la-comment-alt mt-1" style="margin-right: 4px;"></i></div>
            <div class="whatsapp-service" style="margin: 5px;margin-top: 20px;"><i class="lab la-whatsapp"
                    style="margin-right: 5px;"></i></i>
            </div>
        </div>
        <div class="top-doctor-services">

            <div class="offer-badge ">عروض</div>
        </div>

    </div>


    <!-- wizerd -->
    <div class="mt-5">
        <p class="title-primary-boxed title-boxed ng-binding text-center"
            style="font-family: 'hnn';font-weight: bold;font-size: 1.5rem;">المتاحين الأن</p>
        <p class="text-center" style="    padding: 15px;margin-right: 50px;font-size: 15px;color:#3362CC">يمكنك الحجز مع
            المعالج المتاح والتحدث فوراً</p>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 col-md-12 col-sm-12 text-center">
                <!-- <button class="btn  button-doctor">المتاحين الأن</button> -->

            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
    <div class="" style="margin-top: -12%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 mt-2 mb-2">

                    <div class="card doc_doctor" style="background: #EAEDF2;">
                        <div class="top-bi">
                            <div class="whatsapp-service"><i class="lab la-whatsapp" style="margin-right: 3px;"></i></div>
                            <div class="chat-service" style="    background: #138DE7;   "><i class="las la-comment-alt"
                                    style="margin-right: 4px;"></i></div>
                            <div class="video-service" style="    background: #138DE7;
                            "><i class="las la-video" style="margin-right: 4px; font-size: 15px;"></i></div>
                        </div>
                        <div class="top-doctor-item-available-alert mt-1 online" style="float: right;"><span>متوفر
                                الأن</span></div>
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
                                <a href="{{ url('details') }}" class="btn btn-primary"
                                    style="margin: 5px;width: 50%;color: black;background-color: #D6E0F5; border:none;">عرض</a>
                                <a href="{{ url('details') }}" class="btn btn-primary" style="margin: 5px;width: 50%;color: #fff;background-color: #0d6efd;border-color: #0d6efd;">احجز الأن</a>
                            </div>

                        </div>
                    </div>
                </div>



            </div>
            <!-- <button class="btn btn-primary text-center">Show all doctors</button> -->
        </div>
    </div>
    <div class="mt-5">
        <p class="title-primary-boxed2 title-boxed ng-binding text-center"
            style="font-family: 'hnn';font-weight: bold;font-size: 1.5rem;">اختر المعالج واحجز من الجدول</p>
        <p class="text-center" style="    padding: 15px;margin-right: 50px;font-size: 15px;color:#3362CC">يمكنك الحجز مع
            المعالج المتاح والتحدث فوراً</p>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 text-center">
                <!-- <button class="btn  button-doctor">المتاحين الأن</button> -->

            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
    <div class="" style="margin-top: -12%;">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-3 col-md-4 col-sm-12 mt-2 mb-2">

                    <div class="card doc_doctor">
                        <div class="top-bi">
                            <div class="whatsapp-service"><i class="lab la-whatsapp" style="margin-right: 3px;"></i></div>
                            <div class="chat-service" style="    background: #138DE7;   "><i class="las la-comment-alt"
                                    style="margin-right: 4px;"></i></div>
                            <div class="video-service" style="    background: #138DE7;
                        "><i class="las la-video" style="margin-right: 4px; font-size: 15px;"></i></div>
                        </div>
                        <div class="top-doctor-item-available-alert mt-1 online" style="float: right;"><span> </span></div>
                        <div class="top-doctor-item-img">
                            <img alt="ربيع الحوراني" src="https://api.doctoorc.com/wp-content/uploads/2021/08/الدكتور-ربيع-الحوراني.webp">
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
                                <a href="{{ url('details') }}" class="btn btn-primary"
                                    style="margin: 5px;width: 50%;color: black;background-color: #D6E0F5; border:none;">عرض</a>
                                <a href="{{ url('details') }}" class="btn btn-primary" style="margin: 5px;width: 50%;color: #fff;background-color: #0d6efd;border-color: #0d6efd;">احجز الأن</a>
                            </div>

                        </div>
                    </div>
                </div>
                
            </div>
            <!-- <button class="btn btn-primary text-center">Show all doctors</button> -->
        </div>
    </div>
    <div class="row mt-5">

        <h3 class="text-center" style="padding: 45px;font-size: 40px;font-weight: 700;">اسئلة حول دكتورك | طبيب نفسي
            اونلاين</h3>
        <div class="col-lg-12" style="padding: 0px 20%;">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <strong> أسئلة حول العلاج في موقع دكتورك</strong>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            تتم الجلسة صوت وصورة، او صوت فقط ان كنت تحبذ هذا. وتتم من خلال غرفة الكترونية في ملفك الشخصي في
                            الموقع عبر دكتورك، او من خلال غرفة خارجية. او من خلال أي تطبيق اتصال تفضله انت.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <strong> كيف تتم جلسة الفيديو مع الطبيب النفسي؟</strong>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            تتم الجلسة صوت وصورة، او صوت فقط ان كنت تحبذ هذا. وتتم من خلال غرفة الكترونية في ملفك الشخصي في
                            الموقع عبر دكتورك، او من خلال غرفة خارجية. او من خلال أي تطبيق اتصال تفضله انت.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <strong> كيف تتم جلسة الفيديو مع الطبيب النفسي؟</strong>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            تتم الجلسة صوت وصورة، او صوت فقط ان كنت تحبذ هذا. وتتم من خلال غرفة الكترونية في ملفك الشخصي في
                            الموقع عبر دكتورك، او من خلال غرفة خارجية. او من خلال أي تطبيق اتصال تفضله انت.
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
