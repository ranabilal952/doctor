@extends('layouts.app')
@section('title')
Diseases
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
                        <form class="" action="{{url('terms_detail_save')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                                            
                                <div class="col-lg-12   ">
                                    <label><strong style="color: red">Terms Condition in English:</strong>(required)</label>
                                    <div class="form-group">
                                        
                                        <div>
                                            <textarea class="form-control" name="terms_condition_description_english" id="mytextarea" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>                                                            
                                <div class="col-lg-12   ">
                                    <label><strong style="color: red">شروط الشرط بالعربية:</strong>(required)</label>
                                    <div class="form-group">
                                        
                                        <div>
                                            <textarea class="form-control" name="terms_condition_description_arabic" id="mysecond" cols="30" rows="10"></textarea>
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
        {{-- <div class="page-content-wrapper ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">All  Data </h4>
                                <p class="text-muted m-b-30 font-14"></p>
                                <table id="" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Terms And Condition English</th>
                                            <th>شروط الشرط بالعربية</th>
                                            


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($terms_condition as $key=> $terms_condition)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{!! $terms_condition->terms_condition_description_english !!}</td>
                                            <td>{!! $terms_condition->terms_condition_description_arabic !!}</td>
                                           
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
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
