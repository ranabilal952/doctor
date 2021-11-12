@extends('layouts.app')
@section('title')
Blog Information Add
@endsection
@section('content')

<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-200">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Enter  Information </h4>
                        <p class="text-muted m-b-30 font-14"></p>
                        <form class="" action="{{url('blog_save')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><strong style="color: black">Blog Title:</strong>(English)</label>
                                        <div>
                                            <input type="text" name="blog_title_english" class="form-control" 
                                                placeholder="Enter a Blog title" />
                                        </div>
                                    </div>
                                </div>                                 
                                
                   
                                <div class="col-lg-12   ">
                                    <label><strong style="color: black">Blog Description :</strong>(English)</label>
                                    <div class="form-group">
                                        
                                        <div>
                                            <textarea class="form-control" name="blog_description_english" id="mytextarea" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>   
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><strong style="color: black">Blog Image : صورة المدونة :</strong>(English/عربي)</label>
                                        <div>
                                            <input type="file" name="image" class="form-control" 
                                                placeholder="" />
                                        </div>
                                    </div>
                                </div>      
                                <div class="col-lg-12">
                                    <div class="">
                                        <label><strong style="color: red">عنوان المدونة:</strong>(عربي)</label>
                                        <div>
                                            <input type="text" name="blog_title_arabic" class="form-control" 
                                                placeholder="أدخل عنوان مدونة" />
                                        </div>
                                    </div>
                                </div>                                 
                                                   
                                <div class="col-lg-12   ">
                                    <label><strong style="color: red">وصف المدونة :</strong>(عربي)</label>
                                    <div class="form-group">
                                        
                                        <div>
                                            <textarea class="form-control" name="blog_description_arabic" id="mysecond" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        
    </div>
</div>
@endsection
@section('scripts')
<script>
    tinymce.init({
        selector: '#mytextarea'
    });    
    tinymce.init({
        selector: '#mysecond'
    });
</script>
@endsection
