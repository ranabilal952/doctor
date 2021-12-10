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
</div> --}}
    <div class="page-content-wrapper ">

        <div class="container-fluid">
            @if (Auth::User()->role == 'admin')
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mini-stat clearfix bg-primary">
                            <span class="mini-stat-icon"><i class="mdi mdi-cart-outline"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter">{{ $usersCount }}</span>
                                Total User
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mini-stat clearfix bg-primary">
                            <span class="mini-stat-icon"><i class="mdi mdi-currency-usd"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter">{{ $doctorsCount }}</span>
                                Total Doctors
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mini-stat clearfix bg-primary">
                            <span class="mini-stat-icon"><i class="mdi mdi-cube-outline"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter">0</span>
                                Total Revenue
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mini-stat clearfix bg-primary">
                            <span class="mini-stat-icon"><i class="mdi mdi-currency-btc"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter">0</span>
                               Issues
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
                                <h4 class="mt-0 m-b-15 header-title"> Latest Users</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone No</th>
                                                <th>Role</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td><span class="badge badge-primary">{{ $user->role }} </span> </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @elseif(Auth::User()->role=='doctor')
                <div class="page-content-wrapper ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card m-b-200">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title" style="font-size: 20px">Pending Balance</h4>
                                        <hr>
                                        <h1 class="text-center">48.00 <span style="color: #0d6efd!important">USD</span>
                                        </h1>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card m-b-200">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title" style="font-size: 20px">Available balance</h4>
                                        <hr>
                                        <h1 class="text-center">48.00 <span style="color: #0d6efd!important">USD</span>
                                        </h1>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card m-b-200">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title" style="font-size: 20px">Withdraw balance
                                        </h4>
                                        <hr>
                                        <p class="text-muted m-b-20 font-14"></p>
                                        <form class="" action="#" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <h3 style=" " class="text-center"><strong
                                                                style="color: #198754!important"> Available balance :
                                                                4086.00 <span style="color: #0d6efd!important">USD</span>
                                                            </strong> </h3>
                                                        <input style="    color: #664d03;
                                                                                                background-color: #fff3cd;
                                                                                                border-color: #ffecb5;"
                                                            type="text" readonly class="form-control" name="offer_arabic"
                                                            placeholder="Pending withdrawal request 3428.00USD"
                                                            value="Pending withdrawal request 3428.00USD" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Withdraw
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card m-b-200">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title" style="font-size: 20px">Donate to support team

                                        </h4>
                                        <hr>
                                        <p class="text-muted m-b-20 font-14"></p>
                                        <form class="" action="#" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label style="color:black"><strong> Amount </strong> </label>
                                                        <input type="number" class="form-control" name="offer_arabic"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Donate
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

                <br>
                <div class="row">

                    <div class="col-6">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 m-b-15 header-title" style="font-size: 20px"> Withdraw archive</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Status</th>

                                                {{-- <th>Start date</th>
                                    <th>Salary</th> --}}
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Discount for donation</td>
                                                <td>21/11/2017</td>
                                                <td><span class="badge badge-primary">-100.00USD</span></td>


                                            </tr>
                                            <tr>
                                                <td>Discount for donation</td>
                                                <td>22/01/2021</td>
                                                <td><span class="badge badge-primary">-100.00USD</span></td>


                                            </tr>
                                            <tr>
                                                <td>Discount for donation</td>
                                                <td>12/01/2020</td>
                                                <td><span class="badge badge-primary">-100.00USD</span></td>


                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 m-b-15 header-title" style="font-size: 20px"> Balance log</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Status</th>

                                                {{-- <th>Start date</th>
                                    <th>Salary</th> --}}
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Discount for donation</td>
                                                <td>21/11/2017</td>
                                                <td><span class="badge badge-primary"
                                                        style="background: #198754!important">100.00USD</span></td>


                                            </tr>
                                            <tr>
                                                <td>Discount for donation</td>
                                                <td>22/01/2021</td>
                                                <td><span class="badge badge-primary"
                                                        style="background: #198754!important">100.00USD</span></td>


                                            </tr>
                                            <tr>
                                                <td>Discount for donation</td>
                                                <td>12/01/2020</td>
                                                <td><span class="badge badge-primary"
                                                        style="background: #198754!important">100.00USD</span></td>


                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mini-stat clearfix bg-primary">
                            <span class="mini-stat-icon"><i class="mdi mdi-cart-outline"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter">0000</span>
                                Coming Soon
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mini-stat clearfix bg-primary">
                            <span class="mini-stat-icon"><i class="mdi mdi-currency-usd"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter">0000</span>
                                Coming Soon
                            </div>
                        </div>
                    </div>


                </div>
            @endif
            <!-- end row -->

        </div><!-- container-fluid -->


    </div>
@endsection
{{-- <td><span class="badge badge-primary">Active</span></td> --}}
