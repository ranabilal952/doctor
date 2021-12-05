@extends('layouts.app')
@section('title')
    Booked Schedules
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
                                    <h4 class="mt-0 header-title">All Booked Schedules</h4>
                                    <p class="text-muted m-b-30 font-14"></p>
                                    <table id="example"  style="width:100%" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Schedules Date</th>
                                                <th>Schedules Time</th>
                                                <th>Schedules Duration</th>
                                                <th> Schedules Amount</th>
                                                <th> Schedules Status</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                                <tr>
                                                    <td>1</td>
                                                    <td>05/12/2021</td>
                                                    <td>09:00 PM</td>
                                                    <td>60 minutes</td>
                                                    <td>48.00 USD</td>
                                                    <td><span class="badge " style="background-color: #0dcaf0!important; color:white">Booked</span></td>
                                                    <td><span class="badge badge-default">Deactive</span></td>
                                                    {{-- <td>
                                                <center> <button type="button" class="edit-btn btn btn-danger"
                                                        id="{{$slottime->id}}" time="{{$slottime->time}}"
                                                        data-toggle="modal" data-target="#edit-modal"><i
                                                            class="fa fa-pencil"></i></button></center>

                                            </td> --}}
                                                </tr>
                                        

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
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'csv',  'pdf', 'print'
        ]
    } );
} );
    </script>
@endsection
