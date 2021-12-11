@extends('layouts.app')
@section('title')
    Payment Settings
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
                            <form class="" action="{{ url('payment-setting') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Site fee:</strong>(required)</label>
                                            <div>
                                                <input value="{{ $paymentSetting->site_fee ?? 0 }}" type="number"
                                                    name="site_fee" class="form-control" required placeholder="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Admin Commision %</strong>(required)</label>
                                            <div>
                                                <input type="number" value="{{ $paymentSetting->admin_commision ?? 40 }}"
                                                    name="admin_commision" class="form-control" required placeholder="" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Stripe Publish
                                                    Key</strong>(required)</label>
                                            <div>
                                                <input type="text" value="{{ $paymentSetting->stripe_publish_key ?? '' }}"
                                                    name="stripe_publish_key" class="form-control" required
                                                    placeholder="" />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Stripe Secret
                                                    Key</strong>(required)</label>
                                            <div>
                                                <input type="text" value="{{ $paymentSetting->stripe_secret_key ?? '' }}"
                                                    name="stripe_secret_key" class="form-control" required
                                                    placeholder="" />
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
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>


    </div>
@endsection
@section('scripts')

@endsection
