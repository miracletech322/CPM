@extends('layouts.main.base')

@section('title') {{$title_singular}} @endsection


@section('content')
<div class="container">
    <div class="page-title-container">
        <div class="row">
            <div class="col-12 col-md-7">
                <a class="muted-link pb-2 d-inline-block hidden" href="#">
                    <span class="align-middle lh-1 text-small">&nbsp;</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">Welcome, {{Auth()->user()->first_name}}!</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @include("shared.alerts")
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="mb-5">
                <div class="row g-2">
                    <div class="col-md-6 col-6">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="dollar" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-smaller lh-1-25">Your balance</div>
                                <div class="text-primary cta-4">$ {{$user_balance}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="cart" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-smaller lh-1-25">Number of miners</div>
                                <div class="text-primary cta-4">{{count(@$miners)}} Miners</div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4 col-6">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="check-circle" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-smaller lh-1-25">POWER BOUGHT (BTC - TH/s)</div>
                                <div class="text-primary cta-4">{{to_power_format($total_power["total_power_th"])}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="check-circle" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-smaller lh-1-25">POWER BOUGHT (ETH - MH/s)</div>
                                <div class="text-primary cta-4">{{to_power_format($total_power["total_power_mh"])}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="check-circle" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-smaller lh-1-25">POWER BOUGHT (ZEC - KH/s)</div>
                                <div class="text-primary cta-4">{{to_power_format($total_power["total_power_kh"])}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-n2 scroll-out">
                            <div class="scroll-by-count" data-count="6">
                                <div class="card mb-2">
                                    <div class="card-body h-100">
                                        <div class="row">
                                            <div class="col-md-12 text-center mb-3 text-alternate text-smaller lh-1-25">
                                                <div>${{$user_balance}} TO COINS</div>
                                            </div>
                                            <div class="col-md-4 text-center mb-2">
                                                <span class="badge bg-outline-primary" style="font-size: inherit;"> {{to_btc_format(convert_to_coin_earning($coin_values["1"] ,$user_balance))}} BTC</span>
                                            </div>
                                            <div class="col-md-4 text-center mb-2">
                                                <span class="badge bg-outline-primary" style="font-size: inherit;"> {{to_btc_format(convert_to_coin_earning($coin_values["2"] ,$user_balance))}} ETH</span>
                                            </div>
                                            <div class="col-md-4 text-center mb-2">
                                                <span class="badge bg-outline-primary" style="font-size: inherit;"> {{to_btc_format(convert_to_coin_earning($coin_values["3"] ,$user_balance))}} ZEC</i></span>
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



    <div class="row mb-5">
        <div class="col-md-12">

            <div class="d-flex">
                <h2 class="small-title">Your Miners</h2>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="slim_scroll mb-3" style="max-height: 500px !important;">
                        <table id="datatables" class="table table-striped my-4 w-100">
                            <thead class="theme-color">
                                <tr>
                                    <th>Hashing</th>
                                    <th>Power Bought</th>
                                    <th>Cash Deposited</th>
                                    <th>Payment Method</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            @if(count($miners) > 0)
                            <tbody>
                                @foreach($miners as $key => $miner)
                                <tr>
                                    <th>{{$miner->hashings ? ($miner->hashings->name ." (".get_hash_name($miner->hashings->id).")") : ""}}</th>
                                    <th>{{$miner->energy_bought}} {{$energy[$miner->hashing_id - 1]}}</th>
                                    <th>${{to_cash_format_small($miner->amount_deposit)}}</th>
                                    <th>{{get_payent_method($miner->payment_method)}}</th>
                                    <th>{{to_date($miner->created_at)}}</th>
                                </tr>
                                @endforeach
                                </thead>
                                @endif
                        </table>
                    </div>

                    <div class="text-center">

                        @if(count($miners) == 0)
                        <div class="cta-3 "></div>
                        <div class="mb-3 cta-3 text-primary">You have no miners</div>
                        @endif
                        <a href="{{url('miners/create')}}" class="btn btn-theme submit-btn">Add Miner</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-5">
        <div class="col-md-12">

            <div class="d-flex">
                <h2 class="small-title">Income for the last 7 days</h2>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="slim_scroll mb-3" style="max-height: 500px !important;">
                        <table id="datatables" class="table table-striped my-4 w-100">
                            <thead class="theme-color">
                                <tr>
                                    <th>Hashing</th>
                                    <th>Power</th>
                                    <th>Income</th>
                                    <th>Coin Value</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            @if(count($incomes) > 0)
                            <tbody>
                                @foreach($incomes as $key => $income)
                                <tr>
                                    <th>{{$income->hashings ? ($income->hashings->name." (".get_hash_name($income->hashings->id).")") : ""}} {{$income->reference_ledger_id ? " Referral" : ""}}</th>
                                    <th>{{$income->payments ? ($income->payments->energy_bought ." ". $energy[$income->hashing_id - 1]) : ""}} {{$income->reference_ledger_id ? " Referral" : ""}}</th>
                                    <th>$ {{to_cash_format_small($income->amount)}}</th>
                                    <th>{{$income->coin_value}}</th>
                                    <th>{{to_date($income->created_at)}}</th>
                                </tr>
                                @endforeach
                                </thead>
                                @endif
                        </table>
                    </div>

                    <div class="text-center">

                        @if(count($incomes) == 0)
                        <div class="cta-3 "></div>
                        <div class="mb-3 cta-3 text-primary">No Record Found</div>
                        @endif
                        <a href="{{url('miners-income')}}" class="btn btn-theme submit-btn">Show More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
