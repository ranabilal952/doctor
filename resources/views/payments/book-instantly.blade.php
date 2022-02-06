@extends('layouts.app')
@section('title')
    Payment Details
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
        <div class="container-fluid">
            <div class="row " id="detailSchedule">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <h4 class="mt-0 header-title">Schedule Date</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ \Carbon\Carbon::now() }}
                                    </p>
                                </div>


                                <div class="col-md-6">
                                    <h4 class="mt-0 header-title">Schedule Duration</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ $duration }} Minutes
                                    </p>
                                </div>


                                <div class="col-md-6">
                                    <h4 class="mt-0 header-title">Schedule Amount</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ currency()->getUserCurrency() }}
                                        {{ number_format(ceil(preg_replace('/[^A-Za-z0-9\-]/', '', currency(intVal($slotAmount), 'USD', currency()->getUserCurrency())))) }}
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <h4 class="mt-0 header-title">Site Fee</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ currency()->getUserCurrency() }}
                                        {{ number_format(ceil(preg_replace('/[^A-Za-z0-9\-]/', '', currency(intVal($totalTax), 'USD', currency()->getUserCurrency())))) }}
                                    </p>
                                </div>

                                {{-- <div class="col-md-6">
                                    <h4 class="mt-0 header-title">System Fee</h4>
                                    <p class="text-muted m-b-30 font-16">
                                        {{ $doctorPercent }} USD
                                    </p>
                                </div> --}}

                            </div>
                            <div class="w-100 text-center">
                                <button id="goToPayment" class="btn btn-primary">Go to Payment</button>
                            </div>

                        </div>

                    </div>

                </div>


            </div>
            <div class="row d-none" id="paymentForm">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table text-center ">
                            <div class="row display-tr justify-content-center text-center">
                                <h3 class="panel-title display-td text-center ">Payment Details</h3>
                                <div class="display-td">
                                    <img class="img-responsive pull-right" src="{{ asset('visa.jpeg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif

                            <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                                data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                date-payment="{{ $duration }}" id="payment-form">
                                @csrf
                                <input type="hidden" name="bookInstantly" value="1">
                                <input type="hidden" name="amount" value="{{ $slotAmount }}">
                                <input type="hidden" name="doctor_id" id="" value="{{ $doctorID }}">
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group required'>
                                        <label style="color: black" class='control-label'>Name on Card</label> <input
                                            class='form-control' name="name_on_card" size='4' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label' style="color: black">Card Number</label> <input
                                            autocomplete='off' name="card_number" class='form-control card-number' size='20'
                                            type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label' style="color: black">Email</label> <input
                                            autocomplete='off' name="email" class='form-control card-number' size='20'
                                            type='email'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group card required'>
                                        <label class='control-label' style="color: black">Phone No</label> <input
                                            autocomplete='off' name="phone_no" class='form-control card-number' size='20'
                                            type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                            class='form-control card-cvc' name="cvc" placeholder='ex. 311' size='4'
                                            type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' name="expiry_month" placeholder='MM'
                                            size='2' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' name="year" placeholder='YYYY' size='4'
                                            type='text'>
                                    </div>
                                </div>






                                <div class="row">
                                    <div class="col-xs-12">
                                        <button id="payNowBtn" class="btn btn-primary btn-lg btn-block" type="submit">Pay
                                            Now
                                            ( {{ currency()->getUserCurrency() }}
                                            {{ number_format(ceil(preg_replace('/[^A-Za-z0-9\-]/', '', currency(intVal($totalAmount), 'USD', currency()->getUserCurrency())))) }})</button>
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
        var systemFee = @json($doctorPercent);


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
