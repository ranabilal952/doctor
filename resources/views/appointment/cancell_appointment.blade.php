@extends('layouts.app')
@section('title')
All Cancell Appointments
@endsection
@section('content')
<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="page-content-wrapper ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Cancell Appointments   </h4>
                                <p class="text-muted m-b-30 font-14"></p>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th> Role</th>
                                            <th>Phone</th>
                                            <th>Appointment Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection







