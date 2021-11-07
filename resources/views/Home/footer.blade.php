@extends('layouts.app')
@section('title')
    Footer Data
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
                            <form class="" action="{{ url('footer_save') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Footer title</strong> </label>
                                            <input type="text" value="{{ $footer->title }}" class="form-control"
                                                name="title" placeholder="full title" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Description:</strong></label>
                                            <div>
                                                <textarea name="description" class="form-control" cols="110"
                                                    rows="05">{{ $footer->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Footer title (Arabic)</strong> </label>
                                            <input type="text" value="{{ $footer->arabic_title }}" class="form-control"
                                                name="arabic_title" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Description (Arabic)</strong></label>
                                            <div>
                                                <textarea name="arabic_description" class="form-control" cols="110"
                                                    rows="05">{{ $footer->arabic_description }}</textarea>
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
    <script>
        $(document).ready(function() {
            $('body').on('click', '.edit-btn', function() {
                var id = $(this).attr('id');
                var title = $(this).attr('title');
                var maintitle = $(this).attr('maintitle');
                var Image = $(this).attr('Image');
                var description = $(this).attr('description');
                // console.log(id);
                $('#title').val(title);
                $('#maintitle').val(maintitle);
                $('#Image').val(Image);
                $('#description').val(description);

            });
        });
    </script>
@endsection
