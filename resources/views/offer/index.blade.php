@extends('layouts.app')
@section('title')
    Offer
@endsection
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">


    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Add Information</h4>
                            <p class="text-muted m-b-20 font-14"></p>
                            <form class="" action="{{ route('offersave') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Name of offer in Arabic</strong> </label>
                                            <input type="text"  class="form-control" name="offer_arabic" placeholder="" required>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Name of offer in English</strong> </label>
                                            <input type="text"  class="form-control" name="offer_english" placeholder=""  required>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Description of offer in Arabic</strong> </label>
                                            <textarea name="description_arabic" class="form-control" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Description of offer in English</strong> </label>
                                            <textarea name="description_english" class="form-control" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Number of sessions</strong> </label>
                                            <input type="number"  class="form-control" name="number_session" placeholder="" required>
                                        </div>
                                    </div>                                     
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Amount</strong> </label>
                                            <input type="number"  class="form-control" name="offer_amount" placeholder="" required>
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
                                    <h4 class="mt-0 header-title">All INFO</h4>
                                    <p class="text-muted m-b-30 font-14"></p>
                                    <table id="example"  style="width:100%" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Number Offer Session</th>
                                                <th> Offer Amount</th>
                                                <th> Offer Status</th>
                                                <th> Action</th>
                                                {{-- <th>Edit</th> --}}

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($offer as $key => $offer)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $offer->number_session }}</td>
                                                    <td>{{ $offer->offer_amount }}</td>
                                                   
                                                    <td><span class="badge badge-primary">Active</span></td>
                                                    <td><span class="badge badge-default">Deactive</span></td>
                                                    {{-- <td>
                                                <center> <button type="button" class="edit-btn btn btn-danger"
                                                        id="{{$slottime->id}}" time="{{$slottime->time}}"
                                                        data-toggle="modal" data-target="#edit-modal"><i
                                                            class="fa fa-pencil"></i></button></center>

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
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'csv',  'pdf', 'print'
        ]
    } );
} );
    </script>
@endsection
