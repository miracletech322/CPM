@extends('layouts.main.base')

@section('title') {{ $title_plurar }} @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')
<div class="row mt-5">

    <div class="col-md-12 mb-2">
        <div class="d-flex">
            <h2 class="small-title me-2"><a href="{{url('users')}}">Users</a></h2>
            <div class="dropdown-as-select me-3 small-title">
                <i class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" aria-expanded="false">
                    <span class="small-title"></span>
                </i>
            </div>
            <h2 class="small-title">Ledger</h2>
        </div>
    </div>

    <div class="col-md-12 mb-5">
        <div class="mb-n2 scroll-out">
            <div class="scroll-by-count" data-count="6">
                <div class="card mb-2 sh-15 sh-md-6">
                    <div class="card-body pt-0 pb-0 h-100">
                        <div class="row g-0 h-100 align-content-center">
                            <div class="col-10 col-md-3 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                <a class="body-link stretched-link"><b>User Details</b></a>
                            </div>
                            <div class="col-10 col-md-3 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                <span class="badge bg-outline-primary me-1" style="font-size: inherit;"><i class='fa fa-user'></i> {{$user->first_name." ".$user->last_name}}</span>
                            </div>
                            <div class="col-10 col-md-3 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                <span class="badge bg-outline-primary me-1" style="font-size: inherit;"><i class='fa fa-envelope'></i> {{$user->email}}</span>
                            </div>
                            <div class="col-10 col-md-3 d-flex align-items-center mb-3 mb-md-0 h-md-100">
                                <span class="badge bg-outline-primary me-1" style="font-size: inherit;"><i class="fa fa-phone"> {{$user->phone ? $user->phone : "Not Available"}}</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2 mb-5">
        <div class="card h-100 hover-scale-up cursor-pointer">
            <div class="card-body d-flex flex-column align-items-center">
                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                    <i data-acorn-icon="dollar" class="text-primary"></i>
                </div>
                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">Total Deposited</div>
                <div class="text-primary cta-4">$ {{$total_deposited}}</div>
            </div>
        </div>
    </div>

    <div class="col-md-2 mb-5">
        <div class="card h-100 hover-scale-up cursor-pointer">
            <div class="card-body d-flex flex-column align-items-center">
                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                    <i data-acorn-icon="dollar" class="text-primary"></i>
                </div>
                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">Total Withdrawn</div>
                <div class="text-primary cta-4">$ {{$total_withdrawn}}</div>
            </div>
        </div>
    </div>

    <div class="col-md-2 mb-5">
        <div class="card h-100 hover-scale-up cursor-pointer">
            <div class="card-body d-flex flex-column align-items-center">
                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                    <i data-acorn-icon="dollar" class="text-primary"></i>
                </div>
                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">Total Earned</div>
                <div class="text-primary cta-4">$ {{$total_earned}}</div>
            </div>
        </div>
    </div>

    <div class="col-md-2 mb-5">
        <div class="card h-100 hover-scale-up cursor-pointer">
            <div class="card-body d-flex flex-column align-items-center">
                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                    <i data-acorn-icon="dollar" class="text-primary"></i>
                </div>
                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">Total Earned by Referral</div>
                <div class="text-primary cta-4">$ {{$total_earned_referral}}</div>
            </div>
        </div>
    </div>

    <div class="col-md-2 mb-5">
        <div class="card h-100 hover-scale-up cursor-pointer">
            <div class="card-body d-flex flex-column align-items-center">
                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                    <i data-acorn-icon="dollar" class="text-primary"></i>
                </div>
                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">User Current Wallet</div>
                <div class="text-primary cta-4">$ {{$total_wallet}}</div>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-body">
                @include("shared.alerts")
                <table id="ledger_datatables" class="table table-striped my-4 w-100">
                    <thead class='theme-color'>
                        <tr>
                            <th>Wallet Amount</th> 
                            <th>Amount</th> 
                            <th>Hashing</th> {{-- (SHA, Ethash, Equihash) --}}
                            <th>Type</th> {{-- (Withdraw, Deposit, Referral, Daily_income_cron) --}}
                            <th>Transaction By</th> {{--  (Coinbase, Card, Bank, Referral) --}}
                            <th>Action performed by</th>
                            <th>Action Performed At</th>
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
