<div class="col-12">
    <div class="mb-4">
        <div class="">
            <div class="mb-5 text-center">
                <section class="calculate-earnings">
                    <div class="">
                        <h2 class="calculate-earnings__title">{{__("Calculate earnings")}}</h2>
                        <div class="calculate-earnings__wrap">
                            <div class="form-loading"></div>
                            <div class="calculate-earnings__calculator">
                                <h3 class="calculate-earnings__calculator-title">{{__("Select the desired power")}}</h3>
                                <br><br>
                                <div class="calculate-earnings__calculator-data-item-select">

                                    <div class="miner-select">
                                        @foreach ($coin_data as $key => $coin)
                                            @include("calculator_coin_section", compact("coin"))
                                        @endforeach
                                    </div>
                                </div>
                                
                                <div class="miner-setup-slider">
                                    <span style="display: none;" class="irs irs--round js-irs-0">
                                        <span class="irs">
                                            <span class="irs-line" tabindex="0"></span>
                                            <span class="irs-min" style="display: none; visibility: hidden;"></span>
                                            <span class="irs-max" style="display: none; visibility: visible;"></span>
                                            <span class="irs-from" style="visibility: hidden;"></span>
                                            <span class="irs-to" style="visibility: hidden;"></span>
                                            <span class="irs-single" style="left: -6.01825%;"></span>
                                        </span>
                                        <span class="irs-grid"></span>
                                        <span class="irs-bar irs-bar--single" style="left: 0px; width: 2.5%;"></span>
                                        <span class="irs-shadow shadow-single" style="display: none;"></span>
                                        <span class="irs-handle single" style="left: 0%;">
                                            <i></i>
                                            <i></i>
                                            <i></i>
                                        </span>
                                    </span>
                                    <input type="text" class="miner-setup irs-hidden-input" value="" tabindex="-1" readonly="" style="display: none;">
                                </div>
                            </div>
                        </div>


                        <div class="row p-3">
                            <div class="col-md-6">
                                <div class="card mb-4 rounded-12 shadow border border-gray-50 p-4">

                                    <div class="calculate-earnings__calculator-data">
                                        <div class="calculate-earnings__calculator-data-item">
                                            <h4 class="calculate-earnings__calculator-data-title"><b>{{__("Investment in")}} $</b></h4>
                                            <input type="text" value="" style="box-shadow: 0 6px 20px rgb(0 0 0 / 5%); border: 1px solid #f2f2f2; border-radius: 5px;" class="calculate-earnings__calculator-data-input" id="data-input-price">
                                        </div>

                                        <div class="calculate-earnings__calculator-data-item">
                                            <h4 class="calculate-earnings__calculator-data-title">
                                                <b>{{__("Power")}} <span class="input-prefix"> TH/s</span></b>
                                            </h4>
                                            <input type="text" value="25" style="box-shadow: 0 6px 20px rgb(0 0 0 / 5%); border: 1px solid #f2f2f2; border-radius: 5px;" class="calculate-earnings__calculator-data-input" id="data-input-ghs">
                                        </div>
                                    </div>

                                    <div class="calculate-earnings__calculator-results">
                                        <div class="row" style="width: 100%;">
                                            <div class="col-md-4 mb-1 buy_cal">
                                                <div class="calculate-earnings__calculator-results-item">
                                                    <h4 class="calculate-earnings__calculator-results-title">
                                                        {{__("Income")}} <strong>{{__("per day")}}</strong>
                                                    </h4>
                                                    <p class="calculate-earnings__calculator-results-numbers" id="daily"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-1 buy_cal">
                                                <div class="calculate-earnings__calculator-results-item">
                                                    <h4 class="calculate-earnings__calculator-results-title">
                                                        {{__("Income")}} <strong>{{__("per month")}}</strong>
                                                    </h4>
                                                    <p class="calculate-earnings__calculator-results-numbers" id="month"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-1 buy_cal">
                                                <div class="calculate-earnings__calculator-results-item">
                                                    <h4 class="calculate-earnings__calculator-results-title">
                                                        {{__("Income")}} <strong>{{__("per year")}}</strong>
                                                    </h4>
                                                    <p class="calculate-earnings__calculator-results-numbers" id="year"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card mb-4 rounded-12 shadow border border-gray-50 p-4">
                                    <div class="calculate-earnings__calculator-data" style="display: inline-block !important;">
                                        <div class="">
                                            <h4 class="calculate-earnings__calculator-data-title">
                                                <b>{{__("Your Own Electricity Cost (Per Watt)")}}</b>
                                            </h4>
                                            <input type="text" value="0.2" style="box-shadow: 0 6px 20px rgb(0 0 0 / 5%); border: 1px solid #f2f2f2; border-radius: 5px;" class="calculate-earnings__calculator-data-input" id="data-input-ghs-home">
                                        </div>
                                    </div>

                                    <div class="calculate-earnings__calculator-results">
                                        <div class="row" style="width: 100%;">
                                            <div class="col-md-4 mb-1 buy_cal">
                                                <div class="calculate-earnings__calculator-results-item">
                                                    <h4 class="calculate-earnings__calculator-results-title">
                                                        {{__("Income")}} <strong>{{__("per day")}}</strong>
                                                    </h4>
                                                    <p class="calculate-earnings__calculator-results-numbers" id="daily_home"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-1 buy_cal">
                                                <div class="calculate-earnings__calculator-results-item">
                                                    <h4 class="calculate-earnings__calculator-results-title">
                                                        {{__("Income")}} <strong>{{__("per month")}}</strong>
                                                    </h4>
                                                    <p class="calculate-earnings__calculator-results-numbers" id="month_home"></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-1 buy_cal">
                                                <div class="calculate-earnings__calculator-results-item">
                                                    <h4 class="calculate-earnings__calculator-results-title">
                                                        {{__("Income")}} <strong>{{__("per year")}}</strong>
                                                    </h4>
                                                    <p class="calculate-earnings__calculator-results-numbers" id="year_home"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">

                            </div>
                        </div>
                    </div>
                </section>
                <div class="d-none">
                    <input type="hidden" name="coin_data_id" id="coin_data_id">
                    <input type="hidden" name="hashing" id="hashing">
                    <input type="hidden" name="cash" id="cash">
                </div>


                <button type="submit" class="btn btn-warning btn-lg submit-btn">{{@$form_button}}</button>
            </div>
        </div>
    </div>
</div>