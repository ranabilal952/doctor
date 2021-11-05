@extends('front.layout')
@section('title')
    Details Doctoor
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="doctor-single-about">
                <div class="row">
                    <div class="col-12 col-sm-3 col-lg-3">
                        <div class="doctor-single-avatar-wrap">
                            <div class="doctor-single-avatar">
                                <img src="assets/images/doctor1.webp" alt="">
                                <i class="doctor-item-availablity online"></i>
                            </div>
                            <!-- doctor-single-avatar -->
                        </div>
                        <div class="top-doctor-services" style="display: inline-flex;">
                            <div class="video-service" style="margin: 5px; margin-right: 28px; margin-top: 20px;background: #138DE7;"><i class="las la-video mt-1" style=" font-size: 18px;"></i></div>
                            <div class="chat-service" style="margin: 5px;margin-top: 20px; background: #138DE7;"><i class="las la-comment-alt mt-1"></i></div>
                            <div class="whatsapp-service" style="margin: 5px;margin-top: 20px;"><i class="lab la-whatsapp"></i></i>
                            </div>
                        </div>
                    </div>
                    <!-- col3 -->
                    <div class="col-12 col-sm-4 col-lg-5 col-xl-4 ">
                        <div class="doctor-single-info text-md-start text-center ">
                            <h1 class="ng-binding ">ربيع الحوراني</h1>
                            <h6 class="ng-binding ">اخصائي نفسي</h6>
                            <h5 class="fw-normal text-white m-0 "><span class="ng-scope ">اللغة</span>:
                                <div class="me-2 d-inline ">العربية</div>
                                <div class="me-2 d-inline ">الإنجليزية</div>
                                <div class="me-2 d-inline ">الفرنسية</div>
                            </h5>

                            <h5 class="fw-normal text-white m-0 mt-3 ng-scope "><span class="ng-scope ">سنوات الخبرة</span>:
                                <span class="ng-binding ">6</span>
                            </h5>


                            </h5>
                            <div class="doctor-rate ">
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked "></span>
                                <span class="fa fa-star checked "></span>
                                <span class="ng-binding ">(12)</span>
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
            <ul class="nav nav-tabs nav-fill mb-3 " id="ex1 " role="tablist " style="background: #E7F3F5; ">
                <li class="nav-item " role="presentation ">
                    <a class="nav-link active " id="ex2-tab-1 " data-mdb-toggle="tab " href="#ex2-tabs-1 " role="tab " aria-controls="ex2-tabs-1 " aria-selected="true " style="font-weight: bold; color: #2c3038; font-size: 18px; transition: all .5s; ">التقييمات</a >
                </li>
             <li class="nav-item " role="presentation ">
                 <a class="nav-link " id="ex2-tab-2 " data-mdb-toggle="tab "href="#ex2-tabs-2 "role="tab " aria-controls="ex2-tabs-2 "  aria-selected="false " style="font-weight: bold; color: #2c3038; font-size: 18px; transition: all .5s; ">الملف الشخصي</a >
            </li>
             <li class="nav-item " role="presentation ">
                 <a class="nav-link " id="ex2-tab-3 " data-mdb-toggle="tab " href="#ex2-tabs-3 " role="tab " aria-controls="ex2-tabs-3 " aria-selected="false "  style="font-weight: bold; color: #2c3038; font-size: 18px; transition: all .5s; ">الفيديوهات</a>
                </li>
            </ul>
            <!-- Tabs navs -->
            <!-- Tabs content -->
            <div class="tab-content " id="ex2-content ">
                <div class="tab-pane fade show active " id="ex2-tabs-1 " role="tabpanel " aria-labelledby="ex2-tab-1 ">

                    <div class="doctor-single-tab-comments ">
                        <div ng-repeat="rate in rates " class="doctor-single-tab-comment ng-scope ">
                            <div class="d-flex ">
                                <div class="flex-shrink-0 ">
                                    <div class="doctor-comment-avatar " style="background-image: url(//secure.gravatar.com/avatar/1397658d2c23edcf97a73fda84c04460?d=mm); "></div>
                                </div>
                                <div class="flex-grow-1 ms-3 ">
                                    <div class="doctor-single-tab-comment-co ">
                                        <h5 class="ng-binding ">Fozia</h5>


                                        <div class=" ">
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                        </div>
                                        <p class="ng-binding "> دكتور ربيع ممتاز جدًا جدًا? قدرت اسيطر على ثورة غضبي واتصالح مع نفسي\r\n</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="doctor-single-tab-comments ">
                        <div ng-repeat="rate in rates " class="doctor-single-tab-comment ng-scope ">
                            <div class="d-flex ">
                                <div class="flex-shrink-0 ">
                                    <div class="doctor-comment-avatar " style="background-image: url(//secure.gravatar.com/avatar/1397658d2c23edcf97a73fda84c04460?d=mm); "></div>
                                </div>
                                <div class="flex-grow-1 ms-3 ">
                                    <div class="doctor-single-tab-comment-co ">
                                        <h5 class="ng-binding ">Fozia</h5>


                                        <div class=" ">
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                        </div>
                                        <p class="ng-binding "> دكتور ربيع ممتاز جدًا جدًا? قدرت اسيطر على ثورة غضبي واتصالح مع نفسي\r\n</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="doctor-single-tab-comments ">
                        <div ng-repeat="rate in rates " class="doctor-single-tab-comment ng-scope ">
                            <div class="d-flex ">
                                <div class="flex-shrink-0 ">
                                    <div class="doctor-comment-avatar " style="background-image: url(//secure.gravatar.com/avatar/1397658d2c23edcf97a73fda84c04460?d=mm); "></div>
                                </div>
                                <div class="flex-grow-1 ms-3 ">
                                    <div class="doctor-single-tab-comment-co ">
                                        <h5 class="ng-binding ">Fozia</h5>


                                        <div class=" ">
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                        </div>
                                        <p class="ng-binding "> دكتور ربيع ممتاز جدًا جدًا? قدرت اسيطر على ثورة غضبي واتصالح مع نفسي\r\n</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="doctor-single-tab-comments ">
                        <div ng-repeat="rate in rates " class="doctor-single-tab-comment ng-scope ">
                            <div class="d-flex ">
                                <div class="flex-shrink-0 ">
                                    <div class="doctor-comment-avatar " style="background-image: url(//secure.gravatar.com/avatar/1397658d2c23edcf97a73fda84c04460?d=mm); "></div>
                                </div>
                                <div class="flex-grow-1 ms-3 ">
                                    <div class="doctor-single-tab-comment-co ">
                                        <h5 class="ng-binding ">Fozia</h5>


                                        <div class=" ">
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                            <span class="fa fa-star checked "></span>
                                        </div>
                                        <p class="ng-binding "> دكتور ربيع ممتاز جدًا جدًا? قدرت اسيطر على ثورة غضبي واتصالح مع نفسي\r\n</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade " id="ex2-tabs-2 " role="tabpanel " aria-labelledby="ex2-tab-2 ">

                    <div class="title-forth mb-3 mt-4 ">
                        <h5 class="ng-binding ">About therapist</h5>
                    </div>
                    <div class="doctor-info-page-sesction mb-3 ng-binding " ng-bind-html="tAttr(doctor.description)
                                    ">معالج إيحائي وإختصاصي في إدارة المشاعر، يعرف أنه لا يوجد نوع واحد من العلاج مناسب لكل الأفراد، لذلك يجمع في تقنيته العلاجية التي أطلق عليها إسم "علاج الحب الذاتي “Self-Love Therapy، بين شغفه بعلم النفس والعلاج النفسي ومساعدة الناس
                        للتخلص من مشاكلهم النفسية، والمنطق العلمي الذي إكتسبه من التعلم والعمل في مجال الهندسة، وبين العلاج الإيحائي، والعلاجات النفسية الكلاسيكية والحديثة، والتنفس الواعي المتواصل، والعلاج الشمولي، والعلاج بالفن، وإدارة الضغط النفسي،
                        بهدف مساعدة عملائه، أطفالاً وبالغين وأزواجاً وعائلات، على التعامل مع المشاكل والإضرابات النفسية المختلفة، وعلاج طفلهم الداخلي وقبول وحب ذواتهم. من هذه المشاكل النغسية: الإكتئاب ، القلق ونوبات الهلع ، الألم المزمن ، المشاكل
                        النفس-جسدية (الصداع النصفي، الألم العضلي الليفي) ، الضغط النفسي والتوتر، المشاكل الزوجية والمشاكل الجنسية ، الغضب ، مشاكل الثقة وإحترام الذات ، الحداد ، مشاكل النوم والأرق ، عدم القدرة على التكيف مع التغيير ، مشاكل الأطفال،
                        صعوبات التعلم، اضطراب فرط الحركة وتشتت الانتباه ADHD ، إضطرابات ما بعد الصدمة PTSD ، إضطرابات الشخصية (خاصة الحدّية Borderline، التجنبية Avoidant، الإعتمادية Dependent، الوسواسية القهرية OCPD)</div>
                    <div class="title-forth mb-3 mt-4">
                        <h5 class="ng-binding">Certificates</h5>
                    </div>
                    <div class="doctor-info-page-sesction mb-3 ng-binding" ng-bind-html="tAttr(doctor.certificates)">- دراسة ماجستير 2 في علم النفس العيادي - الجامعة اللبنانية - بيروت - بكالوريوس في علم النفس - الجامعة اللبنانية - بيروت - خبير معتمد في التنفس الشامل التحويلي Transformational Holistic Breathing - International Energetic Healing
                        Association - سيدني - أستراليا - معالج إيحائي معتمد - Banyan Hypnosis Center for Training &amp; Services, Inc - تكساس - الولايات المتحدة الأمريكية - خبير معتمد في التنفس الواعي المتواصل لتفريغ المشاعر - The Bridge Institute
                        - بيروت - بكالوريوس هندسة معلوماتية - جامعة القديس يوسف - بيروت - عضو في نقابة المعالجين الإيحائيين في لبنان</div>
                    <div class="title-forth mb-3 mt-4">
                        <h5 class="ng-binding">Experiences</h5>
                    </div>
                    <div class="doctor-info-page-sesction mb-3 ng-binding" ng-bind-html="tAttr(doctor.experiences)"></div>
                </div>

                <div class="tab-pane fade" id="ex2-tabs-3" role="tabpanel" aria-labelledby="ex2-tab-3">
                    No video Available
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-lg-4 col-md-12">
            <div ng-controller="DoctorBookController" class="doctor-reservation-tool ng-scope">
                <div class="">
                    <!-- ngIf: doctor.online --><button class="btn btn-lg btn-outline-white w-100 fw-bold mb-3 ng-scope" translate="Book instantly" data-bs-target="#selectInstantsModal" data-bs-toggle="modal">احجز فورا</button>
                    <!-- end ngIf: doctor.online -->
                    <a class="btn btn-lg btn-outline-white w-100 fw-bold mb-3 ng-scope" translate="Book from schedule" scroll-on-click="" data-id="schedule-date-picker-plugin" data-href="doctor/book/fadia">احجز من الجدول</a>
                    <a class="btn btn-lg btn-outline-white w-100 fw-bold mb-3 ng-scope" translate="Session Offers" href="#" ng-click="$root.show_offers_tab=!$root.show_offers_tab">عروض الجلسات</a>
                </div>
                <h1 class="ng-binding">المواعيد المتاحة</h1>
                <div class="calendar calendar-first" id="calendar_first">
                    <div class="calendar_header">
                        <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
                        <h2></h2>
                        <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
                    </div>
                    <div class="calendar_weekdays"></div>
                    <div class="calendar_content"></div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection