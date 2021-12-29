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
            <div class="card-header">
                <a href="{{url('admins')}}" class="btn btn-info float-right">Go back</a>
                {{ $title_singular }} | Details
            </div>

            <div class="card-body">
                @include("shared.alerts")
                @include($directory . "partials.form")
                <a href="{{url("admins")."/".@$record->public_id."/edit"}}" class="btn btn-info">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@include(@$directory."partials.js")
@endsection