@extends('layouts.app')
@section('title')
Make Appointment
@endsection
@section('content')
<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-200">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Fill Data</h4>
                        <hr>
                        <p class="text-muted m-b-20 font-14"></p>
                    <form class="" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong> Full Name</strong> </label>
                                   <input type="text" class="form-control" name="name"  placeholder="full name" required>
                                    </div>
                                </div>                     
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Email</strong></label>
                                   <input type="email" class="form-control" name="email" id="" placeholder="user email" required>
                                    </div>
                                </div>                                                                 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Phone Number</strong></label>
                                        <input type="text" class="form-control" name="phone" id="" placeholder="phone number" required>
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







