@extends('layouts.main.base')

@section('title') {{ $title_plurar }} @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')
<div class="row mt-5">
    <div class="col-md-12 mb-2">
        <h2 class="small-title">{{$title_plurar}}</h2>
    </div>

    <div class="col-md-12">
        @include("shared.alerts")
    </div>

    <div class="col-md-12 mb-2">
        <ul class="nav nav-tabs nav-justified" id="pills-tab" role="tablist">
            <li class="nav-item col-md-4" role="presentation">
                <button class="nav-link active" id="pills-deposit-tab" data-bs-toggle="pill" data-bs-target="#pills-deposit" type="button" role="tab" aria-controls="pills-deposit" aria-selected="true">Doposit</button>
            </li>
            <li class="nav-item col-md-4" role="presentation">
                <button class="nav-link" id="pills-withdrawl-tab" data-bs-toggle="pill" data-bs-target="#pills-withdrawl" type="button" role="tab" aria-controls="pills-withdrawl" aria-selected="false">Withdrawl</button>
            </li>
        </ul>
    </div>

    <div class="col-md-12">
        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane active" id="pills-deposit" role="tabpanel" aria-labelledby="pills-deposit-tab">
                <div class="card card-default card-margined">
                    <div class="card-body">
                        <table id="datatables-deposit" class="table table-striped my-4 w-100">
                            <thead class="theme-color">
                                <tr>
                                    <th>Transaction Date</th>
                                    <th>Transaction ID</th>
                                    <th>Payment Method</th>
                                    <th>Total Paid</th>
                                    <th>Hashing</th>
                                    <th>Power Bought</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-withdrawl" role="tabpanel" aria-labelledby="pills-withdrawl-tab">
                <div class="card card-default card-margined">
                    <div class="card-body">
                        <table id="datatables-withdrawl" class="table table-striped my-4 w-100">
                            <thead class="theme-color">
                                <tr>
                                    <th>Withdrawl Date</th>
                                    <th>Transaction ID</th>
                                    <th>Withdrawl Method</th>
                                    <th>Account Used</th>
                                    <th>Total Paid</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
@include(@$directory."partials.js")
@endsection
