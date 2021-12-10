@extends('layouts.app')
@section('title')
    Video URLS
@endsection
@section('content')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-200">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Add Information</h4>
                            <p class="text-muted m-b-20 font-14"></p>
                            <form class="" action="{{ route('videosave') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Title English</strong> </label>
                                            <input type="text" class="form-control" name="title_english" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Title Arabic</strong> </label>
                                            <input type="text" class="form-control" name="title_arabic" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label style="color: black"><strong> Video URL</strong> </label>
                                            <input type="text" class="form-control" name="video_url" placeholder=""
                                                required>
                                        </div>
                                        @if ($errors->has('video_url'))
                                            <span class="text-primary">{{ $errors->first('video_url') }}</span>
                                        @endif
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
            <div class="page-content-wrapper ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">All INFO</h4>
                                    <p class="text-muted m-b-30 font-14"></p>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Title English </th>
                                                <th>Title Arabic </th>

                                                <th>Video URL </th>
                                                {{-- <th>Edit</th> --}}

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($doctorvideo as $key => $doctorvideo)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $doctorvideo->title_english }}</td>
                                                    <td>{{ $doctorvideo->title_arabic }}</td>
                                                    <td>{{ $doctorvideo->video_url }}</td>
                                                    {{-- <td>
                                                <center> <button type="button" class="edit-btn btn btn-danger"
                                                        id="{{$slottime->id}}" time="{{$slottime->time}}"
                                                        data-toggle="modal" data-target="#edit-modal"><i
                                                            class="fa fa-pencil"></i></button></center>

                                            </td> --}}
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
                        <h4 class="modal-title" id="myModalLabel">Home Update</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form id="updateForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-1 col-form-label">Title</label>
                                <div class="col-sm-12 ">
                                    <select name="st" title=""
                                        class="form-control inline-field babel-ignore timezone-select-inactive" id="m">

                                    </select>
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
                var st = $(this).attr('st');
                // console.log(id);
                $('#st').val(st);
                $('#updateForm').attr('action', '{{ route('slottime.update', '') }}' + '/' + id);
            });
        });
    </script>
@endsection
