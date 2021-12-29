@extends('layouts.main.base')

@section('title') {{ $title_singular }} @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')
<div class="content-heading">{{ $title_singular }}</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">{{ $title_singular }}</div>
                <form action="{{ url('profile/update') }}" method="POST" class="ajax-form" class="form-horizontal">
                @csrf
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
@endsection
