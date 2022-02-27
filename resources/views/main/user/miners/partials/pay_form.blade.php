<section class="calculate-earnings container-fluid">
    <h2 class="calculate-earnings__title">Miner Payment</h2>
    <div class="row">
        <div class="col-md-12 pt-4">
            @include("shared.alerts")

            <ul class="nav nav-tabs nav-tabs-md nav-tabs-line position-relative zIndex-0" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" onclick="set_payment_method(1)" id="pills-card-tab" data-bs-toggle="pill" data-bs-target="#pills-card" type="button" role="tab" aria-controls="pills-card" aria-selected="true">Card</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-bank-tab" onclick="set_payment_method(2)" data-bs-toggle="pill" data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank" aria-selected="false">Bank Transfer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-coin-tab" onclick="set_payment_method(3)" data-bs-toggle="pill" data-bs-target="#pills-coin" type="button" role="tab" aria-controls="pills-coin" aria-selected="false">Coinbase</a>
                </li>
            </ul>


            <div class="tab-content py-3 py-lg-3" id="pills-tabContent ">
                <div class="tab-pane fade show active" id="pills-card" role="tabpanel" aria-labelledby="pills-card-tab">
                    @if(!blank($ending_at))
                    <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5 px-3 px-xxl-3 py-3">
                        <div class="card-body h-100">
                            <div class="row">
                                <div class="col-md-12 pb-3 mb-md-4">
                                    <label class="form-label form-label-lg float-left" for="customer_transaction"><input type="checkbox" name="customer_transaction" id="customer_transaction" onchange="set_chargeby()" value="1"> Charge by current card</label>
                                </div>
                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class="form-label form-label-lg float-left">Card </label>
                                    <input class="form-control form-control-xl" type="text" value="{{@$company}}" readonly>
                                </div>

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class="form-label form-label-lg float-left">Ending At </label>
                                    <input class="form-control form-control-xl" type="text" value="{{@$ending_at}}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5 px-3 px-xxl-3 py-3 card-cpay">
                        <div class="card-body h-100">

                            <div class="row">

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class='float-left form-label form-label-lg'>Full Name <i class="text-danger">*</i></label>
                                    <input class="form-control form-control-xl" name="full_name" id="full_name" type="text" placeholder="Enter Full Name">
                                </div>

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class='float-left form-label form-label-lg'>Card Number <i class="text-danger">*</i></label>
                                    <input class="form-control form-control-xl card-mask" name="cnumber" id="cnumber" type="text" placeholder="Enter Card Number">
                                </div>

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class='float-left form-label form-label-lg'>Card Expiry Month <i class="text-danger"> *</i></label>
                                    <select class="form-control form-control-xl" id="card_expiry_month" name="card_expiry_month">
                                        <option value="">Select Expiry Month</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class='float-left form-label form-label-lg'>Card Expiry Year <i class="text-danger"> *</i></label>
                                    <select id="card_expiry_year" class="form-control form-control-xl" name="card_expiry_year">
                                        <option value="">Select Expiry Year</option>
                                        @php
                                        $now = date("Y-m-d");
                                        @endphp

                                        @for ($i = 0; $i < 10 ; $i++) @php $add=" +" .$i." years"; $val=date("Y" , strtotime($now. $add)); @endphp {!! "<option value=" .$val.">".$val."</option>" !!}
                                            @endfor
                                    </select>
                                </div>

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class='float-left form-label form-label-lg'>CVN <i class="text-danger">*</i></label>
                                    <input class="form-control form-control-xl" name="cvv" id="cvv" placeholder="Enter CVN" type="text">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
                    <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5 px-3 px-xxl-3 py-3">
                        <div class="card-body h-100">

                            <h5 class="mb-5">Send you payment to the bank details provided below and click pay</h5>
                            <div class="row">

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class='float-left form-label form-label-lg'>Account Number </label>
                                    <input class="form-control form-control-xl" value="{{$setting->account_number}}" readonly style="    background-color: #fff !important;">
                                </div>


                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class='float-left form-label form-label-lg'>Swift/BIC </label>
                                    <input class="form-control form-control-xl" value="{{$setting->swift_bic}}" readonly style="    background-color: #fff !important;">
                                </div>

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class="float-left form-label form-label-lg">Additional Information </label>
                                    <textarea class="form-control form-control-xl" rows=5 name="additional_information" placeholder="Enter Additional Information"></textarea>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-coin" role="tabpanel" aria-labelledby="pills-coin-tab">
                    <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5 px-3 px-xxl-3 py-3">
                        <div class="card-body h-100">

                            <h5 class="mb-5">You will be redirected to coinbase for making payment.</h5>
                            <div class="row">

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class='float-left form-label form-label-lg'>Amount Payable </label>
                                    <input class="form-control form-control-xl" value="${{$cash}}" readonly style="background-color: #fff !important;">
                                </div>

                                <div class="col-md-6 pb-3 mb-md-4">
                                    <label class='float-left form-label form-label-lg'>Amount BTC </label>
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
