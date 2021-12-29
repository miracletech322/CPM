@extends('layouts.main.base')

@section('title') {{ $title_singular }} | Edit @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-12 mb-2">
        <div class="d-flex">
            <h2 class="small-title me-2"><a href="{{url('admins')}}">Admins</a></h2>
            <div class="dropdown-as-select me-3 small-title">
                <i class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" aria-expanded="false">
                    <span class="small-title"></span>
                </i>
            </div>
            <h2 class="small-title">Edit</h2>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-default">
            <form action="{{ url('admins'."/".@$record->public_id) }}" method="POST" class="ajax-form" class="form-horizontal">
                @csrf
                @method('PUT')

                <div class="card-body">
                    @include("shared.alerts")
                    @include($directory . "partials.form")
                    <button type="submit" class="btn btn-info submit-btn">{{@$form_button}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('js')
@include(@$directory."partials.js")
@endsection
