@extends('layouts.main.base')

@section('title') {{ $title_singular }} @endsection

@section('content')
<div class="container-fluid px-0">
    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <span class="text-uppercase tiny text-gray-600 Montserrat-font font-weight-semibold"><a href="{{url('admins')}}">Admins</a></span>
                    <h1 class="h2 mb-0 lh-sm">{{$title_singular}} Details</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-gray-200 after-header">
        <div class="container-fluid px-0 py-lg-3">
            <div class="col-xxl-12 mb-4">

                <div class="">
                    @include("shared.alerts")
                </div>

                <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
                    <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
                        <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold"> {{$title_singular}} Details</h5>
                    </div>
                    <div class="card-body px-0 p-md-4">
                        <div class="bd-example px-3">
                            @include($directory."partials.form")
                            <a href="{{url("admins")."/".@$record->public_id."/edit"}}" class="btn btn-warning btn-lg">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@include(@$directory."partials.js")
@endsection