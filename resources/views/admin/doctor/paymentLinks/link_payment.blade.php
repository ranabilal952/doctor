@extends('front.layout')
@section('title')
    Payment Details
@endsection

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

    <div class="container">

        <div class="d-flex text-center justify-content-evenly">

            <div class="">
                <h5>Payment Amount</h5>
                <p>{{ currency(doubleVal($paymentLink->amount), 'USD', currency()->getUserCurrency()) }}</p>
            </div>
            <div class="">
                <h5>Site Tax</h5>
                <p>{{ currency(doubleVal($siteTax), 'USD', currency()->getUserCurrency()) }}</p>
            </div>
        </div>

        <div class="row mt-3 justify-content-center" id="paymentForm">
            <div class="col-md-6 card mb-3">
                <div class=" credit-card-box">
                    <div class="w-100">
                        <div class="text-center mt-2" style="height: auto;min-width:100%">
                            <img src="{{ asset('visa.jpeg') }}">
                        </div>
                    </div>
                    <div class="panel-body" style="padding: 28px">
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        <form role="form" action="{{ url('pay-link-payment') }}" method="post" class="require-validation"
                            data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                            @csrf
                            <input type="hidden" name="payment_link_id" id=" " value="{{ $paymentLink->id }}">
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label style="color: black" class='control-label'>Name on Card</label> <input
                                        class='form-control' name="card_name" size='4' type='text'>
                                </div>
                            </div>


                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label style="color: black" class='control-label'>Card Number</label> <input
                                        class='form-control' autocomplete='off' name="card_number" size='4' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label style="color: black" class='control-label'>Email</label> <input
                                        class='form-control' autocomplete='off' name="email" type='email'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label style="color: black" class='control-label'>Phone no</label> <input
                                        class='form-control' autocomplete='off' name="phone_no" type='text'>
                                </div>
                            </div>



                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                        class='form-control card-cvc' name="cvc" placeholder='ex. 311' size='4' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' name="expiry_month" placeholder='MM' size='2'
                                        type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' name="year" placeholder='YYYY' size='4'
                                        type='text'>
                                </div>
                            </div>



                            <div class="mb-5">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now
                                        ($){{ $paymentLink->amount + $siteTax }}.00 </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>


    {{-- <script src="https://js.stripe.com/v3/"></script> --}}

@endsection
@section('scripts')

    <script type="text/javascript">
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
