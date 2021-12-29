@extends('layouts.main.base')

@section('title') {{ $title_plurar }} @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')
<div class="content-heading">{{ $title_plurar }}</div>
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">{{ $title_plurar }}</div>
            <form action="{{ url('settings'."/".@$record->id) }}" method="POST" class="ajax-form" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="card-body">
                    @include("shared.alerts")
                    @include($directory . "partials.form")
                    <button type="submit" class="btn btn-info submit-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
