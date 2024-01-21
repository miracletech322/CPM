@extends('layouts.main.base')
@section('title') {{__("Withdraw")}} @endsection
@section('content')
<div class="container-fluid px-0">

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="h2 mb-0 lh-sm">{{__("Withdraw")}}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="col-xxl-12 mb-4">
                <div class="pb-2 pt-3 mb-4 mb-xl-2">
                    @include("shared.alerts")
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card mb-4 rounded-12 shadow border border-gray-50">
                            <div class="card-body p-3 p-xl-3 p-xxl-4">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span class="small text-gray-600 d-block mb-1">{{__("Your balance")}}</span>
                                        <span class="h5 mb-0">$ {{to_cash_format_small($user_balance)}}</span>
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
                                        <span class="small text-gray-600 d-block mb-1">{{__("Withdraw Requested")}}</span>
                                        <span class="h5 mb-0">$ {{to_cash_format(get_user_withdraw())}}</span>
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

                    <div class="col-xxl-12 mb-4">
                        <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
                            <div class="card-body h-100">
                                <div class="row">
                                    <div class="col-md-12 text-center mb-3 text-alternate text-smaller lh-1-25">
                                        <div>${{$user_balance}} {{__("TO COINS")}}</div>
                                    </div>
                                    @foreach ($coin_data as $key => $coin_item)
                                        <div class="col-md-4 text-center mb-2">
                                            <span class="badge badge-warning badge-sm" style="font-size: inherit;"> {{to_btc_format(convert_to_coin_earning($coin_item->price ,$user_balance))}} {{$coin_item->coin_display_name}}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <form action="{{ url('process-withdraw') }}" class="ajax-form-success px-3" data-success="{{url('withdraw')}}" method="POST" files="true" enctype="multipart/form-data">
                            @csrf
                            @include($directory . "partials.withdraw_form")

                            <div class="mb-2 mb-md-3 mb-xl-4 pb-3">
                                <ul class="nav nav-tabs nav-tabs-md nav-tabs-line position-relative zIndex-0" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-bank-tab" onclick="set_payment_method(2)" data-bs-toggle="pill" data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank" aria-selected="false">{{__("Bank Transfer")}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-coin-tab" onclick="set_payment_method(3)" data-bs-toggle="pill" data-bs-target="#pills-coin" type="button" role="tab" aria-controls="pills-coin" aria-selected="false">{{__("Crypto")}}</a>
                                    </li>
                                </ul>
                            </div>


                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade show active" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
                                    <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
                                        <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
                                            <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">{{__("Please select your bank account below and click withdraw.")}}</h5>
                                        </div>

                                        <div class="card-body">

                                            <div class="row form-group mb-3 px-3 px-md-4">
                                                <div class="col-md-12 mb-3">
                                                    <a class="btn btn-warning btn-lg" href="{{url('bank-account')}}">{{__("Manage Bank Accounts")}}</a>
                                                </div>
                                            </div>

                                            <div class="row px-3 px-md-4">

                                                <div class="col-md-6 pb-3 mb-md-4">
                                                    <label class="form-label form-label-lg">{{__("Bank Account")}} <i class="text-danger">*</i></label>
                                                    <select name="account" id="account" onchange="option_changed($(this).val(), 'bank_details_row', '{{url('get-bank-details')}}')" class="form-control form-control-xl">
                                                        <option value="">{{__("Select Bank Account")}}</option>
                                                        @foreach($banks as $key => $bank)
                                                        <option value="{{$bank->id}}">{{$bank->account_number ." - ". $bank->bank_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($banks->count() == 0)
                                                    <label class="form-label form-label-lg"><small>{{__("No bank accounts available")}}. <a class='text-info' href="{{url('bank-account/create')}}">{{__("Add New")}}</a></small></label>
                                                    @endif
                                                </div>

                                                <div class="col-md-6 pb-3 mb-md-4">
                                                    <label class="form-label form-label-lg">{{__("Withdraw Amount")}}<i class="text-danger">*</i></label>
                                                    <input class="form-control form-control-xl" name="withdraw_amount_bank" placeholder="{{__("Enter Withdraw Amount")}}" type="text">
                                                </div>

                                                <div class="col-md-12 mb-3 float-left bank_details_row"></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-coin" role="tabpanel" aria-labelledby="pills-coin-tab">
                                    <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
                                        <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
                                            <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">{{__("Please select your crypto wallet below and click withdraw")}}.</h5>
                                        </div>
                                        
                                        <div class="card-body">

                                            <div class="row form-group mb-3 px-md-4">
                                                <div class="col-md-12 mb-3">
                                                    <a class="btn btn-warning btn-lg" href="{{url('crypto-wallet')}}">{{__("Manage Crypto Wallets")}}</a>
                                                </div>
                                            </div>

                                            <div class="row form-group mb-3 mt-3 px-md-4">

                                                <div class="col-md-6 pb-3 mb-md-4">
                                                    <label class="form-label form-label-lg">{{__("Crypto Wallet")}} <i class="text-danger">*</i></label>
                                                    <select name="wallet" id="wallet" onchange="option_changed($(this).val(), 'crypto_details_row', '{{url('get-crypto-details')}}')" class="form-control form-control-xl">
                                                        <option value="">{{__("Select Crypto Wallet")}}</option>
                                                        @foreach($cryptos as $key => $crypto)
                                                        <option value="{{$crypto->id}}">{{$crypto->crypto_options->name ." - ". $crypto->wallet_address}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($cryptos->count() == 0)
                                                    <label class="form-label form-label-lg"><small>{{__("No crypto wallets available")}}. <a class='text-info' href="{{url('crypto-wallet/create')}}">{{__("Add New")}}</a></small></label>
                                                    @endif
                                                </div>

                                                <div class="col-md-6 pb-3 mb-md-4">
                                                    <label class="form-label form-label-lg">{{__("Withdraw Amount")}} <i class="text-danger">*</i></label>
                                                    <input class="form-control form-control-xl" name="withdraw_amount_crypto" placeholder="{{__("Enter Withdraw Amount")}}" type="text">
                                                </div>

                                                <div class="col-md-12 mb-3 float-left crypto_details_row"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='text-center'>
                                <input type="hidden" name="payment_method" id="payment_method" value="1" />
                                <button type="submit" class="btn btn-warning submit-btn btn-lg">{{@$form_button}}</button>
                            </div>
                        </form>
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
