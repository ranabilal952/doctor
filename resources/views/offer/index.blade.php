@extends('layouts.app')
@section('title')
    Your Offers
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
                                    <h4 class="mt-0 header-title">All Offers </h4>
                                    <p class="text-muted m-b-30 font-14"></p>
                                    <table id="example" style="width:100%" class="table table-bordered dt-responsive nowrap"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Number Offer Session</th>
                                                <th> Offer Amount</th>
                                                <th> Offer Status</th>
                                                <th> Created at</th>
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

                                                    <td><span
                                                            class="badge badge-primary">{{ $offer->is_active ? 'Active' : 'Deactive' }}
                                                        </span></td>
                                                    <td>{{ $offer->created_at->format('Y-M-d') }}</td>
                                                    <td><a href="{{ url('toggle-offer', $offer->id) }}"> <span
                                                                class="badge badge-default">{{ $offer->is_active ? 'Active' : 'Deactive' }}
                                                            </span></a></td>

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
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'pdf', 'print'
                ]
            });
        });
    </script>
@endsection
