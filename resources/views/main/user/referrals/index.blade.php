@extends('layouts.main.base')

@section('title') {{__("Referral Program")}} @endsection

@section('content')

<div class="container-fluid px-0">

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="h2 mb-0 lh-sm">{{__("Referral Program")}}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="col-xxl-12 mb-4">
                <div class="pb-2 pt-3 mb-4 mb-xl-2">
                    <div class="row">
                        <div class="col-12">
                            @include("shared.alerts")
                        </div>
                        <div class="col-12">
                            <h5 class="float-left" style="cursor: default;">{{__("Get 4% of each deposit made by people you refer")}}</h5>
                        </div>


                        <div class="col-12">
                            <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                <div class="card-body p-3 p-xl-3 p-xxl-4 row">
                                    <div class='col-md-8'>
                                        <input class='form-control form-control-lg' value='{{url('register?referral=').Auth::user()->public_id}}' disabled>
                                    </div>
                                    <div class='col-md-4'>
                                        <a onclick="copy_url('{{url('register?referral=').Auth::user()->public_id}}')" class="btn btn-warning btn-lg float-right">{{__("Copy Referral Link")}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6 col-12">
                            <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                <div class="card-body p-3 p-xl-3 p-xxl-4">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span class="small text-gray-600 d-block mb-1">{{__("Referrals")}}</span>
                                            <span class="h5 mb-0">{{@$refered_by_user}} {{__("User(s)")}}</span>
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


                        <div class="col-md-6 col-12">
                            <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                <div class="card-body p-3 p-xl-3 p-xxl-4">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span class="small text-gray-600 d-block mb-1">{{__("Income by Referrals")}}</span>
                                            <span class="h5 mb-0">$ {{@$earned_via_referral}}</span>
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