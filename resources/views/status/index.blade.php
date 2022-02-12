@extends('layouts.app')
@section('title')
    Online Setting
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

@section('content')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Update Information</h4>
                            <p class="text-muted m-b-20 font-14"></p>
                            <form class="" action="{{ url('postOnlineStatus') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Online settings</strong> </label>
                                            <select name="is_active" class="form-control" id="onlineChecker">
                                                <option value="active"
                                                    {{ $onlineStatus->is_active == 1 ? 'selected' : '' }}>Activated
                                                </option>
                                                <option value="deactive"
                                                    {{ $onlineStatus->is_active == 0 ? 'selected' : '' }}>Deactivated
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row {{ $onlineStatus->is_active == 1 ? '' : 'd-none' }}" id="activated">

                                    <div class="col-lg-12 w-100">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Schedules Days</strong> </label>
                                            <br>
                                            @php
                                                $days = explode(',', $onlineStatus->schedule_days);
                                                
                                            @endphp

                                            <select style="width:100%!important" id="scheduleDays" name="schedule_days[]"
                                                class="selectpicker" multiple data-live-search="true">

                                                <option value="sunday"
                                                    {{ in_array('["sunday"', $days) ? 'selected' : '' }}>
                                                    Sunday</option>
                                                <option value="monday"
                                                    {{ in_array('"monday"', $days) ? 'selected' : '' }}>Monday</option>
                                                <option value="tuesday"
                                                    {{ in_array('"tuesday"', $days) ? 'selected' : '' }}>Tuesday</option>
                                                <option value="wednesday" {{ in_array('"wednesday"', $days) ? 'selected' : '' }}>Wednesday</option>
                                                <option value="thursday" {{ in_array('"thursday"', $days) ? 'selected' : '' }}>Thursday</option>
                                                <option value="friday" {{ in_array('"friday"', $days) ? 'selected' : '' }}>Friday</option>
                                                <option value="saturday" {{ in_array('"saturday"]', $days) ? 'selected' : '' }}>Saturday</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Online from</strong> </label>
                                            <input type="time" value="{{ $onlineStatus->online_from ?? '' }}"
                                                name="online_from" id="" class="form-control">
                                        </div>
                                        @if ($errors->has('online_from'))
                                            <span class="text-primary">{{ $errors->first('online_from') }}</span>
                                        @endif
                                    </div>



                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Online To</strong> </label>
                                            <input type="time" value="{{ $onlineStatus->online_to ?? '' }}"
                                                name="online_to" id="" class="form-control">
                                        </div>
                                        @if ($errors->has('online_fto'))
                                            <span class="text-primary">{{ $errors->first('online_fto') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Instant session amount | 30
                                                    minutes</strong> </label>
                                            <input type="number"
                                                value="{{ $onlineStatus->instant_30_minutes_amount ?? '' }}"
                                                name="instant_30_minutes_amount" id="" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Instant session amount | 60
                                                    minutes</strong> </label>
                                            <input type="number"
                                                value="{{ $onlineStatus->instant_60_minutes_amount ?? '' }}"
                                                name="instant_60_minutes_amount" id="" class="form-control">
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
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $('#scheduleDays').selectpicker();
        $('#onlineChecker').on('change', function() {
            if (this.value === 'deactive') {
                $('#activated').addClass('d-none');
            } else {
                $('#activated').removeClass('d-none');
            }
        });
    </script>

@endsection
