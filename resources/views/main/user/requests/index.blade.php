@extends('layouts.main.base')

@section('title') {{$title_plurar}} @endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-12 mb-2">
        <div class="d-flex">
            <h2 class="small-title me-2"> {{$title_plurar}}</h2>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="d-flex float-right">
            <a class="btn btn-sm btn-theme" href="{{url('user-drequests')}}">Deposit Requests</a>
            <a class="ml-2 btn btn-sm btn-theme" href="{{url('user-wrequests')}}">Withdrawl Requests</a>
        </div>
    </div>
    <div class="col-12">
        @include("shared.alerts")
    </div>

    <div class="col-12">
        <div class="mb-5">
            <div class="row g-2">

                <div class="col-md-6">
                    <div class="card h-100 hover-scale-up cursor-pointer">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                <i data-acorn-icon="list" class="text-primary"></i>
                            </div>
                            <div class="mb-1 d-flex align-items-center text-alternate text-smaller lh-1-25">Pending Deposit Requests</div>
                            <div class="text-primary cta-4">{{@$total_drequests}}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 hover-scale-up cursor-pointer">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                <i data-acorn-icon="dollar" class="text-primary"></i>
                            </div>
                            <div class="mb-1 d-flex align-items-center text-alternate text-smaller lh-1-25">Deposit Amount (Pending)</div>
                            <div class="text-primary cta-4">$ {{@$total_drequests_amount}}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 hover-scale-up cursor-pointer">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                <i data-acorn-icon="list" class="text-primary"></i>
                            </div>
                            <div class="mb-1 d-flex align-items-center text-alternate text-smaller lh-1-25">Pending Withdrawl Requests</div>
                            <div class="text-primary cta-4">{{@$total_wrequests}}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 hover-scale-up cursor-pointer">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                <i data-acorn-icon="dollar" class="text-primary"></i>
                            </div>
                            <div class="mb-1 d-flex align-items-center text-alternate text-smaller lh-1-25">Withdrawl Amount (Pending)</div>
                            <div class="text-primary cta-4">$ {{@$total_wrequests_amount}}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
