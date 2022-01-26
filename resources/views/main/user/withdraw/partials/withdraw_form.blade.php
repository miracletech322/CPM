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
                    <button class="nav-link active" onclick="set_payment_method(1)" id="pills-card-tab" data-bs-toggle="pill" data-bs-target="#pills-card" type="button" role="tab" aria-controls="pills-card" aria-selected="true">Card</button>
                </li>
                <li class="nav-item col-md-4" role="presentation">
                    <button class="nav-link" id="pills-bank-tab" onclick="set_payment_method(2)" data-bs-toggle="pill" data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank" aria-selected="false">Bank Transfer</button>
                </li>
                <li class="nav-item col-md-4" role="presentation">
                    <button class="nav-link" id="pills-coin-tab" onclick="set_payment_method(3)" data-bs-toggle="pill" data-bs-target="#pills-coin" type="button" role="tab" aria-controls="pills-coin" aria-selected="false">Bitcoin</button>
                </li>
            </ul>



            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-card" role="tabpanel" aria-labelledby="pills-card-tab">
                    <div class="card card-default card-margined">
                        <div class="card-body">

                            <div class="row form-group mb-3">

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Full Name <i class="text-danger">*</i></label>
                                    <input class="form-control" value="{{Auth::user()->bank_full_name}}" placeholder="Enter Full Name">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Card Number <i class="text-danger">*</i></label>
                                    <input class="form-control" value="{{Auth::user()->bank_card_number}}" name="first_name" id="first_name" type="text" placeholder="Enter Card Number">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Withdraw Amount <i class="text-danger">*</i></label>
                                    <input class="form-control" name="withdraw_amount" id="withdraw_amount" placeholder="Enter Withdraw Amount" type="text">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
                    <div class="card card-default card-margined">
                        <div class="card-body">

                            <h5>Please enter your bank details below click withdraw.</h5>
                            <div class="row form-group mb-3 mt-3">

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Full Name <i class="text-danger">*</i></label>
                                    <input class="form-control" value="{{Auth::user()->bank_full_name}}" name="full_name" placeholder="Enter Full Name">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Account Number <i class="text-danger">*</i></label>
                                    <input class="form-control" value="{{Auth::user()->bank_account_number}}" name="account_number" placeholder="Enter Account Number">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Swift/BIC <i class="text-danger">*</i></label>
                                    <input class="form-control" value="{{Auth::user()->bank_swift_bic}}" name="swift_bic" placeholder="Enter Swift/BIC">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Withdraw Amount <i class="text-danger">*</i></label>
                                    <input class="form-control" name="withdraw_amount" id="withdraw_amount" placeholder="Enter Withdraw Amount" type="text">
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="float-left">Additional Information </label>
                                        <textarea class="form-control" rows=5 name="additional_information" placeholder="Enter Additional Information"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-coin" role="tabpanel" aria-labelledby="pills-coin-tab">
                    <div class="card card-default card-margined">
                        <div class="card-body">
                            Coin Base Payment
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
