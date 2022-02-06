@extends('layouts.app')
@section('title')
    {{ __('How to Book Session')}}
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
                            <form class="" action="{{ url('sesion_save') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Title</strong> </label>
                                            <input type="text" value="{{ $book_session->title ?? '' }}"
                                                class="form-control" name="title" placeholder="Title" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label><strong style="color: black">Description:</strong></label>
                                            <div>
                                                <textarea name="description" class="form-control" cols="110"
                                                    rows="03">{{ $book_session->description ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Video Link:</strong></label>
                                            <div>
                                                <input type="text" name="video_link" class="form-control"
                                                    value="{{ $book_session->video_link ?? '' }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Video Link:</strong>(required)</label>
                                            <div>
                                                <input type="text" name="video_link" class="form-control"
                                                    value="{{ $book_session->video_link2 ?? '' }}" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Video Link:</strong>(required)</label>
                                            <div>
                                                <input type="text" name="video_link" class="form-control"
                                                    value="{{ $book_session->video_link3 ?? '' }}" required />
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
