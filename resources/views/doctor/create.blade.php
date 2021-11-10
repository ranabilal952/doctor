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
                    <form class="" action="{{ url('doctor_save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Doctor Full Name</strong> </label>
                                   <input type="text" class="form-control" name="name"  placeholder="full name" required>
                                    </div>
                                </div>   
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Doctor Specility</strong> </label>
                                   <input type="text" class="form-control" name="name"  placeholder="full name" required>
                                    </div>
                                </div>   
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Orignal Price</strong> </label>
                                   <input type="text" class="form-control" name="name"  placeholder="full name" required>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Discount Price</strong> </label>
                                   <input type="text" class="form-control" name="name"  placeholder="full name" required>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Year Of Experience</strong> </label>
                                   <input type="text" class="form-control" name="name"  placeholder="full name" required>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Number Of Rating total</strong> </label>
                                   <input type="text" class="form-control" name="name"  placeholder="full name" required>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                       <label style="color: black"><strong>Language Doctor Know</strong> </label>
                                       <select class="form-control" name="role" id="" required>
                                        <option selected disabled>--Selected--</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="user">User</option>
                                    </select>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Whatsapp </strong></label>
                                        <input type="text" class="form-control" name="phone" id="" placeholder="phone number" required>
                                    </div>
                                </div>   <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Message </strong></label>
                                        <input type="text" class="form-control" name="phone" id="" placeholder="phone number" required>
                                    </div>
                                </div>   <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Video </strong></label>
                                        <input type="text" class="form-control" name="phone" id="" placeholder="phone number" required>
                                    </div>
                                </div> 
                                <div class="col-lg-6 mt-5">
                                    <div class="form-group">
                                        <label style="color: black"><strong> Profile Image</strong></label>
                                        <input type="file" name="image" id="" >
                                    </div>
                                </div> 
                                <h1 style="color: red">Doctor Rates</h1>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>User Rating (for rating)</strong></label>
                                        <select class="form-control" name="role" id="" required>
                                            <option selected disabled>--Selected--</option>
                                            <option value="doctor" style="color: orange;font-size:30px">*</option>
                                            <option value="doctor" style="color: orange;font-size:30px">**</option>
                                            <option value="doctor" style="color: orange;font-size:30px">***</option>
                                            <option value="doctor" style="color: orange;font-size:30px">****</option>
                                            <option value="doctor" style="color: orange;font-size:30px">*****</option>
                                            
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>User Name (for rating)</strong></label>
                                        <input type="text" class="form-control" name="phone" id="" placeholder="phone number" required>
                                    </div>
                                </div>                                 
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>User Comment (for rating)</strong></label>
                                        <textarea name="description" class="form-control" cols="150"
                                        rows="03"></textarea>
                                    </div>
                                </div>  
                                <h1 style="color: red">Profile Data</h1>
                                <hr>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>About therapist</strong></label>
                                        <textarea name="description" class="form-control" cols="110"
                                        rows="03"></textarea>
                                    </div>
                                </div>                                  
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Certificates
                                        </strong></label>
                                        <textarea name="description" class="form-control" cols="110"
                                        rows="03"></textarea>
                                    </div>
                                </div>                                   
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Experiences Details
                                        </strong></label>
                                        <textarea name="description" class="form-control" cols="110"
                                        rows="03"></textarea>
                                    </div>
                                </div>
                                <h1 style="color: red">Doctor Video Links</h1>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Video Link
                                        </strong></label>
                                        <input type="text" class="form-control" name="phone" id="" placeholder="" required>
                                    </div>
                                </div>   
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Video Link
                                        </strong></label>
                                        <input type="text" class="form-control" name="phone" id="" placeholder="" required>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Video Link
                                        </strong></label>
                                        <input type="text" class="form-control" name="phone" id="" placeholder="" required>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Video Link
                                        </strong></label>
                                        <input type="text" class="form-control" name="phone" id="" placeholder="" required>
                                    </div>
                                </div>                              <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="color: black"><strong>Video Link
                                        </strong></label>
                                        <input type="text" class="form-control" name="phone" id="" placeholder="" required>
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







