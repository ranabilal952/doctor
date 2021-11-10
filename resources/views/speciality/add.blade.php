@extends('layouts.app')
@section('title')
Specialtiy Data
@endsection
@section('content')
<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-200">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Enter  Information </h4>
                        <p class="text-muted m-b-30 font-14"></p>
                        <form class="" action="{{route('speciality_save')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><strong style="color: black">speciality Name English:</strong>(required)</label>
                                        <div>
                                            <input type="text" name="speciality_name_english" class="form-control" required
                                                placeholder="Enter a speciality name" />
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><strong style="color: red">إسم التخصص عربي:</strong>(required)</label>
                                        <div>
                                            <input type="text" name="speciality_name_arabic" class="form-control" required
                                                placeholder="Enter a speciality name" />
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
                                <h4 class="mt-0 header-title">All Home Data </h4>
                                <p class="text-muted m-b-30 font-14"></p>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Speciality Name English</th>
                                            <th>إسم التخصص عربي</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($speciality as $key=> $speciality)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$speciality->speciality_name_english}}</td>
                                            <td>{{$speciality->speciality_name_arabic}}</td>
                                        
                                            {{-- <td>
                                                <form action="{{route('home.destroy',$home->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-primary btn-xs"><i
                                                                class="fa fa-trash"></i></button>
                                                </form>
                                            </td> --}}
                                            {{-- <td>
                                                <button type="button" class="edit-btn btn btn-danger"
                                                        id="{{$home->id}}" title="{{$home->title}}"
                                                        image="{{$home->image}}" description="{{$home->description}}"
                                                        data-toggle="modal" data-target="#edit-modal"><i
                                                            class="fa fa-pencil"></i></button>

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
                                <input class="form-control" type="text" name="title" id="title">
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
                                <input class="form-control" type="text" name="description" id="description">
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
    $(document).ready(function(){
                $('body').on('click','.edit-btn',function(){
                    var id = $(this).attr('id');
                    var title = $(this).attr('title');
                    var Image = $(this).attr('Image');
                    var description = $(this).attr('description');
                    // console.log(id);
                    $('#title').val(title);
                    $('#Image').val(Image);
                    $('#description').val(description);
                    
                });
            });
</script>
@endsection