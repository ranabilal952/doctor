@extends('layouts.app')
@section('title')
    {{ __('Payment Details') }}
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

<script src="https://js.stripe.com/v3/"></script>
<style>
    .panel-title {
        display: inline;
        font-weight: bold;
    }

    .display-table {
        display: table;
    }

    .display-tr {
        display: table-row;
    }

    .display-td {
        display: table-cell;
        vertical-align: middle;
        width: 61%;
    }

</style>

@section('content')
    <div class="page-content-wrapper ">
        <div class="container">
            <div class="row " id="detailSchedule">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <h4 class="mt-0 header-title">{{ __('Schedule Date') }}</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ $slotTime->date_from }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mt-0 header-title">{{ __('Schedule Time') }}</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ $slotTime->time }}
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <h4 class="mt-0 header-title">{{ __('Schedule Duration') }}</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ $slotTime->duration }} {{ __('minutes') }}
                                    </p>
                                </div>


                                <div class="col-md-6">
                                    <h4 class="mt-0 header-title">{{ __('Schedule Amount') }}</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ currency()->getUserCurrency() }}
                                        {{ round(preg_replace('/[^A-Za-z0-9\-]/','',currency(intVal($slotTime->amount) / 100, 'USD', currency()->getUserCurrency()))) }}

                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <h4 class="mt-0 header-title">{{ __('Site Fee') }}</h4>

                                    <p class="text-muted m-b-30 font-16">
                                        {{ currency()->getUserCurrency() }}
                                        {{ round(preg_replace('/[^A-Za-z0-9\-]/', '', currency(intVal($totalTax) / 100, 'USD', currency()->getUserCurrency()))) }}
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <div class="">
                                        <button style="padding: 10px 20px 10px 20px;margin-top:20px;font-size:15px"
                                            id="goToPayment" class="btn btn-primary">{{ __('Payment') }}</button>

                                    </div>
                                </div>


                            </div>


                        </div>

                    </div>

                </div>
            </div>


            <div class="row d-none" id="paymentForm">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table text-center w-100">
                            <div class="row display-tr justify-content-center text-center ">
                                <h3 class="panel-title display-td text-center ">{{ __('Payment Details') }}</h3>
                                {{-- <div class="display-td"> --}}
                                {{-- <img class="img-responsive pull-right" src="{{ asset('visa.jpeg') }}"> --}}
                                {{-- </div> --}}
                            </div>
                        </div>
                        <div class="panel-body">
                            @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif

                            <form role="form" action="{{ route('stripe.post') }}" method="post"
                                class="require-validation" data-cc-on-file="false"
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                date-payment="{{ $slotTime->duration }}" id="payment-form">
                                @csrf
                                <input type="hidden" name="slot_id" value="{{ $slotTime->id }}" id="">
                                <input type="hidden" name="isCouponApplied" id="isCouponApplied" value="false">
                                <input type="hidden" name="couponValue" id="couponValue" value="0">
                                <input type="hidden" name="couponId" id="couponId" value="0">
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label style="color: black"
                                            class='control-label'>{{ __('Name on Card') }}</label>
                                        <input class='form-control' name="name_on_card" size='4' type='text'>
                                    </div>
                                </div>



                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label' style="color: black">{{ __('Email') }}</label>
                                        <input autocomplete='off' name="email" class='form-control card-number' size='20'
                                            type='email'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label' style="color: black">{{ __('Phone No') }}</label>
                                        <input value="+{{ $call }}" autocomplete='off' name="phone_no"
                                            class='form-control card-number' size='20' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label' style="color: black">{{ __('Card Number') }}

                                        </label>
                                        <input autocomplete='off' name="card_number" class='form-control card-number'
                                            size='20' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>{{ 'CVC' }}</label> <input autocomplete='off'
                                            class='form-control card-cvc' name="cvc" placeholder='ex. 311' size='4'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>{{ __('Expiration Month') }}</label> <input
                                            class='form-control card-expiry-month' name="expiry_month" placeholder='MM'
                                            size='2' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>{{ __('Expiration Year') }}</label> <input
                                            class='form-control card-expiry-year' name="year" placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-6 form-group card required'>
                                        <small class='control-label'
                                            style="color: black">{{ __('Coupon Code (If any)') }}</small>
                                        <input id="couponCode" autocomplete='off' name="coupon_code"
                                            class='form-control card-number' size='20' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-6 form-group ' id="clickthis">
                                        <label class='control-label'
                                            style="color: black">{{ __('Click this button after enter coupon code') }}</label>

                                        <button onclick="checkCouponValid()" type="button"
                                            class="btn btn-primary">{{ __('Check Now') }}</button>
                                    </div>
                                    <div class='col-xs-12 col-md-6 form-group mt-3 d-none ' id="afterCouponApproved">
                                        <span class="text-center text-success mt-">Coupon Applied Successfully</span>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-xs-12">
                                        <button id="payNowBtn" class="btn btn-primary btn-lg btn-block"
                                            type="submit">{{ __('Pay Now') }}
                                            ( {{ currency()->getUserCurrency() }}
                                            {{ round(preg_replace('/[^A-Za-z0-9\-]/', '', currency(intVal($totalAmount) / 100, 'USD', currency()->getUserCurrency()))) }})</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
    {{-- <script src="https://js.stripe.com/v3/"></script> --}}

@endsection
@section('scripts')


    <script type="text/javascript">
        var slotTime = @json($slotTime);
        var systemFee = @json($doctorPercent);

        function checkCouponValid() {
            var couponCode = $('#couponCode').val();
            if (couponCode.length == 0) {
                alert('Coupone code can\'t be empty');
            }

            $.ajax({
                url: '/checkCouponValid',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {
                    _token: "{{ csrf_token() }}",
                    doctor_id: slotTime.user_id,
                    coupon_code: couponCode,
                },
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function(data) {
                    if (data.success) {
                        let discount;
                        var amount = parseInt(systemFee) + parseInt(slotTime.amount);
                        if (data.data.method === 'percent') {
                            discount = (parseInt(data.data.coupon_value) / 100);
                            amount = amount - ((amount * discount));
                        } else {
                            //amount
                            discount = parseInt(data.data.coupon_value);
                            amount = amount - discount;
                        }
                        $('#isCouponApplied').val('true');
                        $('#couponValue').val(amount);
                        $('#couponId').val(data.data.id);


                        // alert(amount);
                        $('#payNowBtn').html('Pay Now ($' + amount + ')');
                        $("#couponCode").prop('disabled', true);
                        $('#clickthis').addClass('d-none');
                        $('#afterCouponApproved').removeClass('d-none');

                    } else {
                        alert(data.message);
                    }
                }
            });

        }
        $(function() {

            $('#goToPayment').click(function(e) {
                e.preventDefault();
                $('#detailSchedule').addClass('d-none');
                $('#paymentForm').removeClass('d-none');
            })
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    $form.get(0).submit();
                    return;
                }
            });
        });
    </script>

@endsection
