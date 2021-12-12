@extends('layouts.app')
@section('title')
    Withdraw Request
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
                                    <h4 class="mt-0 header-title">Withdraw Request</h4>
                                    <p class="text-muted m-b-30 font-14"></p>
                                    <table id="example" style="width:100%" class="table table-bordered dt-responsive nowrap"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr.no</th>
                                                <th>Doctor Name</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                {{-- <th>Schedule Type</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($withdrawRequest as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ ucfirst($item->user->name) }}</td>
                                                    <td>{{ $item->withdraw_amount }}.00 USD</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td><a href="{{ url('approve-withdraw-request', $item->id) }}"> <span
                                                                title="Approve Request" class="fa fa-check"
                                                                style="color: green"></span></a></td>
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
