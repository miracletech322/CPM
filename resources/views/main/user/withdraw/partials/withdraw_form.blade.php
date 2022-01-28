<section class="calculate-earnings">
    <div class="row">
        <div class="col-md-12">
            @include("shared.alerts")
        </div>

        <div class="col-md-6">
            <div class="card h-100 hover-scale-up cursor-pointer">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                        <i data-acorn-icon="dollar" class="text-primary"></i>
                    </div>
                    <div class="mb-1 d-flex align-items-center text-alternate text-large lh-1-25">Your balance</div>
                    <div class="text-primary cta-4">$ {{to_cash_format_small(get_user_balance() - get_user_withdraw())}}</div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100 hover-scale-up cursor-pointer">
                <div class="card-body d-flex flex-column align-items-center">
                    <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                        <i data-acorn-icon="list" class="text-primary"></i>
                    </div>
                    <div class="mb-1 d-flex align-items-center text-alternate text-large lh-1-25">Withdraw Requested</div>
                    <div class="text-primary cta-4">$ {{to_cash_format(get_user_withdraw())}}</div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-5 mt-2">
            <div class="mb-n2 scroll-out">
                <div class="scroll-by-count" data-count="6">
                    <div class="card mb-2">
                        <div class="card-body h-100">
                            <div class="row">
                                <div class="col-md-12 text-center mb-3 text-alternate text-large lh-1-25">
                                    <div>${{$user_balance}} TO COINS</div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <span class="badge bg-outline-primary" style="font-size: inherit;"> {{to_btc_format(convert_to_coin_earning($coin_values["1"] ,$user_balance))}} BTC</span>
                                </div>
                                <div class="col-md-4 text-center">
                                    <span class="badge bg-outline-primary" style="font-size: inherit;"> {{to_btc_format(convert_to_coin_earning($coin_values["2"] ,$user_balance))}} ETH</span>
                                </div>
                                <div class="col-md-4 text-center">
                                    <span class="badge bg-outline-primary" style="font-size: inherit;"> {{to_btc_format(convert_to_coin_earning($coin_values["3"] ,$user_balance))}} ZEC</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 p-4">
            <ul class="nav nav-tabs nav-justified" id="pills-tab" role="tablist">

                <li class="nav-item col-md-4" role="presentation">
                    <button class="nav-link active" id="pills-bank-tab" onclick="set_payment_method(2)" data-bs-toggle="pill" data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank" aria-selected="false">Bank Transfer</button>
                </li>
                <li class="nav-item col-md-4" role="presentation">
                    <button class="nav-link" id="pills-coin-tab" onclick="set_payment_method(3)" data-bs-toggle="pill" data-bs-target="#pills-coin" type="button" role="tab" aria-controls="pills-coin" aria-selected="false">Crypto</button>
                </li>
            </ul>



            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
                    <div class="card card-default card-margined">
                        <div class="card-body">

                            <div class="row form-group mb-3 mt-3">
                                <div class="col-md-12 mb-3">
                                    <h5>Please select your bank account below and click withdraw.</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <a class="btn btn-theme btn-sm float-right" href="{{url('bank-account')}}">Manage Bank Accounts</a>
                                </div>
                            </div>

                            <div class="row form-group mb-3 mt-3">

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Bank Account <i class="text-danger">*</i></label>
                                    <select name="account" id="account" onchange="option_changed($(this).val(), 'bank_details_row', '{{url('get-bank-details')}}')" class="form-control">
                                        <option value="">Select Bank Account</option>
                                        @foreach($banks as $key => $bank)
                                            <option value="{{$bank->id}}">{{$bank->account_number ." - ". $bank->bank_name}}</option>
                                        @endforeach
                                    </select>
                                    @if($banks->count() == 0)
                                    <label class='float-left'><small>No bank accounts available. <a class='text-info' href="{{url('bank-account/create')}}">Add New</a></small></label>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Withdraw Amount <i class="text-danger">*</i></label>
                                    <input class="form-control" name="withdraw_amount_bank" placeholder="Enter Withdraw Amount" type="text">
                                </div>

                                <div class="col-md-12 mb-3 float-left bank_details_row"></div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-coin" role="tabpanel" aria-labelledby="pills-coin-tab">
                    <div class="card card-default card-margined">
                        <div class="card-body">

                            <div class="row form-group mb-3 mt-3">
                                <div class="col-md-12 mb-3">
                                    <h5>Please select your crypto wallet below and click withdraw.</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <a class="btn btn-theme btn-sm float-right" href="{{url('crypto-wallet')}}">Manage Crypto Wallets</a>
                                </div>
                            </div>

                            <div class="row form-group mb-3 mt-3">

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Crypto Wallet <i class="text-danger">*</i></label>
                                    <select name="wallet" id="wallet" onchange="option_changed($(this).val(), 'crypto_details_row', '{{url('get-crypto-details')}}')" class="form-control">
                                        <option value="">Select Crypto Wallet</option>
                                        @foreach($cryptos as $key => $crypto)
                                            <option value="{{$crypto->id}}">{{$crypto->crypto_options->name ." - ". $crypto->wallet_address}}</option>
                                        @endforeach
                                    </select>
                                    @if($cryptos->count() == 0)
                                    <label class='float-left'><small>No crypto wallets available. <a class='text-info' href="{{url('crypto-wallet/create')}}">Add New</a></small></label>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Withdraw Amount <i class="text-danger">*</i></label>
                                    <input class="form-control" name="withdraw_amount_crypto" placeholder="Enter Withdraw Amount" type="text">
                                </div>

                                <div class="col-md-12 mb-3 float-left crypto_details_row"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>
