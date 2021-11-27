@extends('layouts.app')
@section('title')
    Add Time
@endsection

<style>
    .disabled {
        text-decoration: line-through !important;
    }

    .datepicker-days {
        font-size: 23px !important;
    }

    .highlighted {
        background: white !important;
    }

</style>

@section('content')
    <div class="container">
        <form action="{{ url('appointment.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="form-group col-lg-8"><br><br>
                    <div class="w-100 text-center">
                        <label class="text-center" for="inputPassword4"><strong>Set your time zone to
                                continue:</strong></label>
                    </div>
                    <select name="timezone" class="form-control inline-field babel-ignore timezone-select-inactive"
                        id="timezone" onchange="covertTimeToTimeZone()">
                        @foreach ($timezones as $zone)
                            <option value="{{ $zone->name }}" @if ($zone->name == 'Europe/London') selected @endif ofs='{{ $zone->offset }}'>
                                {{ $zone->name }} ({{ $zone->offset }})
                            </option>
                        @endforeach
                    </select>
                </div>



            </div>
            <div class="form-row">

                <div class="form-group col-md-6 offset-2 ">
                    <div id="datepicker"></div>
                    <input name="date" type="hidden" id="my_hidden_input">
                    <input type="hidden" name="slotsall" id="sall" value="{{ json_encode($slots) }}" />
                </div>

                <div class="form-group col-md-4">
                    <label style="color: black" for="inputPassword4"><strong>Select available time</strong></label>
                    <select name="time" class="form-control inline-field babel-ignore timezone-select-inactive" id="m"
                        disabled onchange="setUserTime()">
                        <option value="">Select time</option>
                        @foreach ($slots as $slottime)
                            <option class="dis{{ $slottime->st }}" value="{{ $slottime->st }}">
                                {{ $slottime->st }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-3">
                    <input type="hidden" name="user_time" value="" id="user_time">
                </div>

            </div>
    </div>
    <div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-danger">Send Appointment Request </button>
            <button type="reset" class="btn btn-secondary waves-effect m-l-5">Cancel</button>
        </div>
    </div>

    </div>
    </form>
    </div>
@endsection
@section('scripts')

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css"
        integrity="sha512-p4vIrJ1mDmOVghNMM4YsWxm0ELMJ/T0IkdEvrkNHIcgFsSzDi/fV7YxzTzb3mnMvFPawuIyIrHcpxClauEfpQg=="
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous"></script>
    <script>
        var date = new Date();
        var slotss = JSON.parse($('#sall').val());
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        $('#datepicker').datepicker({
            todayBtn: true,
            startDate: today,
            weekStart: 1,
            daysOfWeekDisabled: "0,1,5,6",
            // daysOfWeekHighlighted: "0,1,2,3,4,5,6",
            todayHighlight: true,
            format: 'dd/mm/yyyy'
        });
        $('#datepicker').on('changeDate', function() {
            $('#my_hidden_input').val(
                $('#datepicker').datepicker('getFormattedDate')
            );
            var curr_date = $('#datepicker').datepicker('getFormattedDate'); //.split("/")
            $.ajax({
                url: "{{ url('getavailability') }}",
                method: "post",
                data: {
                    "_token": "{{ csrf_token() }}",

                    "date": curr_date
                },

                success: function(data) {
                    // var newdata = [];
                    $('#sall').val(JSON.stringify(data));
                    console.log(data);
                    // return;
                    covertTimeToTimeZone();
                    $('#m').prop("disabled", false);
                    // var response = JSON.parse(data);
                    // var i = 0;
                    // $('#m').find('option').remove(); 
                    //     $.each(response,function(key, value){
                    //         $('#m').append('<option value=' + value + '>' + value + '</option>');
                    //     });
                },
                error: function(err) {
                    console.log(err);
                }
            });

        });

        function setUserTime() {
            $('#user_time').val($('#m').find(':selected').attr('ut'));
        }

        function convertUpdatedTime() {
            var element = $('#timezone').find('option:selected');
            var tzoffset = element.attr("ofs");
            var timezoneOffset = tzoffset.replace(":", ".");
            var nt = [];
            slotss.forEach((time, index) => {
                if (time['st'].includes('AM')) {
                    nt[index] = time['st'].replace('AM', '');
                    nt[index] = parseInt(nt[index]) + parseInt(timezoneOffset);
                } else {
                    nt[index] = time['st'].replace('PM', '');
                    if (parseInt(time['st']) != 12) {
                        nt[index] = parseInt(time['st']) + 12;
                    }
                    nt[index] = parseInt(nt[index]) + parseInt(timezoneOffset);
                }
            });
            // console.log(nt);
            nt.forEach((ntime, index) => {
                // console.log(ntime.toString().length);
                if (ntime.toString().length == 1) {
                    ntime = '0' + ntime;
                }
                let timeString = ntime + ':00:00';
                console.log(timeString);
                // Append any date. Use your birthday.
                let timeString12hr = new Date('1970-01-01' + timeString + 'Z')
                    .toLocaleTimeString({}, {
                        timeZone: 'UTC',
                        hour12: true,
                        hour: 'numeric',
                        minute: 'numeric'
                    });
                nt[index] = timeString12hr;
                console.log(nt);
            });
            // console.log(nt);    
            var opt = '<option value="">Select time</option>';
            nt.forEach((nslot, index) => {
                opt += '<option ut = "" value="' + nslot + '">' + nslot + '</option>';
            });
            $('#m').html(opt);
        }

        function covertTimeToTimeZone() {
            slotss = JSON.parse($('#sall').val());
            slotss = Object.values(slotss);
            // console.log(slotss);return;
            var element = $('#timezone').find('option:selected');
            var tzoffset = element.attr("ofs");
            var timezoneOffset = tzoffset.replace(":", ".");
            var nt = [];
            console.log('Slots');
            console.log(slotss);
            slotss.forEach((time, index) => {
                if (time.includes('AM')) {
                    nt[index] = time.replace('AM', '');
                    nt[index] = parseInt(nt[index]) + parseInt(timezoneOffset);
                    if (nt[index] < 0) {
                        nt[index] = nt[index] + 24;
                    }
                    if (nt[index] > 24) {
                        nt[index] = nt[index] - 24;
                    }
                } else {
                    nt[index] = time.replace('PM', '');
                    if (parseInt(time) != 12) {
                        nt[index] = parseInt(time) + 12;
                    }
                    nt[index] = parseInt(nt[index]) + parseInt(timezoneOffset);
                    console.log(nt[index]);
                    if (nt[index] > 24) {
                        nt[index] = nt[index] - 24;
                    }
                }
            });
            console.log('Afer Proccessing');
            console.log(nt);
            nt.forEach((ntime, index) => {
                // console.log(ntime.toString().length);
                if (ntime.toString().length == 1) {
                    ntime = '0' + ntime;
                }
                let timeString = ntime + ':00';
                // Append any date. Use your birthday.
                let timeString12hr = new Date('1970-01-01T' + timeString + 'Z')
                    .toLocaleTimeString({}, {
                        timeZone: 'UTC',
                        hour12: true,
                        hour: 'numeric',
                        minute: 'numeric'
                    });
                nt[index] = timeString12hr;
            });
            // console.log(nt);
            // console.log(nt);    
            var opt = '<option value="">Select time</option>';
            nt.forEach((nslot, index) => {
                opt += '<option ut="' + nslot + '" value="' + slotss[index] + '">' + nslot + '</option>';

            });
            $('#m').html(opt);
            // console.log(slotss);
            // console.log(newslotss);

        }
    </script>


@endsection
