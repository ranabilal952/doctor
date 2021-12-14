@extends('layouts.app')
@section('title')
 Data
@endsection
@section('content')
<div class="page-content-wrapper ">
    <div class="container-fluid">

        <div class="page-content-wrapper ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">All  Data </h4>
                                <p class="text-muted m-b-30 font-14"></p>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Doctor Name</th>
                                            <th>Total Rating</th>
                                            <th>User Name</th>
                                            <th>Action</th>
                                            <th>Edit</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rating as $key=>  $rating)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$rating->doctor_id}}</td>
                                            <td>{{$rating->total_rating}}</td>
                                            <td>{{$rating->user_name}}</td>
                                            
                                            <td>
                                                @if($rating->status =='0') 
                                                <a href="{{url('block',$rating->id)}}" class="btn btn-danger btn-xs">Approve</a>

                                                @else
                                                <a href="{{url('unblock',$rating->id)}}" class="btn btn-success btn-xs">UnApprove</a>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="edit-btn btn btn-danger"
                                                        id="{{$rating->id}}" total_rating="{{$rating->total_rating}}"
                                                        user_name="{{$rating->user_name}}" description="{{$rating->description}}"
                                                        data-toggle="modal" data-target="#edit-modal"><i
                                                            class="fa fa-pencil"></i></button>

                                            </td>
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
                    <h4 class="modal-title" id="myModalLabel">Rating Update</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="updateForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label" >User Rating</label>
                            <div class="col-sm-12 ">
                                <select class="form-control" name="total_rating" id="total_rating" required>
                                    <option selected disabled>--Selected--</option>
                                    <option value="1" style="color: orange;font-size:30px">*</option>
                                    <option value="2" style="color: orange;font-size:30px">**</option>
                                    <option value="3" style="color: orange;font-size:30px">***</option>
                                    <option value="4" style="color: orange;font-size:30px">****</option>
                                    <option value="5" style="color: orange;font-size:30px">*****</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label">User Name</label>
                            <div class="col-sm-12 ">
                                <input class="form-control" type="text" name="user_name" id="user_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-12 col-form-label" ><strong>User Comment </label>
                            <div class="col-sm-12 ">
                                <textarea name="description" id="description" class="form-control" cols="150"
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
    $(document).ready(function(){
                $('body').on('click','.edit-btn',function(){
                    var id = $(this).attr('id');
                    var total_rating = $(this).attr('total_rating');
                    var user_name = $(this).attr('user_name');
                    var description = $(this).attr('description');
                    // console.log(id);
                    $('#total_rating').val(total_rating);
                    $('#user_name').val(user_name);
                    $('#description').val(description);
                    $('#updateForm').attr('action','{{url('update','')}}'+'/'+id);
                });
            });
</script>
@endsection