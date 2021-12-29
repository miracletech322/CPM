@extends('layouts.main.base')

@section('title') {{ $title_singular }} @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <a href="{{url('users')}}" class="btn btn-info float-right">Go back</a>
                {{ $title_singular }} | Edit
            </div>

            <form action="{{ url('/users'."/".@$record->public_id) }}" method="POST" class="ajax-form" class="form-horizontal">
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
