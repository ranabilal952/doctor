@extends('layouts.app')
@section('title')
Add Doctors / Users
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
                    <form class="" action="{{ url('user_save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Doctor Full Name</strong> </label>
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
                                        <label style="color: black"><strong>Password</strong></label>
                                   <input type="password" class="form-control" name="password" id="" placeholder="******" required>
                                    </div>
                                </div>                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Phone Number</strong></label>
                                        <input type="text" class="form-control" name="phone" id="" placeholder="phone number" required>
                                    </div>
                                </div>                                 
                               
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Select Role</strong></label>
                                        <select class="form-control" name="role" id="" required>
                                            <option selected disabled>--Selected--</option>
                                            <option value="doctor">Doctor</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>      
                                                          
                                <div class="col-lg-6 mt-5">
                                    <div class="form-group">
                                        <label style="color: black"><strong> Profile Image</strong></label>
                                        <input type="file" name="image" id="" >
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







