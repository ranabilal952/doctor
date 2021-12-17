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

            <div class="page-content-wrapper ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">All Schedules</h4>
                                    <p class="text-muted m-b-30 font-14"></p>
                                    <table id="" class="example table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Schedules Date</th>
                                                <th>Schedules Time</th>
                                                <th>Schedules Duration</th>
                                                <th> Schedules Amount</th>
                                                <th> Schedules Status</th>
                                                <th> Schedules Action</th>
                                                {{-- <th> Schedules Edit</th> --}}
                                                {{-- <th> Action</th> --}}
                                                {{-- <th>Edit</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($slotTime)
                                                @foreach ($slotTime as $key => $slotTime)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $slotTime['date_from'] }}</td>
                                                        <td>{{ $slotTime['time'] }}</td>
                                                        <td>{{ $slotTime['duration'] }} Minutes</td>
                                                        <td>{{ floatval($slotTime['amount']) }} USD</td>
                                                        <td>
                                                            @if ($slotTime->booking_status == '3')
                                                                <span class="badge badge-primary"> Deactive </span>
                                                            @else
                                                                <span class="badge "
                                                                    style="background-color: green!important; color:white">Active</span>

                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($slotTime->booking_status == '3')
                                                                <a href="{{ url('approved', $slotTime->id) }}"
                                                                    class="btn btn-danger ">Approve</a>
                                                            @else
                                                                <a href="{{ url('unapproved', $slotTime->id) }}"
                                                                    class="badge ">unactive</a>/
                                                                <button type="button" class="edit-btn"
                                                                    style="background: #62abe9; color: white; padding: 6px; border-radius: 8px;   width: 45%;   border: none;cursor: pointer;"
                                                                    id="{{ $slotTime->id }}"
                                                                    date_from="{{ $slotTime->date_from }}"
                                                                    time="{{ $slotTime->time }}"
                                                                    duration="{{ $slotTime->duration }}"
                                                                    amount="{{ $slotTime->amount }}" data-toggle="modal"
                                                                    data-target="#edit-modal">
                                                                    <i class="fa fa-pencil"></i>
                                                                </button>
                                                            @endif

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
        <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content" style="background: white">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel" style="color: black"> Update</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="updateForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-12 col-form-label"
                                    style="color: black">Schedules Date</label>
                                <div class="col-sm-12 ">
                                    <input class="form-control" type="date" name="days" id="date_from">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-12 col-form-label"
                                    style="color: black">Schedules Time</label>
                                <div class="col-sm-12 ">
                                    <input class="form-control" type="time" name="time" id="time">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-12 col-form-label"
                                    style="color: black">Schedules Duration
                                </label>
                                <div class="col-sm-12 ">
                                    <input class="form-control" type="text" name="duration" id="duration">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-12 col-form-label"
                                    style="color: black">Schedules Amount
                                </label>
                                <div class="col-sm-12 ">
                                    <input class="form-control" type="text" name="amount" id="amount">
                                </div>
                            </div>
                            <div class="col-sm-6 left">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                </div>
                </form>
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
            $('.example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'pdf', 'print'
                ]
            });
        });
        $(document).ready(function() {
            $('body').on('click', '.edit-btn', function() {

                var id = $(this).attr('id');
                var date_from = $(this).attr('date_from');
                var amount = $(this).attr('amount');
                var time = $(this).attr('time');
                var duration = $(this).attr('duration');

                $('#date_from').val(date_from);
                $('#amount').val(amount);
                $('#time').val(time);
                $('#duration').val(duration);
                $('#updateForm').attr('action', '{{ url('update_schedule', '') }}' + '/' + id);
            });
        });
    </script>
@endsection
