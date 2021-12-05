@extends('layouts.app')
@section('title')
    Online Setting
@endsection
@section('content')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Update Information</h4>
                            <p class="text-muted m-b-20 font-14"></p>
                            <form class="" action="#" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Online settings</strong> </label>
                                            <select name="" class="form-control" id="">
                                                <option value="active">Activated</option>
                                                <option value="deactive">Deactivated</option>
                                            </select>
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
            <br>
        </div>
    </div>

@endsection
