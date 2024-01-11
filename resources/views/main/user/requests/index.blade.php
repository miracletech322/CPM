@extends('layouts.main.base')

@section('title') {{@$title_plurar}} @endsection

@section('content')

<div class="container-fluid px-0">

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="h2 mb-0 lh-sm">{{__("User Requests")}}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="col-xxl-12 mb-4">
                <div class="pb-2 pt-3 mb-4 mb-xl-2">
                    @include("shared.alerts")
                    <div class="row">
                        <div class="col-12 mb-5">
                            <a class="btn btn-lg btn-warning" href="{{url('user-drequests')}}">{{__("Deposit Requests")}}</a>
                            <a class="btn btn-lg btn-warning" href="{{url('user-wrequests')}}">{{__("Withdrawal Requests")}}</a>
                        </div>

                        <div class="col-6">
                            <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                <div class="card-body p-3 p-xl-3 p-xxl-4">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span class="small text-gray-600 d-block mb-1">{{__("Pending Deposit Requests")}}</span>
                                            <span class="h5 mb-0">{{@$total_drequests}}</span>
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


                        <div class="col-6">
                            <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                <div class="card-body p-3 p-xl-3 p-xxl-4">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span class="small text-gray-600 d-block mb-1">{{__("Deposit Amount (Pending)")}}</span>
                                            <span class="h5 mb-0">$ {{@$total_drequests_amount}}</span>
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


                        <div class="col-6">
                            <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                <div class="card-body p-3 p-xl-3 p-xxl-4">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span class="small text-gray-600 d-block mb-1">{{__("Pending Withdrawal Requests")}}</span>
                                            <span class="h5 mb-0">{{@$total_wrequests}}</span>
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

                        <div class="col-6">
                            <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                <div class="card-body p-3 p-xl-3 p-xxl-4">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span class="small text-gray-600 d-block mb-1">{{__("Withdrawal Amount (Pending)")}}</span>
                                            <span class="h5 mb-0">$ {{@$total_wrequests_amount}}</span>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection