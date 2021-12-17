@extends('layouts.app')
@section('title')
    Doctors Sessions
@endsection
@section('content')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Enter Information </h4>
                            <p class="text-muted m-b-30 font-14"></p>
                            <form class="" action="{{ url('admin-doctor-sessions') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Doctors:</strong>(required)</label>
                                            <div>
                                                <select name="doctor_id" class="form-control" id="">
                                                    <option value="doct" disabled>Select</option>
                                                    @foreach ($doctors as $doctor)
                                                        <option value="{{ $doctor->id }}">{{ ucfirst($doctor->name) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Sessions </strong>(required)</label>
                                            <div>
                                                <select name="session_time" class="form-control" id="">
                                                    <option value="" disabled>Select</option>
                                                    <option value="upcoming">Upcoming</option>
                                                    <option value="previous">Previous</option>
                                                    <option value="cancel">Cancel</option>

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
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>

                            @isset($upcomingSessions)
                                <div class="doctorsSessions row">
                                    @foreach ($upcomingSessions as $sessions)
                                        @php
                                            $appointmentId = \App\Models\PaymentTransaction::where('appointment_schedule_id', $sessions->id)
                                                ->where('to_user_id', 1)
                                                ->first();
                                            $date = \Carbon\Carbon::parse($sessions->slot->date_from . $sessions->slot->time);
                                            $timeLeft = \Carbon\Carbon::now()->diff($date);
                                            
                                        @endphp
                                        <div class="col-md-4">
                                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                                <div class="card-header">Duration: {{ $timeLeft->format('%a') }} Days left
                                                </div>
                                                <div class="card-body text-primary">
                                                    <h5 class="card-title">{{ Ucfirst($sessions->doctor->name) }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Date:
                                                        {{ $sessions->slot->date_from }}</h6>
                                                    <h6 class="card-subtitle mb-2 text-muted">Time:
                                                        {{ $sessions->slot->time }}</h6>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        {{ $sessions->slot->duration }} Minutes</h6>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        {{ $appointmentId->amount }} USD</h6>
                                                    <h6 class="card-subtitle mb-2 text-muted">Doctor Amount
                                                        {{ $appointmentId->amount - $appointmentId->site_tax - ($appointmentId->amount - $appointmentId->site_tax) * 0.4 }}
                                                        USD
                                                    </h6>
                                                    <h6 class="card-subtitle mb-2 text-muted">Admin Fee
                                                        {{ ($appointmentId->amount -$appointmentId->site_tax) * 0.4 }} USD</h6>
                                                </div>
                                                <div class="card-footer">Patient:
                                                    {{ ucfirst($sessions->user->name) }}</div>

                                            </div>
                                            {{-- <div class="card" style="width: 18rem;">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ Ucfirst($sessions->doctor->name) }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Date:
                                                        {{ $sessions->slot->date_from }}</h6>
                                                    <h6 class="card-subtitle mb-2 text-muted">Time:
                                                        {{ $sessions->slot->time }}</h6>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        {{ $sessions->slot->duration }} Minutes</h6>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        {{ $appointmentId->amount }}.00 USD</h6>
                                                    <h6 class="card-subtitle mb-2 text-muted">Patient:
                                                        {{ ucfirst($sessions->user->name) }}</h6>
                                                </div>
                                            </div> --}}
                                        </div>
                                    @endforeach
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{-- <div class="page-content-wrapper ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">All Payment Links </h4>
                                    <p class="text-muted m-b-30 font-14"></p>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Amount</th>
                                                <th>Doctor Name</th>
                                                <th>Link</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
    </div>

    {{-- <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <input class="form-control" type="text" name="title" id="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-1 col-form-label">Image</label>
                                <div class="col-sm-12 ">
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-1 col-form-label">Description</label>
                                <div class="col-sm-12 ">
                                    <input class="form-control" type="text" name="description" id="description">
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
        </div> --}}
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.edit-btn', function() {
                var id = $(this).attr('id');
                var title = $(this).attr('title');
                var Image = $(this).attr('Image');
                var description = $(this).attr('description');
                // console.log(id);
                $('#title').val(title);
                $('#Image').val(Image);
                $('#description').val(description);

            });
        });
    </script>
@endsection
