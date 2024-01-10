@extends('layouts.main.base')

@section('title') User Ledger @endsection

@section('content')

<div class="container-fluid px-0">
    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <span class="text-uppercase tiny text-gray-600 Montserrat-font font-weight-semibold"><a href="{{url('users')}}">Users</a></span>
                    <h1 class="h2 mb-0 lh-sm">User Ledger</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="px-3 px-xxl-5 border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="col-xxl-12 mb-4 pt-2">
                <div class="pb-2 pt-3 mb-4 mb-xl-2">
                    <div class="row">
                        <div class="col-12">
                            @include("shared.alerts")
                        </div>


                        <div class="col-12">
                            <div class="mb-2 mb-md-3 mb-xl-4 pb-3">
                                <ul class="nav nav-tabs nav-tabs-md nav-tabs-line position-relative zIndex-0" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-bank-tab" data-bs-toggle="pill" data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank" aria-selected="false">Ledger Stats</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-coin-tab" data-bs-toggle="pill" data-bs-target="#pills-coin" type="button" role="tab" aria-controls="pills-coin" aria-selected="false">Ledger Records</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade show active" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <div class="mb-n2 scroll-out">
                                            <div class="scroll-by-count" data-count="6">
                                                <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3">
                                                    <div class="card-body px-0 p-md-4">
                                                        <div class="row g-0 h-100 align-content-center">
                                                            <div class="col-10 col-md-3 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                                                <a class="text-black"><b>User Details</b></a>
                                                            </div>
                                                            <div class="col-10 col-md-3 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                                                <span class="badge badge-warning badge-sm me-1" style="font-size: inherit;"> <i class='fa fa-user mx-1'></i> {{$user->first_name." ".$user->last_name}}</span>
                                                            </div>
                                                            <div class="col-10 col-md-3 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                                                <span class="badge badge-warning badge-sm me-1" style="font-size: inherit;"><i class='fa fa-envelope mx-1'></i> {{$user->email}}</span>
                                                            </div>
                                                            <div class="col-10 col-md-3 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                                                <span class="badge badge-warning badge-sm me-1" style="font-size: inherit;"><i class="fa fa-phone mx-1"></i> {{$user->phone ? $user->phone : "Not Available"}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                            <div class="card-body p-3 p-xl-3 p-xxl-4">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <span class="small text-gray-600 d-block mb-1">Total Deposited</span>
                                                        <span class="h5 mb-0">$ {{$total_deposited}}</span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="position-relative">
                                                            <i class="fa fa-check-circle-o fa-3x"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-6">
                                        <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                            <div class="card-body p-3 p-xl-3 p-xxl-4">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <span class="small text-gray-600 d-block mb-1">Total Withdrawn</span>
                                                        <span class="h5 mb-0">$ {{$total_withdrawn}}</span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="position-relative">
                                                            <i class="fa fa-check-circle-o fa-3x"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-6">
                                        <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                            <div class="card-body p-3 p-xl-3 p-xxl-4">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <span class="small text-gray-600 d-block mb-1">Total Earned</span>
                                                        <span class="h5 mb-0">$ {{$total_earned}}</span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="position-relative">
                                                            <i class="fa fa-check-circle-o fa-3x"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-6">
                                        <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                            <div class="card-body p-3 p-xl-3 p-xxl-4">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <span class="small text-gray-600 d-block mb-1">Total Earned by Referral</span>
                                                        <span class="h5 mb-0">$ {{$total_earned_referral}}</span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="position-relative">
                                                            <i class="fa fa-check-circle-o fa-3x"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-3 col-sm-6">
                                        <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                            <div class="card-body p-3 p-xl-3 p-xxl-4">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <span class="small text-gray-600 d-block mb-1">User Current Wallet</span>
                                                        <span class="h5 mb-0">$ {{$total_wallet}}</span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="position-relative">
                                                            <i class="fa fa-check-circle-o fa-3x"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade show" id="pills-coin" role="tabpanel" aria-labelledby="pills-coin-tab">
                                <div class="row">
                                    <div class="col-xxl-12 mb-4">
                                        <div class="pb-2 mb-4 mb-xl-5">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="input-group input-group-xl bg-white border border-gray-300 rounded px-3 me-2 me-xl-4">
                                                        <button type="button" class="border-0 bg-transparent p-1"><img src="{{asset('temp/assets/svg/icons/search@14.svg')}}" alt="Search"></button>
                                                        <input class="form-control border-0 search_box" placeholder="Search records...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-12 mb-4">
                                            <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
                                                <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
                                                    <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">User Ledger</h5>
                                                </div>
                                                <div class="card-body px-0 p-md-4">
                                                    <div class="bd-example">
                                                        <div class="slim_scroll pb-5">
                                                            <table id="ledger_datatables" class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Wallet Amount</th>
                                                                        <th>Amount</th>
                                                                        <th>Hashing</th> {{-- (SHA, Ethash, KHeavyHash) --}}
                                                                        <th>Type</th> {{-- (Withdraw, Deposit, Referral, Daily_income_cron) --}}
                                                                        <th>Transaction By / To</th> {{-- (Coinbase, Card, Bank, Referral) --}}
                                                                        <th>Transaction Code</th>
                                                                        <th>Action performed by</th>
                                                                        <th>Action Performed At</th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@include($directory.'partials.js')
@endsection
