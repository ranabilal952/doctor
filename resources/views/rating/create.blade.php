@extends('layouts.app')
@section('title')
Doctor Rates / أسعار الطبيب
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
                            <form class="" action="{{ url('rating_save') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color: black"><strong>User Rating (for rating) / تصنيف المستخدم
                                                    (للتقييم)</strong></label>
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
                                            <label style="color: black"><strong>User Name (for rating) / اسم المستخدم
                                                    (للتقييم)</strong></label>
                                            <input type="text" class="form-control" name="user_name" id=""
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color: black"><strong>User Comment (for rating) / تعليق المستخدم
                                                    (للتقييم)</strong></label>
                                            <textarea name="description" class="form-control" cols="150"
                                                rows="03"></textarea>
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

