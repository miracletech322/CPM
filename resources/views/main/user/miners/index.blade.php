@extends('layouts.main.base')

@section('title') {{__("Miners")}} @endsection

@section('content')
<div class="container-fluid px-0">

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="h2 mb-0 lh-sm">{{__("Miners")}}</h1>
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
                        <div class="col-6">
                            <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                <div class="card-body p-3 p-xl-3 p-xxl-4">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span class="small text-gray-600 d-block mb-1">{{__("Your balance")}}</span>
                                            <span class="h5 mb-0">${{@$user_balance}}</span>
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
                                            <span class="small text-gray-600 d-block mb-1">{{__("Number of miners")}}</span>
                                            <span class="h5 mb-0">{{count(@$miners)}} {{__("Miners")}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="position-relative">
                                                <i class="fa fa-shopping-cart fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @foreach ($total_power as $key => $power)
                            <div class="col-4">
                                <div class="card mb-4 rounded-12 shadow border border-gray-50">
                                    <div class="card-body p-3 p-xl-3 p-xxl-4">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <span class="small text-gray-600 d-block mb-1">{{__("POWER BOUGHT")}} ( {{$key}} 
                                                {{-- - TH/s --}}
                                                )
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
                        

                        <div class="col-xxl-12 mb-4">
                            <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
                                <div class="card-body h-100">
                                    <div class="row">
                                        <div class="col-md-12 text-center mb-3 text-alternate text-smaller lh-1-25">
                                            <div>${{$user_balance}} {{__("TO COINS")}}</div>
                                        </div>

                                        @foreach ($coin_data as $coin_item)
                                            <div class="col-md-4 text-center mb-2">
                                                <span class="badge badge-warning badge-sm" style="font-size: inherit;"> {{to_btc_format(convert_to_coin_earning($coin_item->price ,$user_balance))}} {{$coin_item->coin_display_name}}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xxl-12 mb-4">
                            <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
                                <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
                                    <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">{{__("Miners")}}</h5>
                                </div>
                                <div class="card-body px-0 p-md-4">
                                    <div class="bd-example">
                                        <div class="slim_scroll pb-5">
                                            <table class="table" style="width: 100% !important;">
                                                <thead>
                                                    <tr>
                                                        <th>{{__("Hashing")}}</th>
                                                        <th>{{__("Power Bought")}}</th>
                                                        <th>{{__("Cash Deposited")}}</th>
                                                        <th>{{__("Payment Method")}}</th>
                                                        <th>{{__("Created At")}}</th>
                                                    </tr>
                                                </thead>
                                                @if(count($miners) > 0)
                                                <tbody>
                                                    @foreach($miners as $key => $miner)
                                                    <tr>
                                                        <td>{{$miner->hashings ? ($miner->hashings->name ." (".$miner->coin->coin_display_name).")" : ""}}</td>
                                                        <td>{{$miner->energy_bought}} {{$miner->coin->unit}}</td>
                                                        <td>${{to_cash_format_small($miner->amount_deposit)}}</td>
                                                        <td>{{get_payent_method($miner->payment_method)}}</td>
                                                        <td>{{to_date($miner->created_at)}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                @else
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td colspan=5>{{__("No Record Found")}}</td>
                                                    </tr>
                                                </tbody>
                                                @endif
                                            </table>
                                        </div>
                                        <div class="text-center">
                                            <a href="{{url('miners/create')}}" class="btn btn-warning">{{__("Add Miner")}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xxl-12 mb-4">
                            <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
                                <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
                                    <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">{{__("Income for the last 7 days")}}</h5>
                                </div>
                                <div class="card-body px-0 p-md-4">
                                    <div class="bd-example">
                                        <div class="slim_scroll pb-5">
                                            <table class="table" style="width: 100% !important;">
                                                <thead>
                                                    <tr>
                                                        <th>{{__("Hashing")}}</th>
                                                        <th>{{__("Power")}}</th>
                                                        <th>{{__("Income")}}</th>
                                                        <th>{{__("Coin Value")}}</th>
                                                        <th>{{__("Date")}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(count($incomes) > 0)
                                                    @foreach($incomes as $key => $income)
                                                    <tr>
                                                        <td>{{$income->hashings ? ($income->hashings->name." (".($income->coin->coin_display_name).")") : ""}} {{$income->reference_ledger_id ? " Referral" : ""}}</td>
                                                        <td>{{$income->payments ? ($income->payments->energy_bought ." ". $miner->coin->unit) : ""}} {{$income->reference_ledger_id ? " Referral" : ""}}</td>
                                                        <td>$ {{to_cash_format_small($income->amount)}}</td>
                                                        <td>{{$income->coin_value}}</td>
                                                        <td>{{to_date($income->created_at)}}</td>
                                                    </tr>
                                                    @endforeach
                                                    @else
                                                    <tr class="text-center">
                                                        <td colspan=5>{{__("No Record Found")}}</td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center">
                                            <a href="{{url('miners-income')}}" class="btn btn btn-warning">{{__("Show All")}}</a>
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
