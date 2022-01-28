<section class="calculate-earnings container-fluid">
    <h2 class="calculate-earnings__title">Miner Payment</h2>
    <div class="row">
        <div class="col-md-12 p-4">
            @include("shared.alerts")
            <ul class="nav nav-tabs nav-justified" id="pills-tab" role="tablist">
                <li class="nav-item col-md-4" role="presentation">
                    <button class="nav-link active" onclick="set_payment_method(1)" id="pills-card-tab" data-bs-toggle="pill" data-bs-target="#pills-card" type="button" role="tab" aria-controls="pills-card" aria-selected="true">Card</button>
                </li>
                <li class="nav-item col-md-4" role="presentation">
                    <button class="nav-link" id="pills-bank-tab" onclick="set_payment_method(2)" data-bs-toggle="pill" data-bs-target="#pills-bank" type="button" role="tab" aria-controls="pills-bank" aria-selected="false">Bank Transfer</button>
                </li>
                <li class="nav-item col-md-4" role="presentation">
                    <button class="nav-link" id="pills-coin-tab" onclick="set_payment_method(3)" data-bs-toggle="pill" data-bs-target="#pills-coin" type="button" role="tab" aria-controls="pills-coin" aria-selected="false">Coinbase</button>
                </li>
            </ul>



            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-card" role="tabpanel" aria-labelledby="pills-card-tab">

                    @if(!blank($ending_at))
                    <div class="card card-default card-margined">
                        <div class="card-body">

                            <div class="row form-group mb-3">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class='float-left' for="customer_transaction"><input type="checkbox" name="customer_transaction" id="customer_transaction" onchange="set_chargeby()" value="1"> Charge by current card</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class='float-left'>Card: </label>
                                        <input class="form-control" type="text" value="{{@$company}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class='float-left'>Ending At: </label>
                                        <input class="form-control" type="text" value="{{@$ending_at}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="card card-default card-margined card-cpay">
                        <div class="card-body">

                            <div class="row form-group mb-3">

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Full Name <i class="text-danger">*</i></label>
                                    <input class="form-control" name="full_name" id="full_name" type="text" placeholder="Enter Full Name">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Card Number <i class="text-danger">*</i></label>
                                    <input class="form-control card-mask" name="cnumber" id="cnumber" type="text" placeholder="Enter Card Number">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Card Expiry Month <i class="text-danger"> *</i></label>
                                    <select class="form-control" id="card_expiry_month" name="card_expiry_month">
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

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Card Expiry Year <i class="text-danger"> *</i></label>
                                    <select id="card_expiry_year" class="form-control" name="card_expiry_year">
                                        <option value="">Select Expiry Year</option>
                                        @php
                                        $now = date("Y-m-d");
                                        @endphp

                                        @for ($i = 0; $i < 10 ; $i++) @php $add=" +" .$i." years"; $val=date("Y" , strtotime($now. $add)); @endphp {!! "<option value=" .$val.">".$val."</option>" !!}
                                            @endfor
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>CVN <i class="text-danger">*</i></label>
                                    <input class="form-control" name="cvv" id="cvv" placeholder="Enter CVN" type="text">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
                    <div class="card card-default card-margined">
                        <div class="card-body">

                            <h5>Send you payment to the bank details provided below and click pay</h5>
                            <div class="row form-group mb-3 mt-3">

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Account Number </label>
                                    <input class="form-control" value="{{$setting->account_number}}" readonly style="    background-color: #fff !important;">
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Swift/BIC </label>
                                    <input class="form-control" value="{{$setting->swift_bic}}" readonly style="    background-color: #fff !important;">
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

                            <h5>You will be redirected to coinbase for making payment.</h5>
                            <div class="row form-group mb-3 mt-3">

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Amount Payable </label>
                                    <input class="form-control" value="${{$cash}}" readonly style="background-color: #fff !important;">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class='float-left'>Amount BTC </label>
                                    <input class="form-control" value="{{to_btc_format($cash_btc)}}" readonly style="background-color: #fff !important;">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
