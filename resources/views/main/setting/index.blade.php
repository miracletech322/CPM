@extends('layouts.main.base')

@section('title') {{ $title_plurar }} @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')
<div class="row mt-5">
    <div class="col-md-12 mb-2">
        <h2 class="small-title">Settings</h2>
    </div>
    <div class="col-md-12">
        <div class="card card-default">
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
