@extends('layouts.app')
@section('title')
    Home Accordion
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
                            <form class="" action="{{ url('accordion_save') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-lg-12">
                                            <div class="form-group">
                                                <label style="color: black"><strong>Enter Main Title</strong> </label>
                                           <input type="text" class="form-control" name="name"  placeholder="full name" required>
                                            </div>
                                        </div> --}}
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Enter Accordion Title (English)</strong>
                                            </label>
                                            <input type="text" class="form-control" name="title" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Description (English)</strong></label>
                                            <div>
                                                <textarea name="description" class="form-control" cols="110"
                                                    rows="03"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong>Enter Accordion Title (Arabic)</strong>
                                            </label>
                                            <input type="text" class="form-control" name="arabic_title"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><strong style="color: black">Description (Arabic)</strong></label>
                                            <div>
                                                <textarea name="arabic_description" class="form-control" cols="110"
                                                    rows="03"></textarea>
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
            <div class="page-content-wrapper ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">All Info </h4>
                                    <p class="text-muted m-b-30 font-14"></p>
                                    <table id="" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Title (Arabic)</th>
                                                <th>Description (Arabic)</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($homeAccordin as $key => $homeAccordin)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $homeAccordin->title }}</td>
                                                    <td>{{ $homeAccordin->description }}</td>
                                                    <td>{{ $homeAccordin->arabic_title ?? 'Not Available' }}</td>
                                                    <td>{{ $homeAccordin->arabic_description ?? 'Not Available' }}</td>
                                                    <td> <a href="{{ url('accordion_destory/' . $homeAccordin->id) }}"><i
                                                                class="fa fa-trash " style="color: red"></i></a> </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Slider Update</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">??</span>
                        </button>
                    </div>
                    <form id="updateForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-1 col-form-label">Title</label>
                                <div class="col-sm-12 ">
                                    <input class="form-control" type="text" name="title" id="title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-1 col-form-label">Main Title</label>
                                <div class="col-sm-12 ">
                                    <input class="form-control" type="text" name="maintitle" id="maintitle">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-1 col-form-label">Image</label>
                                <div class="col-sm-12 ">
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-1 col-form-label">Description</label>
                                <div class="col-sm-12 ">
                                    <textarea name="description" id="description" class="form-control" cols="110"
                                        rows="03"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-6 left">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                </div>

                </form>
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
