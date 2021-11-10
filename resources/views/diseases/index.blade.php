@extends('layouts.app')
@section('title')
Diseases
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
                        <form class="" action="{{route('diseases_save')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><strong>Diseases Name English:</strong>(required)</label>
                                        <div>
                                            <input type="text" name="diseases_name_english" class="form-control" required
                                                placeholder="Enter a Diseases name" />
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label><strong style="color: red">اسم المرض عربي:</strong>(required)</label>
                                        <div>
                                            <input type="text" name="diseases_name_arabic" class="form-control" required
                                                placeholder="Enter a Diseases name" />
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
                                <h4 class="mt-0 header-title">All  Data </h4>
                                <p class="text-muted m-b-30 font-14"></p>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Diseases Name English</th>
                                            <th>اسم المرض عربي</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($diseases as $key=> $diseases)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$diseases->diseases_name_english}}</td>
                                            <td>{{$diseases->diseases_name_arabic}}</td>
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
