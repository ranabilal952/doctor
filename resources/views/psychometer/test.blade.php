@extends('layouts.app')
@section('title')
    Add Doctors / اضافة اطباء
@endsection
@section('content')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Fill Data Please / الرجاء تعبئة البيانات </h4>
                            <hr>
                            <p class="text-muted m-b-20 font-14"></p>
                            <form class="" action="{{ url('testsave') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Test Name  
                                                    </strong> </label>
                                            <input type="text" class="form-control" name="test_name" placeholder="">
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Test Description  
                                                    </strong> </label>
                                            <input type="text" class="form-control" name="test_description" placeholder="">
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


