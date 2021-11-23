@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('content')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Enter Information </h4>
                            <p class="text-muted m-b-30 font-14"></p>
                            <form class="" action="{{ url('user_save') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Name</strong> </label>
                                            <input type="text" value="{{ $user->name ?? '' }}"
                                                class="form-control" name="email" placeholder="" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Email:</strong></label>
                                            <div>
                                                <input type="email" value="{{ $user->email ?? '' }}"
                                                class="form-control" name="email" placeholder="" >
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">phone:</strong></label>
                                            <div>
                                                <input type="email" value="{{ $user->email ?? '' }}"
                                                class="form-control" name="email" placeholder="" >
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Password:</strong></label>
                                            <div>
                                                <input type="email" value="{{ $user->email ?? '' }}"
                                                class="form-control" name="email" placeholder="" >
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

        </div>


    </div>
@endsection

