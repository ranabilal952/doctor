@extends('layouts.app')
@section('title')
    All Doctors
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">


    <div class="page-content-wrapper ">
        <div class="container-fluid">

            <div class="page-content-wrapper ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">All Doctors</h4>
                                    <p class="text-muted m-b-30 font-14"></p>
                                    <table id="example" style="width:100%" class="table table-bordered dt-responsive nowrap"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Total Balance</th>
                                                <th>Available Balance</th>
                                                <th> Pending Balance</th>
                                                <th> Total Sessions</th>
                                                <th> Booked Sessions</th>
                                                <th> Completed Sessions</th>
                                                <th>Actions</th>

                                                {{-- <th> Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($doctors as $key => $doctor)

                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ Ucfirst($doctor->name) }}</td>
                                                    <td>{{ $doctor->wallet->total_balance }}.00 USD</td>
                                                    <td>{{ $doctor->wallet->available_balance }}.00 USD</td>
                                                    <td>{{ $doctor->wallet->total_balance }}.00 USD</td>
                                                    <td> {{ $doctor->sessions->count() }}
                                                    </td>
                                                    <td>{{ $doctor->bookedSessions->count() }}</td>
                                                    <td>{{ $doctor->completedSessions->count() }}</td>
                                                    <td><a href="{{ url('/hide-doctor', $doctor->id) }}">
                                                            {{ $doctor->doctorData->is_hide ? 'Unhide' : 'Hide' }}
                                                        </a></td>

                                                    {{-- <td>
                                                        @php
                                                            $data = \App\Models\AppointmentSchedule::where('slot_id', $slotTime->id)->first();
                                                        @endphp
                                                        <a href="{{ url('view-appointment', $data->id) }}"><span
                                                                class="fa fa-eye"></span></a>
                                                    </td> --}}
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'pdf', 'print'
                ]
            });
        });
    </script>
@endsection
