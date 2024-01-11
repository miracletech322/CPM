@extends('layouts.main.base')
@section('title') {{$title_plurar}} @endsection
@section('content')
<div class="container-fluid px-0">

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="h2 mb-0 lh-sm">{{$title_plurar}}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="px-3 px-xxl-5 py-3 border-gray-200 after-header">
        <div class="container-fluid px-0 py-3">
            <div class="col-xxl-12 mb-4">
                <div class="row">

                    <div class="col-12">
                        @include("shared.alerts")
                    </div>

                    <div class="col-12">
                        <div class="pb-3">
                            <ul class="nav nav-tabs nav-tabs-md nav-tabs-line position-relative zIndex-0" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-deposit-tab" data-bs-toggle="pill" data-bs-target="#pills-deposit" type="button" role="tab" aria-controls="pills-deposit" aria-selected="false">{{__("Deposit")}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-withdrawl-tab" data-bs-toggle="pill" data-bs-target="#pills-withdrawl" type="button" role="tab" aria-controls="pills-withdrawl" aria-selected="false">{{__("Withdrawal")}}</a>
                                </li>
                            </ul>
                        </div>


                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-deposit" role="tabpanel" aria-labelledby="pills-deposit-tab">
                                <div class="py-3 py-lg-4 border-gray-200 after-header">
                                    <div class="container-fluid px-0">
                                        <div class="col-xxl-12 mb-4">
                                            <div class="pb-2 pt-3 mb-4 mb-xl-5">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="input-group input-group-xl bg-white border border-gray-300 rounded px-3 me-2 me-xl-4">
                                                            <button type="button" class="border-0 bg-transparent p-1"><img src="{{asset('temp/assets/svg/icons/search@14.svg')}}" alt="Search"></button>
                                                            <input class="form-control border-0 search_box_deposit" placeholder="{{__('Search records...')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-12 mb-4">
                                                <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
                                                    <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
                                                        <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">{{__("Income")}}</h5>
                                                    </div>
                                                    <div class="card-body px-0 p-md-4">
                                                        <div class="bd-example">
                                                            <div class="slim_scroll pb-5">
                                                                <table class="table" id="datatables-deposit" style="width:100% !important;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>{{__("Transaction Date")}}</th>
                                                                            <th>{{__("Transaction ID")}}</th>
                                                                            <th>{{__("Payment Method")}}</th>
                                                                            <th>{{__("Total Paid")}}</th>
                                                                            <th>{{__("Hashing")}}</th>
                                                                            <th>{{__("Power Bought")}}</th>
                                                                            <th>{{__("Action")}}</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-withdrawl" role="tabpanel" aria-labelledby="pills-withdrawl-tab">
                                <div class="py-3 py-lg-4 border-gray-200 after-header">
                                    <div class="container-fluid px-0">
                                        <div class="col-xxl-12 mb-4">
                                            <div class="pb-2 pt-3 mb-4 mb-xl-5">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <div class="input-group input-group-xl bg-white border border-gray-300 rounded px-3 me-2 me-xl-4">
                                                            <button type="button" class="border-0 bg-transparent p-1"><img src="{{asset('temp/assets/svg/icons/search@14.svg')}}" alt="Search"></button>
                                                            <input class="form-control border-0 search_box_withdrawl" placeholder="{{__('Search records...')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-12 mb-4">
                                                <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
                                                    <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
                                                        <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">{{__("Income")}}</h5>
                                                    </div>
                                                    <div class="card-body px-0 p-md-4">
                                                        <div class="bd-example">
                                                            <div class="slim_scroll pb-5">
                                                                <table class="table" id="datatables-withdrawl" style="width:100% !important;">
                                                                    <thead>
                                                                        <th>Withdrawal Date</th>
                                                                        <th>Transaction ID</th>
                                                                        <th>Withdrawal Method</th>
                                                                        <th>Total Withdraw</th>
                                                                        <th>Action</th>
                                                                    </thead>
                                                                    <tbody>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
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
