@extends('layouts.main.base')

@section('title') {{ $title_singular }} | Details @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12 mb-2">
        <div class="d-flex">
            <h2 class="small-title me-2"><a href="{{url('users')}}">Users</a></h2>
            <div class="dropdown-as-select me-3 small-title">
                <i class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" aria-expanded="false">
                    <span class="small-title"></span>
                </i>
            </div>
            <h2 class="small-title">Details</h2>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-body">
                @include("shared.alerts")
                @include($directory . "partials.form")
                {{-- <a href="{{url("/users")."/".@$record->public_id."/edit"}}" class="btn btn-primary">Edit</a> --}}
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@include(@$directory."partials.js")
@endsection