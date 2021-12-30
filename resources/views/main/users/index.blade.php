@extends('layouts.main.base')

@section('title') {{ $title_plurar }} @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')
<div class="row mt-5">
    <div class="col-md-12 mb-2">
        <h2 class="small-title">Users</h2>
    </div>
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-body">
                @include("shared.alerts")
                <table id="datatables" class="table table-striped my-4 w-100">
                    <thead class='theme-color'>
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
