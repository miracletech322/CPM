@extends('layouts.main.base')

@section('title') {{ $title_plurar }} @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')
<div class="row mt-5">
    <div class="col-md-12 mb-2">
        <a href="{{url('crypto-wallet/create')}}" class="btn btn-theme float-right btn-sm">Add Crypto Wallet</a>
        <div class="d-flex">
            <h2 class="small-title me-2"><a href="{{url('withdraw')}}">Withdraw payment</a></h2>
            <div class="dropdown-as-select me-3 small-title">
                <i class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" aria-expanded="false">
                    <span class="small-title"></span>
                </i>
            </div>
            <h2 class="small-title">{{$title_plurar}}</h2>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-body">
                @include("shared.alerts")
                <table id="datatables" class="table table-striped my-4 w-100">
                    <thead class="theme-color">
                        <tr>
                            <th>Crypto Option</th>
                            <th>Wallet Address</th>
                            <th>Withdrawl Processing</th>
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
