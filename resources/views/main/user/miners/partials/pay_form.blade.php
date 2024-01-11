<section class="calculate-earnings container-fluid">
    <div class="row">
        <div class="col-md-12 pt-4">
            @include("shared.alerts")

            <ul class="nav nav-tabs nav-tabs-md nav-tabs-line position-relative zIndex-0" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" onclick="set_payment_method(1)" id="pills-card-tab" data-bs-toggle="pill" data-bs-target="#pills-card" type="button" role="tab" aria-controls="pills-card" aria-selected="true">{{__("Card")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-bank-tab" onclick="set_payment_method(2)" data-bs-toggle="pill" data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank" aria-selected="false">{{__("Bank Transfer")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-coin-tab" onclick="set_payment_method(3)" data-bs-toggle="pill" data-bs-target="#pills-coin" type="button" role="tab" aria-controls="pills-coin" aria-selected="false">{{__("Coinbase")}}</a>
                </li>
            </ul>


            <div class="tab-content py-3 py-lg-3" id="pills-tabContent ">
                <div class="tab-pane fade show active" id="pills-card" role="tabpanel" aria-labelledby="pills-card-tab">
                    @if(!blank($ending_at))
                    <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5 px-3 px-xxl-3 py-3">
                        <div class="card-body h-100">
                            <div class="row">
                                <div class="col-md-12 pb-3 mb-md-4">
                                    <label class="form-label form-label-lg float-left" for="customer_transaction"><input type="checkbox" name="customer_transaction" id="customer_transaction" onchange="set_chargeby()" value="1"> {{__("Charge by current card")}} </label>
                                </div>
                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class="form-label form-label-lg float-left">{{__("Card")}} </label>
                                    <input class="form-control form-control-xl" type="text" value="{{@$company}}" readonly>
                                </div>

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class="form-label form-label-lg float-left">{{__("Ending At")}} </label>
                                    <input class="form-control form-control-xl" type="text" value="{{@$ending_at}}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5 px-3 px-xxl-3 py-3 card-cpay">
                        <div class="card-body h-100">

                            <h5 class="mb-5">{{__("Enter your card details below")}}</h5>
                            <div class="row mt-4 card_form">
                                <div class="form-group col-md-3">
                                </div>
                                <div class="form-group col-md-6">
                                    <div id="card-element" class="form-control"></div>
                                    <div id="card-errors" role="alert" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
                    <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5 px-3 px-xxl-3 py-3">
                        <div class="card-body h-100">

                            <h5 class="mb-5">{{__("Send your payment to the bank details provided below and click pay")}}</h5>
                            <div class="row">

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class='float-left form-label form-label-lg'>{{__("Account Number")}} </label>
                                    <input class="form-control form-control-xl" value="{{$setting->account_number}}" readonly style="    background-color: #fff !important;">
                                </div>


                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class='float-left form-label form-label-lg'>{{__("Swift/BIC")}} </label>
                                    <input class="form-control form-control-xl" value="{{$setting->swift_bic}}" readonly style="    background-color: #fff !important;">
                                </div>

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class="float-left form-label form-label-lg">{{__("Additional Information")}} </label>
                                    <textarea class="form-control form-control-xl" rows=5 name="additional_information" placeholder="{{__("Enter Additional Information")}}"></textarea>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-coin" role="tabpanel" aria-labelledby="pills-coin-tab">
                    <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5 px-3 px-xxl-3 py-3">
                        <div class="card-body h-100">

                            <h5 class="mb-5">{{__("You will be redirected to coinbase for making payment")}}.</h5>
                            <div class="row">

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class='float-left form-label form-label-lg'>{{__("Amount Payable")}} </label>
                                    <input class="form-control form-control-xl" value="${{$cash}}" readonly style="background-color: #fff !important;">
                                </div>

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class='float-left form-label form-label-lg'>{{__("Amount BTC")}} </label>
                                    <input class="form-control form-control-xl" value="{{to_btc_format($cash_btc)}}" readonly style="background-color: #fff !important;">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
