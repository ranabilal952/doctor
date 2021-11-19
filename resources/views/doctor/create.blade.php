@extends('layouts.app')
@section('title')
Add Doctors / اضافة اطباء
@endsection
@section('content')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}
<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-200">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Fill Data Please / الرجاء تعبئة البيانات </h4>
                        <hr>
                        <p class="text-muted m-b-20 font-14"></p>
                    <form class="" action="{{ url('doctor_detail_save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Doctor Full Name / اسم الطبيب الكامل</strong> </label>
                                   <input type="text" class="form-control" name="doctor_name"  placeholder="" >
                                    </div>
                                </div>   
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Doctor Specility / تخصص الطبيب</strong> </label>
                                   <input type="text" class="form-control" name="doctor_specility"  placeholder="" >
                                    </div>
                                </div>   
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Orignal Price / السعر الأصلي</strong> </label>
                                   <input type="text" class="form-control" name="orignal_price"  placeholder="" >
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Discount Price / سعر الخصم</strong> </label>
                                   <input type="text" class="form-control" name="discount_price"  placeholder="" >
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Year Of Experience / سنة خبرة</strong> </label>
                                   <input type="text" class="form-control" name="year_experience"  placeholder="" >
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>30 Minutes Rate /  معدل 30 دقيقة</strong></label>
                                   <input type="text" class="form-control" name="thirty_minute_price" id="" placeholder="" >
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>60 Minutes Rate /  معدل 60 دقيقة</strong></label>
                                   <input type="text" class="form-control" name="sixty_minute_price" id="" placeholder="" >
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Number Of Rating total / عدد إجمالي التصنيف</strong> </label>
                                        <select class="form-control" name="rating_number" id="" required>
                                            <option selected disabled>--Selected--</option>
                                            <option value="1" style="color: orange;font-size:30px">*</option>
                                            <option value="2" style="color: orange;font-size:30px">**</option>
                                            <option value="3" style="color: orange;font-size:30px">***</option>
                                            <option value="4" style="color: orange;font-size:30px">****</option>
                                            <option value="5" style="color: orange;font-size:30px">*****</option>
                                            
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <label style="color: black"><strong>Language Doctor Know / دكتور لغة تعلم</strong> </label>
                                    <div class="form-group">
                                      
                                        <select class="form-control" name="language" id="" required>
                                            <option selected disabled>--Selected--</option>
                                            <option value="english" >english</option>
                                            <option value="arabic" >Arabic</option>
                                        
                                            
                                            
                                        </select>
                                      
                                    </div>
                                </div>                                 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                       <label style="color: black"><strong>Availability of Doctor / توافر طبيب </strong> </label>
                                       <select class="form-control" name="availablity" id="" required>
                                        <option selected disabled>--Selected--</option>
                                        <option value="available">Available now</option>
                                        <option value="busy">Busy</option>
                                    </select>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Email / بريد الالكتروني</strong></label>
                                   <input type="email" class="form-control" name="email" id="" placeholder="" >
                                    </div>
                                </div>                                                               
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Phone Number / رقم الهاتف</strong></label>
                                        <input type="text" class="form-control" name="phone" id="" placeholder="" >
                                    </div>
                                </div>   
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Whatsapp Contact / واتس اب الاتصال</strong></label>
                                        <input type="text" class="form-control" name="whatsapp" id="" placeholder="" >
                                    </div>
                                </div>   <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Message / رسالة</strong></label>
                                        <input type="text" class="form-control" name="message" id="" placeholder=" " >
                                    </div>
                                </div>   
                              
                                <div class="col-lg-12 mt-5">
                                    <div class="form-group">
                                        <label style="color: black"><strong> Profile Image / صورة الملف الشخصي</strong></label>
                                        <input type="file" name="image" id="" >
                                    </div>
                                </div> 
                                <h1 style="color: red">Doctor Rates / أسعار الطبيب</h1>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>User Rating (for rating) / تصنيف المستخدم (للتقييم)</strong></label>
                                        <select class="form-control" name="total_rating" id="" required>
                                            <option selected disabled>--Selected--</option>
                                            <option value="1" style="color: orange;font-size:30px">*</option>
                                            <option value="2" style="color: orange;font-size:30px">**</option>
                                            <option value="3" style="color: orange;font-size:30px">***</option>
                                            <option value="4" style="color: orange;font-size:30px">****</option>
                                            <option value="5" style="color: orange;font-size:30px">*****</option>
                                            
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>User Name (for rating) / اسم المستخدم (للتقييم)</strong></label>
                                        <input type="text" class="form-control" name="user_name_rating" id="" placeholder="" >
                                    </div>
                                </div>                                 
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>User Comment (for rating) / تعليق المستخدم (للتقييم)</strong></label>
                                        <textarea name="user_comment" class="form-control" cols="150"
                                        rows="03"></textarea>
                                    </div>
                                </div>  
                                <h1 style="color: red">Profile Data / بيانات الملف الشخصي</h1>
                                <hr>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>About therapist / تعليق المستخدم (للتقييم)</strong></label>
                                        <textarea name="about_therapist" class="form-control" cols="110"
                                        rows="03"></textarea>
                                    </div>
                                </div>                                  
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Certificates_detail / الشهادات
                                        </strong></label>
                                        <textarea name="certification_detail" class="form-control" cols="110"
                                        rows="03"></textarea>
                                    </div>
                                </div>                                   
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Experiences Details / تفاصيل الخبرات
                                        </strong></label>
                                        <textarea name="experience_detail" class="form-control" cols="110"
                                        rows="03"></textarea>
                                    </div>
                                </div>
                                <h1 style="color: red">Doctor Video Links / روابط فيديو الطبيب</h1>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Video Link / رابط الفيديو
                                        </strong></label>
                                        <input type="text" class="form-control" name="video_link1" id="" placeholder="" >
                                    </div>
                                </div>   
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Video  / رابط الفيديو
                                        </strong></label>
                                        <input type="text" class="form-control" name="video_link2" id="" placeholder="" >
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Video Link / رابط الفيديو
                                        </strong></label>
                                        <input type="text" class="form-control" name="video_link3" id="" placeholder="" >
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Video Link / رابط الفيديو
                                        </strong></label>
                                        <input type="text" class="form-control" name="video_link4" id="" placeholder="" >
                                    </div>
                                </div>                              <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Video Link / رابط الفيديو
                                        </strong></label>
                                        <input type="text" class="form-control" name="video_link5" id="" placeholder="" >
                                    </div>
                                </div>                                     
                            </div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                       Reset
                                    </button>
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







