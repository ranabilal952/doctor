@extends('layouts.app')
@section('title')
    Add Schedules
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />


    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="page-content-wrapper ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Add Information</h4>
                                    <p class="text-muted m-b-20 font-14"></p>
                                    <form class="" action="{{ url('store-schedule') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label style="color: black"><strong> Date From</strong> </label>
                                                    <input type="date" class="form-control" name="date_from"
                                                        placeholder="" required>
                                                </div>
                                                @if ($errors->has('date_from'))
                                                    <span
                                                        class="text-primary errorAlignment">{{ $errors->first('date_from') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-lg-6 daysSchedule">
                                                <div class="form-group">
                                                    <label style="color: black"><strong> Date To</strong> </label>
                                                    <input type="date" class="form-control" name="date_to" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="singleAppointment"
                                                        name="singleAppointment">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Single Appointment
                                                    </label>
                                                </div>
                                                @if ($errors->has('singleAppointment'))
                                                    <span
                                                        class="text-primary errorAlignment">{{ $errors->first('singleAppointment') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 mt-3 daysSchedule" id="daysSchedule">
                                                <div class="form-group">
                                                    <label style="color: black"><strong> Schedules Days</strong> </label>
                                                    <br>
                                                    <select id="scheduleDays" name="schedule_days[]" class="selectpicker"
                                                        multiple data-live-search="true">
                                                        <option value="sunday">Sunday</option>
                                                        <option value="monday">Monday</option>
                                                        <option value="tuesday">Tuesday</option>
                                                        <option value="wednesday">Wednesday</option>
                                                        <option value="thursday">Thursday</option>
                                                        <option value="friday">Friday</option>
                                                        <option value="saturday">Saturday</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('schedule_days'))
                                                    <span
                                                        class="text-primary errorAlignment">{{ $errors->first('schedule_days') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <div class="form-group">
                                                    <label style="color: black"><strong> Schedules Time</strong> </label>
                                                    <input type="time" class="form-control" name="schedule_time"
                                                        placeholder="" required>
                                                </div>
                                                @if ($errors->has('schedule_time'))
                                                    <span
                                                        class="text-primary errorAlignment">{{ $errors->first('schedule_time') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label style="color: black"><strong>Duration</strong>
                                                    </label>
                                                    <select name="duration" class="form-control" id="duration">
                                                        <option value="" selected disabled>--select--</option>
                                                        <option value="30">30 minutes</option>
                                                        <option value="60">60 minutes</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('duration'))
                                                    <span
                                                        class="text-primary errorAlignment">{{ $errors->first('duration') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label style="color: black"><strong> Amount</strong> </label>
                                                    <input id="amount" readonly type="text" class="form-control"
                                                        name="amount" placeholder="">
                                                </div>
                                                @if ($errors->has('amount'))
                                                    <span
                                                        class="text-primary errorAlignment">{{ $errors->first('amount') }}</span>
                                                @endif
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
        var doctor = @json($doctor);
        $(document).ready(function() {
            $("#singleAppointment").change(function() {
                if (this.checked) {
                    $(".daysSchedule").hide(); // checked

                } else
                    $(".daysSchedule").show(); // unchecked
            });

            $('#scheduleDays').selectpicker();

            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'pdf', 'print'
                ]
            });

            $('#duration').on('change', function() {
                if (this.value == '60') {
                    $('#amount').val(doctor.sixty_minute_price);
                } else {
                    $('#amount').val(doctor.thirty_minute_price);

                }
            });


        });
    </script>
@endsection
