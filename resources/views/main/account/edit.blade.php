@extends('layouts.main.base')

@section('title') {{ $title_singular }} @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-12 mb-2">
        <h2 class="small-title">Account</h2>
    </div>
    <div class="col-md-12">
        <div class="card card-default">
            <form action="{{ url('account/update') }}" method="POST" class="ajax-form" class="form-horizontal">
                @csrf
                <div class="card-body">
                    @include("shared.alerts")
                    @include($directory . "partials.form")
                    <button type="submit" class="btn btn-theme submit-btn btn-sm">{{@$form_button}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
