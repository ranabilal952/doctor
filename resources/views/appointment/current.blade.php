@extends('layouts.app')
@section('title')
    All Current Appointments
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
                                    <h4 class="mt-0 header-title">Current Appointments </h4>
                                    <p class="text-muted m-b-30 font-14"></p>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Appointment Date</th>
                                                <th>Appointment Time</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($appointments as $key => $appointment)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $appointment->user->name }}</td>
                                                    <td>{{ $appointment->user->email }}</td>
                                                    <td>{{ $appointment->date->toDateString() }}</td>
                                                    <td>{{ $appointment->time }}</td>
                                                    <td>
                                                        {{ ucfirst($appointment->status) }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('appointment.show', $appointment->id) }}">
                                                            <i title="View this appointment" style="color: black"
                                                                class="fa fa-eye "></i></a>

                                                        @if (Auth::user()->role == 'doctor' && $appointment->status == 'new')
                                                            <a
                                                                href="{{ url('changeAppointmentStatus', [$appointment->id, 'approved']) }}">
                                                                <i title="approve this appointment" style="color: #eb7475"
                                                                    class="fa fa-check "></i></a>
                                                        @elseif (Auth::user()->role == 'doctor' && $appointment->status
                                                            == 'approved')
                                                            <a
                                                                href="{{ url('changeAppointmentStatus', [$appointment->id, 'canceled']) }}">
                                                                <i title="cancel this appointment" class="fa fa-times "
                                                                    style="color: red"></i></a>
                                                        @else
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach
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
