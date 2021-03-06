@extends('layouts.app')
@section('title')
{{ __('Dashboard') }}
@endsection
@section('content')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            @if (Auth::User()->role == 'admin')
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mini-stat clearfix bg-primary">
                            <span class="mini-stat-icon"><i class="mdi mdi-cart-outline"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter">{{ $usersCount }}</span>
                                {{ __('Total User') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mini-stat clearfix bg-primary">
                            <span class="mini-stat-icon"><i class="mdi mdi-currency-usd"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter">{{ $doctorsCount }}</span>
                                {{ __('Total Doctors') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mini-stat clearfix bg-primary">
                            <span class="mini-stat-icon"><i class="mdi mdi-cube-outline"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter">0</span>
                                {{ __('Total Revenue') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mini-stat clearfix bg-primary">
                            <span class="mini-stat-icon"><i class="mdi mdi-currency-btc"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter">0</span>
                                {{ __('Issues') }}
                            </div>
                        </div>
                    </div>
                </div>


                <!-- end row -->
                <div class="row">

                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 m-b-15 header-title">  {{ __('Latest Users') }}</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0">
                                        <thead>
                                            <tr>
                                                <th> {{ __('Name') }}</th>
                                                <th> {{ __('Email') }}</th>
                                                <th> {{ __('Phone No') }}</th>
                                                <th> {{ __('Role') }}</th>
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


            @elseif(Auth::User()->role == 'doctor')
                <div class="page-content-wrapper ">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card m-b-200">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title" style="font-size: 20px"> {{ __('Pending Balance') }}</h4>
                                        <hr>
                                        <h1 class="text-center">{{ $user->wallet->pending_balance }}.00<span
                                                style="color: #0d6efd!important">  {{ __('USD') }}</span>
                                        </h1>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card m-b-200">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title" style="font-size: 20px"> {{ __('Available balance') }}</h4>
                                        <hr>
                                        <h1 class="text-center">{{ $user->wallet->available_balance }}.00 <span
                                                style="color: #0d6efd!important">  {{ __('USD') }}</span>
                                        </h1>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-200">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title" style="font-size: 20px"> {{ __('Withdraw balance') }}
                                        </h4>
                                        <hr>
                                        <p class="text-muted m-b-20 font-14"></p>
                                        <form class="" action="{{ url('withdraw-request') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <h3 style=" " class="text-center"><strong
                                                                style="color: #198754!important"> {{ __('Available balance') }}
                                                                {{ $user->wallet->available_balance }}.00
                                                                <span style="color: #0d6efd!important">  {{ __('USD') }}</span>
                                                            </strong> </h3>
                                                        @if ($withDraw)
<<<<<<< HEAD
                                                            <input
                                                                style="    color: #664d03;
                                                                                                                                                                                                                                            background-color: #fff3cd;
                                                                                                                                                                                                                                       border-color: #ffecb5;"
                                                                type="text" readonly class="form-control"
                                                                name="offer_arabic" readonly
                                                                placeholder="Pending withdrawal request 3428.00USD"
                                                                value="Pending withdrawal request {{ $withDraw->withdraw_amount }}.00USD">


=======
                                                            <input  style="    color: #664d03;   background-color: #fff3cd;        border-color: #ffecb5;"  
                                                             type="text" readonly class="form-control"  name="offer_arabic" readonly 
                                                              placeholder="" 
                                                               value="Pending withdrawal request {{ $withDraw->withdraw_amount }}.00USD">
>>>>>>> 05ae01e4e75d305929f0176f12ba78a95388b937
                                                        @elseif ($user->wallet->available_balance >= 50)
                                                            <input class="form-control" type="number"
                                                                name="withdraw_amount" id="">
                                                        @else
                                                            <p class="text-center text-primary"> {{ __('Minimum 50$ available balance is required for withdraw') }}</p>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            @if (!$withDraw && $user->wallet->available_balance >= 50)

                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">
                                                             {{ __('Withdraw') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
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
                                <h4 class="mt-0 m-b-15 header-title" style="font-size: 20px">  {{ __('Debited logs') }}</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0">
                                        <thead>
                                            <tr>
                                                <th> {{ __('Amount') }}</th>
                                                <th> {{ __('Date') }}</th>
                                                <th> {{ __('Status') }}</th>


                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($user->payment_transaction_debited as $transaction)
                                                <tr>
                                                    <td><span class="badge badge-primary">-{{ $transaction->amount }}.00
                                                             {{ __('USD') }}</span>
                                                    </td>
                                                    <td>{{ $transaction->created_at->toDateString() }}</td>
                                                    <td> {{ __('Debited') }}</td>
                                                </tr>
                                            @endforeach
                                            @foreach ($user->withdraw as $withdraw)
                                                <tr>
                                                <tr>
                                                    <td><span
                                                            class="badge badge-primary">-{{ $withdraw->withdraw_amount }}.00
                                                             {{ __('USD') }}</span>
                                                    </td>
                                                    <td>{{ $withdraw->created_at->toDateString() }}</td>
                                                    <td>{{ $withdraw->status }}</td>
                                                </tr>
                                            @endforeach
                                            <tr></tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card m-b-20" style="max-height: 400px;overflow-y:auto;">
                            <div class="card-body">
                                <h4 class="mt-0 m-b-15 header-title" style="font-size: 20px">  {{ __('Balance log') }}</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover m-b-0">
                                        <thead>
                                            <tr>
                                                <th> {{ __('Amount') }}</th>
                                                <th> {{ __('Date') }}</th>
                                                <th> {{ __('Status') }}</th>
                                                <th> {{ __('Source') }}</th>


                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($user->payment_transaction_credited as $transaction)
                                                <tr>
                                                    <td><span class="badge badge-primary"
                                                            style="background: #198754!important">{{ $transaction->amount }}.00
                                                             {{ __('USD') }}</span>
                                                    </td>

                                                    <td>{{ $transaction->created_at->toDateString() }}</td>
                                                    <td>{{ $transaction->status }}</td>
                                                    <td>{{ $transaction->payment_type ?? 'appointment' }}</td>
                                                </tr>
                                            @endforeach
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
                                 {{ __('Coming Soon') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mini-stat clearfix bg-primary">
                            <span class="mini-stat-icon"><i class="mdi mdi-currency-usd"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter">0000</span>
                                {{ __('Coming Soon ') }}
                            </div>
                        </div>
                    </div>


                </div>
            @endif


        </div><!-- container-fluid -->


    </div>
@endsection
{{-- <td><span class="badge badge-primary">Active</span></td> --}}
