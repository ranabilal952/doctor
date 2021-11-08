@extends('layouts.app')
@section('title')
    Home Title And Description
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
                            <form class="" action="{{ url('save_title') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Title (English)</strong> </label>
                                            <input type="text" class="form-control" value="{{ $home_title->title ?? '' }}"
                                                name="title" placeholder="Enter Title" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Description (English)</strong></label>
                                            <div>
                                                <textarea name="description" class="form-control" cols="110"
                                                    rows="6">{{ $home_title->description ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Title (Arabic)</strong> </label>
                                            <input type="text" class="form-control" value="{{ $home_title->title_arabic  ?? ''}}"
                                                name="arabic_title" placeholder="Enter Title" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Description (Arabic)</strong></label>
                                            <div>
                                                <textarea name="arabic_description" class="form-control" cols="110"
                                                    rows="6">{{ $home_title->description_arabic ?? '' }}</textarea>
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

        </div>


    </div>
@endsection
@section('scripts')
@endsection
