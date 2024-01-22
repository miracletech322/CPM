@extends('layouts.main.base')

@section('title') {{ $title_singular }} @endsection

@section('content')
<div class="container-fluid px-0">

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="h2 mb-0 lh-sm">{{ $title_singular }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="col-xxl-12 mb-4">
                <div class="pb-2 mb-4 mb-xl-2">
                    <div class="row">
                        <div class="col-12">
                            @include("shared.alerts")
                        </div>

                        <div class="row">
                            <div class="mb-2 mb-md-3 mb-xl-4 pb-3">
                                <ul class="nav nav-tabs nav-tabs-md nav-tabs-line position-relative zIndex-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Stats</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                    <div class="card-body p-3 p-xl-3 p-xxl-4">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <span class="small text-gray-600 d-block mb-1">Users</span>
                                                <span class="h5 mb-0">{{@$total_users}}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="position-relative">
                                                    <i class="fa fa-users fa-3x"></i>
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
                                                <span class="small text-gray-600 d-block mb-1">Admins</span>
                                                <span class="h5 mb-0">{{@$total_admins}}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="position-relative">
                                                    <i class="fa fa-user fa-3x"></i>
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
                                                <span class="small text-gray-600 d-block mb-1">Deposit Requests</span>
                                                <span class="h5 mb-0">{{@$total_deposit_requests}}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="position-relative">
                                                    <i class="fa fa-list fa-3x"></i>
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
                                                <span class="small text-gray-600 d-block mb-1">Withdraw Requests</span>
                                                <span class="h5 mb-0">{{@$total_withdraw_requests}}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="position-relative">
                                                    <i class="fa fa-list fa-3x"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @foreach ($total_power as $key => $power)
                                <div class="col-md-3 col-sm-6">
                                    <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                        <div class="card-body p-3 p-xl-3 p-xxl-4">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <span class="small text-gray-600 d-block mb-1">Power Sold 
                                                        ({{$key}})
                                                        {{-- - TH/s --}}
                                                    </span>
                                                    <span class="h5 mb-0">{{to_power_format($power)}}</span>
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
                            @endforeach


                            <div class="col-md-3 col-sm-6">
                                <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                    <div class="card-body p-3 p-xl-3 p-xxl-4">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <span class="small text-gray-600 d-block mb-1">Total Earning</span>
                                                <span class="h5 mb-0">$ {{to_cash_format_small($total_earning)}}</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="position-relative">
                                                    <i class="fa fa-dollar fa-3x"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="mb-2 mb-md-3 mb-xl-4 pb-3">
                                <ul class="nav nav-tabs nav-tabs-md nav-tabs-line position-relative zIndex-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Current Prices</a>
                                    </li>
                                </ul>
                            </div>


                            @foreach ($pageData as $coin)
                                <div class="col-md-4">
                                    <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                        <div class="card-body p-3 p-xl-3 p-xxl-4">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <span class="small text-gray-600 d-block mb-1">{{@$coin->coin_display_name}} ({{@$coin->hashing->name}})</span>
                                                    <span class="h5 mb-0">$ {{to_cash_format(@$coin->price)}}</span>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="position-relative">
                                                        <i class="fa fa-dollar fa-3x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
