@extends('layouts.main.base')

@section('title') {{ $title_singular }} @endsection

@section('content')
<div class="container-fluid px-0">
    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <span class="text-uppercase tiny text-gray-600 Montserrat-font font-weight-semibold"><a href="{{url('hashing-settings')}}">Hashing Settings</a></span>
                    <h1 class="h2 mb-0 lh-sm">Edit {{$title_singular}}</h1>
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
                        <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">Edit {{$title_singular}}</h5>
                    </div>
                    <div class="card-body px-0 p-md-4">
                        <div class="bd-example">
                            <form action="{{ url('hashing-settings'."/".@$record->id) }}" method="POST" class="ajax-form px-3" class="form-horizontal">
                                @csrf()
                                @method('PUT')
                                @include($directory."partials.form")
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-warning submit-btn btn-lg">{{@$form_button}}</button>
                                </div>
                            </form>
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