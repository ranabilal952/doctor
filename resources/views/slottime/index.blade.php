@extends('layouts.app')
@section('title')
    Add Slot Time
@endsection
@section('content')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Select Available Time</h4>
                            <p class="text-muted m-b-20 font-14"></p>
                            <form class="" action="{{ route('slottime.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{-- <label><strong>Time :</strong></label> --}}
                                            <div>
                                                <select name="st"
                                                    class="form-control inline-field babel-ignore timezone-select-inactive"
                                                    id="m">
                                                    <option value="select">Select time</option>
                                                    <option value="10:00 AM">10:00 AM</option>
                                                    <option value="11:00 AM">11:00 AM</option>
                                                    <option value="12:00 PM">12:00 PM</option>
                                                    <option value="1:00 PM">1:00 PM</option>
                                                    <option value="2:00 PM">2:00 PM</option>
                                                    <option value="3:00 PM">3:00 PM</option>
                                                    <option value="4:00 PM">4:00 PM</option>
                                                    <option value="5:00 PM">5:00 PM</option>
                                                    <option value="6:00 PM">6:00 PM</option>
                                                    <option value="7:00 PM">7:00 PM</option>
                                                    <option value="8:00 PM">8:00 PM</option>
                                                    <option value="9:00 PM">9:00 PM</option>
                                                    <option value="10:00 PM">10:00 PM</option>
                                                    <option value="11:00 PM">11:00 PM</option>
                                                    <option value="12:00 AM">12:00 AM</option>
                                                    <option value="1:00 AM">1:00 AM</option>
                                                    <option value="2:00 AM">2:00 AM</option>
                                                    <option value="3:00 AM">3:00 AM</option>
                                                    <option value="4:00 AM">4:00 AM</option>
                                                    <option value="5:00 AM">5:00 AM</option>
                                                    <option value="6:00 AM">6:00 AM</option>
                                                    <option value="7:00 AM">7:00 AM</option>
                                                    <option value="8:00 AM">8:00 AM</option>
                                                    <option value="9:00 AM">9:00 AM</option>
                                                </select>
                                            </div>
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
                                    <h4 class="mt-0 header-title">Current Available Slots</h4>
                                    <p class="text-muted m-b-30 font-14"></p>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Day Time</th>
                                                <th>Delete</th>
                                                {{-- <th>Edit</th> --}}

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($slotTimes as $key => $slottime)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $slottime->st }}</td>
                                                    <td>
                                                        <form action="{{ route('slottime.destroy', $slottime->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <center><button class="btn btn-primary btn-xs"><i
                                                                        class="fa fa-trash"></i></button></center>
                                                        </form>
                                                    </td>
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

        <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Home Update</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="updateForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-1 col-form-label">Title</label>
                                <div class="col-sm-12 ">
                                    <select name="st" title=""
                                        class="form-control inline-field babel-ignore timezone-select-inactive" id="m">

                                    </select>
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
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.edit-btn', function() {
                var id = $(this).attr('id');
                var st = $(this).attr('st');
                // console.log(id);
                $('#st').val(st);
                $('#updateForm').attr('action', '{{ route('slottime.update', '') }}' + '/' + id);
            });
        });
    </script>
@endsection
