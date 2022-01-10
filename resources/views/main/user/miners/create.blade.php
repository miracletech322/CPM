@extends('layouts.main.base')

@section('title') {{ $title_singular }} | Add @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')

<div class="row mt-5">

    <div class="col-md-12 mb-2">
        <div class="d-flex">
            <h2 class="small-title me-2"><a href="{{url('miners')}}">Miners</a></h2>
            <div class="dropdown-as-select me-3 small-title">
                <i class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" aria-expanded="false">
                    <span class="small-title"></span>
                </i>
            </div>
            <h2 class="small-title">Add</h2>
        </div>
    </div>
    <div class="col-md-12">
        <form action="{{ url('admins') }}" class="ajax-form-success" data-success="{{url('admins')}}" method="POST" files="true" enctype="multipart/form-data">
            @csrf
            <div class="mb-5 text-center">
                    @include("shared.alerts")
                    @include($directory . "partials.calculator_form")
                    <button type="submit" class="btn btn-theme submit-btn">{{@$form_button}}</button>
            </div>
        </form>
    </div>
</div>

@endsection


@section('js')
@include(@$directory."partials.js")
@include('shared.calculator_js')
@endsection
