@extends('layouts.app')
@section('title')
    Active Schedules
@endsection
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">

<!-- MDB -->


    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Add Information</h4>
                            <p class="text-muted m-b-20 font-14"></p>
                            <form class="" action="#" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Date Schedules</strong> </label>
                                            <input type="date"  class="form-control" name="offer_arabic" placeholder="" required>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Schedules Day</strong> </label>
                                            <select name="" class="form-control" id="">
                                                <option value="" selected disabled>Select</option>
                                                <option value="">Monday</option>
                                                <option value="">Tuseday</option>
                                                <option value="">sunday</option>
                                               
                                            </select>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Schedules Time</strong> </label>
                                            <input type="time"  class="form-control" name="offer_english" placeholder=""  required>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Schedules Duration</strong> </label>
                                            <select name="" class="form-control" id="">
                                                <option value="" selected disabled>--select--</option>
                                                <option value="">30 minutes</option>
                                                <option value="">60 minutes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Schedules Amount</strong> </label>
                                            <input type="text"  class="form-control" name="schedule_amont" placeholder="" required>
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
            <br>
            <div class="page-content-wrapper ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">All Active Schedules</h4>
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
                                                {{-- <th>Edit</th> --}}

                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                                <tr>
                                                    <td>1</td>
                                                    <td>05/12/2021</td>
                                                    <td>09:00 PM</td>
                                                    <td>60 minutes</td>
                                                    <td>48.00 USD</td>
                                                    <td><span class="badge " style="background-color: green!important; color:white">Active</span></td>
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
    <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"
></script>
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
