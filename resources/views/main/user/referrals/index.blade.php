@extends('layouts.main.base')

@section('title') Referral Program @endsection

@section('content')

<div class="row mt-5">
    <div class="col-md-12 mb-2">
        <div class="d-flex">
            <h2 class="small-title me-2">Referral Program</h2>
        </div>
    </div>
    <div class="col-12">
        @include("shared.alerts")
    </div>
</div>

<div class="row">
    <div class="col-12 mb-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <label class="float-left">Get 4% of each deposit made by people you refer</label>
                        <a onclick="copy_url('{{url('register?referral=').Auth::user()->public_id}}')" class="btn btn-theme btn-sm float-right">Copy Referral Link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12 mb-2">
        <div class="d-flex">
            <h2 class="small-title me-2">Referral Stats</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-5">
                <div class="row g-2">

                    <div class="col-md-6">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="list" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-smaller lh-1-25">Referrals</div>
                                <div class="text-primary cta-4">{{@$refered_by_user}} User(s)</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="dollar" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-smaller lh-1-25">Income by Referrals</div>
                                <div class="text-primary cta-4">$ {{@$earned_via_referral}}</div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
