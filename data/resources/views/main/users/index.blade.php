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
            <div class="card-header">
                <a href="{{url('users/create')}}" class="btn btn-info float-right">Add User</a>
                {{ $title_plurar }} | List
            </div>
            <div class="card-body">
                @include("shared.alerts")
                <table id="datatables" class="table table-striped my-4 w-100">
                    <thead>
                        <tr>
                             <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>User Type</th>
                            <th>Added On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@include(@$directory."partials.js")
@endsection
