@extends('front.layout')
@section('title')
    How Book Session
@endsection
@section('content')
    <div class="container ">

        <div class="row">
            <div class="col-lg-12">
                <div class="how-to-step-head">
                    <span class="how-to-step-num ng-binding" style="float: right;">أولا</span>
                    <span class="how-to-step-title title-secondary f-bold ng-binding"
                        style="color: #D6E0F5;float: right;">{{ $data->title }}</span>
                        <br>
                    <p class="ng-binding" style="float: right;">{{ $data->description }}</p>
                </div>
            </div>
            @if ($data->video_link != null)
                <div class="col-lg-12">
                    <div class="text-center">
                        <iframe width="544" height="326" src="{{ $data->video_link }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            @endif

            {{-- @if ($data->video_link2 != null)
                <div class="col-lg-12">
                    <div class="text-center">
                        <iframe width="544" height="326" src="{{ $data->video_link2 }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            @endif --}}

            {{-- @if ($data->video_link3 != null)
                <div class="col-lg-12">
                    <div class="text-center">
                        <iframe width="544" height="326" src="{{ $data->video_link3 }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            @endif --}}

        </div>


    </div>
@endsection
