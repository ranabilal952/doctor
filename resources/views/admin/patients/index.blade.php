@extends('layouts.app')
@section('title')
    Patients Data
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">

    <!-- MDB -->


    <div class="page-content-wrapper ">
        <div class="container-fluid">

            <div class="page-content-wrapper ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">All Patients Data</h4>
                                    <p class="text-muted m-b-30 font-14"></p>
                                    <table id="example" style="width:100%" class="table table-bordered dt-responsive nowrap"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Patient Name</th>
                                                <th>Doctor Name</th>
                                                <th>Appointment Date</th>
                                                <th> Schedule Amount</th>
                                                <th> Schedules Status</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($patientsData)


                                                @foreach ($patientsData as $key => $patient)

                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $patient->user->name }}</td>
                                                        <td>{{ $patient->doctor->name }}</td>
                                                        <td>{{ $patient->slot->date_from }} Minutes</td>
                                                        <td>{{ $patient->slot->amount }} USD</td>
                                                        <td>
                                                                <span class="badge badge-primary">{{$patient->appointment_status}} </span>
                                                            
                                                        </td>
                                                      
                                                    </tr>
                                                @endforeach
                                            @endisset
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
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
