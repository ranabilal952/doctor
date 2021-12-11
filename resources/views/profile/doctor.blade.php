@extends('layouts.app')
@section('title')
     Doctors /  اطباء
@endsection
@section('content')

    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <h4 class="mt-0 header-title"> Data  /  تعبئة  </h4>
                            <hr>
                            <p class="text-muted m-b-20 font-14"></p>
                            <form class="" action="{{ url('doctor_detail_save') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
         
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Doctor Full Name / اسم الطبيب
                                                    الكامل</strong> </label>
                                            <input type="text" class="form-control" name="doctor_name" value="{{ $user->doctorData->doctor_name ?? '' }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Doctor Specility / تخصص الطبيب</strong>
                                            </label>
                                            <input type="text" class="form-control" name="doctor_specility"
                                                placeholder="" value="{{ $user->doctorData->doctor_specility ?? '' }}">
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Year Of Experience / سنة خبرة</strong>
                                            </label>
                                            <input type="text" class="form-control" name="year_experience" value="{{ $user->doctorData->year_experience ?? '' }}" placeholder="">
                                        </div>
                                    </div>
    
                                    <div class="col-lg-6">
                                        <label style="color: black"><strong>Language Doctor Know / دكتور لغة تعلم</strong>
                                        </label>
                                        <div class="form-group">
                                            <option value="{{ $user->doctorData->language ?? '' }}"></option>
                                            <select class="form-control" name="language" id="" required>
                                                <option value="{{ $user->doctorData->language ?? '' }}">{{ $user->doctorData->language ?? '' }}</option>
                                                <option value="english">english</option>
                                                <option value="arabic">Arabic</option>



                                            </select>

                                        </div>
                                    </div>
                                  
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Email / بريد الالكتروني</strong></label>
                                            <input type="email" class="form-control" name="email" value="{{ $user->doctorData->email ?? '' }}" id="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Password / رقم الهاتف</strong></label>
                                            <input type="password" class="form-control" name="password" id=""
                                                placeholder="">
                                                <small>Default password is 12345678</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Phone Number / رقم الهاتف</strong></label>
                                            <input type="text" class="form-control" name="phone" value="{{ $user->doctorData->phone ?? '' }}" id="" placeholder="">
                                        </div>
                                    </div>
 


                                    <div class="col-lg-12 mt-5">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Profile Image / صورة الملف
                                                    الشخصي</strong></label>
                                            <input type="file" name="image" id="">
                                        </div>
                                    </div>
       
                                    <h1 style="color: red">Profile Data / بيانات الملف الشخصي</h1>
                                    <hr>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color: black"><strong>About therapist / تعليق المستخدم
                                                    (للتقييم)</strong></label>
                                            <textarea name="about_therapist" placeholder="{{ $user->doctorData->about_therapist ?? '' }}" value="{{ $user->doctorData->about_therapist ?? '' }}" class="form-control" cols="110"
                                                rows="05"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Certificates_detail / الشهادات
                                                </strong></label>
                                            <textarea name="certification_detail" placeholder="{{ $user->doctorData->certification_detail ?? '' }}" value="{{ $user->doctorData->about_therapist ?? '' }}" class="form-control" cols="110"
                                                rows="06"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Experiences Details / تفاصيل الخبرات
                                                </strong></label>
                                            <textarea name="experience_detail" placeholder="{{ $user->doctorData->about_therapist ?? '' }}" value="{{ $user->doctorData->experience_detail ?? '' }}" class="form-control" cols="110"
                                                rows="03"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Update
                                        </button>
                                        {{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            
                                        </button> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('scripts')
    <script>
        $('select').selectpicker();
    </script>
@endsection
