@extends('layouts.app')
@section('title')
All Doctors / Users
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
                                <h4 class="mt-0 header-title">All Users   </h4>
                                <p class="text-muted m-b-30 font-14"></p>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th> Role</th>
                                            <th>Phone</th>
                                            <th>Created Date</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $key=> $user)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{($user->created_at)->toDateString()}}</td>
                                            {{-- <td><img src="{{asset($user->image)}}" width="50" height="50" />
                                                <style>
                                                    img {
                                                        border: ;
                                                    }
                                                </style>
                                            </td> --}}
                                            {{-- <td>
                                                @if($user->assment_status =='0') 
                                                <a href="{{route('approve_test',$user->id)}}" class="btn btn-danger btn-xs">Approve</a>

                                                @else
                                                <a href="{{route('unapprove_test',$user->id)}}" class="btn btn-success btn-xs">UnApprove</a>
                                                @endif
                                            </td> --}}
                                            
                                            <td>

                                                {{-- <a href="{{route('user.show',$user->id)}}" class="btn btn-success "><i class="fa fa-eye"></i></a>  --}}
                                                <a onclick="return confirm('Do you want to delete this record ?')" href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a> 
                                               
                   

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
</div>
@endsection







