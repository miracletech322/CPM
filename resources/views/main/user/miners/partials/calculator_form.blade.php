<section class="calculate-earnings">
    <div class="container">
        <h2 class="calculate-earnings__title">Calculate earnings</h2>
        <div class="calculate-earnings__wrap">
            <div class="form-loading"></div>
            <div class="calculate-earnings__calculator">
                <h3 class="calculate-earnings__calculator-title">Select the desired power:</h3>
                <br><br>
                <div class="calculate-earnings__calculator-data-item-select">

                    <div class="miner-select">
                        <div class="miner-select-item active" data-system="1" data-price="{{$pageData['sha_price_th']}}" data-cost="{{$pageData['sha_cost_per_kwh']}}" data-consumption="{{$pageData['sha_power_consumption']}}" data-coin="{{$pageData['sha_256']->price}}" data-difficulty="{{$pageData['sha_256']->difficulty}}" data-reward="{{$pageData['sha_256']->reward_block}}" data-network="{{$pageData['sha_256']->network_hashrate}}" data-min="{{$pageData['sha_min']}}" data-max="{{$pageData['sha_max']}}" data-step="0.001" data-prefix=" TH/s">SHA-256
                        </div>
                        <div class="miner-select-item" data-system="2" data-price="{{($pageData['eth_price_mh'])}}" data-cost="{{$pageData['eth_cost_per_kwh']}}" data-consumption="{{$pageData['eth_power_consumption']}}" data-coin="{{$pageData['ethash']->price}}" data-difficulty="{{$pageData['ethash']->difficulty}}" data-reward="{{$pageData['ethash']->reward_block}}" data-network="{{$pageData['ethash']->network_hashrate}}" data-min="{{$pageData['eth_min']}}" data-max="{{$pageData['eth_max']}}" data-step="0.001" data-prefix=" MH/s">Ethash
                        </div>
                        <div class="miner-select-item" data-system="3" data-price="{{($pageData['equi_price_kh'])}}" data-cost="{{$pageData['equi_cost_per_kwh']}}" data-consumption="{{$pageData['equi_power_consumption']}}" data-coin="{{$pageData['equihash']->price}}" data-difficulty="{{$pageData['equihash']->difficulty}}" data-network="{{$pageData['equihash']->network_hashrate}}" data-reward="{{$pageData['equihash']->reward_block}}"  data-min="{{$pageData['equi_min']}}" data-max="{{$pageData['equi_max']}}" data-step="0.001" data-prefix=" KH/s">Equihash
                        </div>
                    </div>
                </div>
                <div class="miner-setup-slider">
                    <span style="display: none;" class="irs irs--round js-irs-0"><span class="irs"><span class="irs-line" tabindex="0"></span><span class="irs-min" style="display: none; visibility: hidden;">0</span><span class="irs-max" style="display: none; visibility: visible;">1</span><span class="irs-from" style="visibility: hidden;">0</span><span class="irs-to" style="visibility: hidden;">0</span><span class="irs-single" style="left: -6.01825%;">25 TH/s</span></span><span class="irs-grid"></span><span class="irs-bar irs-bar--single" style="left: 0px; width: 2.5%;"></span><span class="irs-shadow shadow-single" style="display: none;"></span><span class="irs-handle single" style="left: 0%;"><i></i><i></i><i></i></span></span>
                    <input type="text" class="miner-setup irs-hidden-input" value="" tabindex="-1" readonly="" style="display: none;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 p-4" style='border: 10px solid #fff !important; border-right: 5px solid #fff !important;'>

                <div class="calculate-earnings__calculator-data">
                    <div class="calculate-earnings__calculator-data-item">
                        <h4 class="calculate-earnings__calculator-data-title">Investment in $</h4>
                        <input type="text" value="" class="calculate-earnings__calculator-data-input" id="data-input-price">
                    </div>

                    <div class="calculate-earnings__calculator-data-item">
                        <h4 class="calculate-earnings__calculator-data-title">
                            Power <span class="input-prefix"> TH/s</span>
                        </h4>
                        <input type="text" value="25" class="calculate-earnings__calculator-data-input" id="data-input-ghs">
                    </div>
                </div>

                <div class="calculate-earnings__calculator-results">
                    <div class="calculate-earnings__calculator-results-item">
                        <h4 class="calculate-earnings__calculator-results-title">
                            Income <strong>per day</strong>
                        </h4>
                        <p class="calculate-earnings__calculator-results-numbers" id="daily">$1.46</p>
                    </div>
                    <div class="calculate-earnings__calculator-results-item">
                        <h4 class="calculate-earnings__calculator-results-title">
                            Income <strong>per month</strong>
                        </h4>
                        <p class="calculate-earnings__calculator-results-numbers" id="month">$43.80</p>
                    </div>
                    <div class="calculate-earnings__calculator-results-item">
                        <h4 class="calculate-earnings__calculator-results-title">
                            Income <strong>per year</strong>
                        </h4>
                        <p class="calculate-earnings__calculator-results-numbers" id="year">$525.60</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 p-4" style='border: 10px solid #fff !important; border-left: 5px solid #fff !important;'>
                <div class="calculate-earnings__calculator-data" style="display: inline-block !important;">
                    <div class="">
                        <h4 class="calculate-earnings__calculator-data-title">
                            Your Own Electricity Cost (Per Watt)
                        </h4>
                        <input type="text" value="0.2" class="calculate-earnings__calculator-data-input" id="data-input-ghs-home">
                    </div>
                </div>

                <div class="calculate-earnings__calculator-results">
                    <div class="calculate-earnings__calculator-results-item">
                        <h4 class="calculate-earnings__calculator-results-title">
                            Income <strong>per day</strong>
                        </h4>
                        <p class="calculate-earnings__calculator-results-numbers" id="daily_home">$1.46</p>
                    </div>
                    <div class="calculate-earnings__calculator-results-item">
                        <h4 class="calculate-earnings__calculator-results-title">
                            Income <strong>per month</strong>
                        </h4>
                        <p class="calculate-earnings__calculator-results-numbers" id="month_home">$43.80</p>
                    </div>
                    <div class="calculate-earnings__calculator-results-item">
                        <h4 class="calculate-earnings__calculator-results-title">
                            Income <strong>per year</strong>
                        </h4>
                        <p class="calculate-earnings__calculator-results-numbers" id="year_home">$525.60</p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                @if(Auth::check())
                @if(auth()->user()->role_id == 3)
                <a href="{{url('miners')}}" class="calculate-earnings__calculator-btn btn">Buy</a>
                @else
                <a href="{{url('dashboard')}}" class="calculate-earnings__calculator-btn btn">Buy</a>
                @endif
                @else
                <a href="{{route('login')}}" class="calculate-earnings__calculator-btn btn">Buy</a>
                @endif
            </div>
        </div>
    </div>
</section>
<div class="d-none">
    <input type="hidden" name="hashing" id="hashing">
    <input type="hidden" name="cash" id="cash">
</div>
