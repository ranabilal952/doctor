@extends('layouts.app')

@section('title')
    Dashboard
@endsection
@section('content')
{{-- <div class="page-content-wrapper mt-4">
    <div class="container-fluid">
        <div class="row ">
            
            <div class="col-md-6 col-lg-4 ">
                <a href="{{url('slottime')}}">
                    <div style="background:white " class="mini-stat clearfix ">
                        <span class="mini-stat-icon"  style="border-radius:10%;background:#c43832"><i class="mdi mdi-clock "></i></span>
                        <div class="mini-stat-info text-center" style="color:black">
                           <h5 > Slot timing </h5>
                           <h6>{{App\Models\Slottime::count()}}</h6>
                            
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 ">
            <a href="{{url('appointment')}}">  
                    <div style="background:white " class="mini-stat clearfix ">
                        <span class="mini-stat-icon" style="border-radius:10%;background:#89A839"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        <div class="mini-stat-info text-center " style="color:black">
                            <h6>All Appointments</h6>
                          <h6>{{App\Models\Appointment::count()}}</h6>
                            
                        </div>
                    </div>
                </a>
            </div>             
            <div class="col-md-6 col-lg-4 ">
            <a href="">  
                    <div style="background:white " class="mini-stat clearfix ">
                        <span class="mini-stat-icon" style="border-radius:10%;background:#89A839"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                        <div class="mini-stat-info text-center " style="color:black">
                            <h6>All</h6>
                          <h6>0001</h6>
                            
                        </div>
                    </div>
                </a>
            </div>            

    </div>
    <div class="row">

        <div class="col-12"><br>
           <center><img src="images/logo1.jpg" height="160" alt=""></center> 
        </div>

    </div>
</div>  --}}
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-primary">
                    <span class="mini-stat-icon"><i class="mdi mdi-cart-outline"></i></span>
                    <div class="mini-stat-info text-right text-white">
                        <span class="counter">15852</span>
                   Total User
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-primary">
                    <span class="mini-stat-icon"><i class="mdi mdi-currency-usd"></i></span>
                    <div class="mini-stat-info text-right text-white">
                        <span class="counter">956</span>
                        Total Doctors
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-primary">
                    <span class="mini-stat-icon"><i class="mdi mdi-cube-outline"></i></span>
                    <div class="mini-stat-info text-right text-white">
                        <span class="counter">5210</span>
                       Total Revenue
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-primary">
                    <span class="mini-stat-icon"><i class="mdi mdi-currency-btc"></i></span>
                    <div class="mini-stat-info text-right text-white">
                        <span class="counter">20544</span>
                        Unique Visitors
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            {{-- <div class="col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Email Sent</h4>

                        <ul class="list-inline widget-chart m-t-20 text-center">
                            <li>
                                <h4 class=""><b>3652</b></h4>
                                <p class="text-muted m-b-0">Marketplace</p>
                            </li>
                            <li>
                                <h4 class=""><b>5421</b></h4>
                                <p class="text-muted m-b-0">Last week</p>
                            </li>
                            <li>
                                <h4 class=""><b>9652</b></h4>
                                <p class="text-muted m-b-0">Last Month</p>
                            </li>
                        </ul>

                        <div id="morris-area-example" style="height: 300px"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Revenue</h4>

                        <ul class="list-inline widget-chart m-t-20 text-center">
                            <li>
                                <h4 class=""><b>5248</b></h4>
                                <p class="text-muted m-b-0">Marketplace</p>
                            </li>
                            <li>
                                <h4 class=""><b>321</b></h4>
                                <p class="text-muted m-b-0">Last week</p>
                            </li>
                            <li>
                                <h4 class=""><b>964</b></h4>
                                <p class="text-muted m-b-0">Last Month</p>
                            </li>
                        </ul>

                        <div id="morris-bar-example" style="height: 300px"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Monthly Earnings</h4>

                        <ul class="list-inline widget-chart m-t-20 text-center">
                            <li>
                                <h4 class=""><b>3654</b></h4>
                                <p class="text-muted m-b-0">Marketplace</p>
                            </li>
                            <li>
                                <h4 class=""><b>954</b></h4>
                                <p class="text-muted m-b-0">Last week</p>
                            </li>
                            <li>
                                <h4 class=""><b>8462</b></h4>
                                <p class="text-muted m-b-0">Last Month</p>
                            </li>
                        </ul>

                        <div id="morris-donut-example" style="height: 300px"></div>
                    </div>
                </div>
            </div> --}}

        </div>
        <!-- end row -->


        <div class="row">

            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-15 header-title">Recent Users</h4>
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Age</th>
                                    {{-- <th>Start date</th>
                                    <th>Salary</th> --}}
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td><span class="badge badge-primary">Active</span></td>
                                    <td>61</td>
                                   
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td><span class="badge badge-primary">Active</span></td>
                                    <td>63</td>
                                 
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td><span class="badge badge-primary">Active</span></td>
                                    <td>66</td>
                                   
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td><span class="badge badge-default">Deactive</span></td>
                                    <td>22</td>
                                  
                                </tr>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td><span class="badge badge-primary">Active</span></td>
                                    <td>33</td>
                              
                                </tr>
                                <tr>
                                    <td>Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td><span class="badge badge-primary">Active</span></td>
                                    <td>61</td>
                                  
                                </tr>
                                <tr>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td><span class="badge badge-default">Deactive</span></td>
                                    <td>59</td>
                                  
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row -->

    </div><!-- container-fluid -->


</div> 
@endsection
{{-- <td><span class="badge badge-primary">Active</span></td> --}}
