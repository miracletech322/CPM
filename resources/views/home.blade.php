@extends('layouts.auth.base')
@section('style')

@endsection

@section('title') Home @endsection
@section('content')

<section class="home-banner" id="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 position-u flex-align wow fadeInLeft">
                <div class="banner-contain">
                    <h1 class="banner-heading">Invest In <span>Cryptocoin</span> Way To Trade</h1>
                    <p class="banner-des">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                        doloremque laudantium, totam rem</p>
                    <a href="#" class="btn">Learn more</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 position-u wow fadeInRight">
                <div class="banner-img">
                    <img src="{{asset('frontend')}}/images/about-2.png" alt="banner">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="work-part lightskyblue ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="section-heading text-center pb-65">
                    <label class="sub-heading">what is cryptcon</label>
                    <h2 class="heading-title">How it Works</h2>
                    <p class="heading-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-center flex-align justify-center wow fadeInLeft">
                <div class="work-box">
                    <div class="work-box-bg"></div>
                    <img src="{{asset('frontend')}}/images/work-process.png" class="rotation-img" alt="Work Process">
                </div>
            </div>
            <div class="col-md-6 flex-align wow fadeInRight">
                <div class="work-box">
                    <h3 class="work-process-title pb-25">We’ve built a platform to buy and sell shares.</h3>
                    <p class="work-des pb-20">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                        an unknown printer </p>

                    <ul class="check-list">
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </li>
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </li>
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature-part pt-100 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="section-heading text-center pb-65">
                    <label class="sub-heading">cryptcon Feature</label>
                    <h2 class="heading-title">Best Features</h2>
                    <p class="heading-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <img src="{{asset('frontend')}}/images/feature-1.png" alt="Safe & Secure">
                    </div>
                    <div class="feature-contain pt-25">
                        <a href="feature.html" class="feature-title pb-15">Safe & Secure</a>
                        <p class="feature-des">Lorem ipsum dolor sit amet, consectetur adipi-sicing elit, sed do
                            eiusmod tempor incididunt ut labore et.Lorem ipsum dolor sit amet, labore et.Lorem ipsum
                            dolor sit amet. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a href="feature.html"><img src="{{asset('frontend')}}/images/feature-2.png" alt="Early Bonus"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a href="feature.html" class="feature-title pb-15">Early Bonus</a>
                        <p class="feature-des">Lorem ipsum dolor sit amet, consectetur adipi-sicing elit, sed do
                            eiusmod tempor incididunt ut labore et.Lorem ipsum dolor sit amet, labore et.Lorem ipsum
                            dolor sit amet. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a href="feature.html"><img src="{{asset('frontend')}}/images/feature-3.png" alt="Univarsal Access"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a href="feature.html" class="feature-title pb-15">Univarsal Access</a>
                        <p class="feature-des">Lorem ipsum dolor sit amet, consectetur adipi-sicing elit, sed do
                            eiusmod tempor incididunt ut labore et.Lorem ipsum dolor sit amet, labore et.Lorem ipsum
                            dolor sit amet. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a href="feature.html"><img src="{{asset('frontend')}}/images/feature-4.png" alt="Secure Storage"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a href="feature.html" class="feature-title pb-15">Secure Storage</a>
                        <p class="feature-des">Lorem ipsum dolor sit amet, consectetur adipi-sicing elit, sed do
                            eiusmod tempor incididunt ut labore et.Lorem ipsum dolor sit amet, labore et.Lorem ipsum
                            dolor sit amet. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a href="feature.html"><img src="{{asset('frontend')}}/images/feature-5.png" alt="Low Cost"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a href="feature.html" class="feature-title pb-15">Low Cost</a>
                        <p class="feature-des">Lorem ipsum dolor sit amet, consectetur adipi-sicing elit, sed do
                            eiusmod tempor incididunt ut labore et.Lorem ipsum dolor sit amet, labore et.Lorem ipsum
                            dolor sit amet. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a href="feature.html"><img src="{{asset('frontend')}}/images/feature-6.png" alt="Several Profit"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a href="feature.html" class="feature-title pb-15">Several Profit</a>
                        <p class="feature-des">Lorem ipsum dolor sit amet, consectetur adipi-sicing elit, sed do
                            eiusmod tempor incididunt ut labore et.Lorem ipsum dolor sit amet, labore et.Lorem ipsum
                            dolor sit amet. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                        <div class="miner-select-item active" data-system="1" data-price="{{$pageData['sha_price_th']}}" data-cost="{{$pageData['sha_cost_per_kwh']}}" data-consumption="{{$pageData['sha_power_consumption']}}" data-coin="{{$pageData['sha_256']->price}}" data-difficulty="{{$pageData['sha_256']->difficulty}}" data-reward="{{$pageData['sha_256']->reward_block}}" data-min="250" data-max="50000" data-step="0.001" data-prefix=" TH/s">SHA-256
                        </div>
                        <div class="miner-select-item" data-system="2" data-price="{{($pageData['eth_price_mh'])}}" data-cost="{{$pageData['eth_cost_per_kwh']}}" data-consumption="{{$pageData['eth_power_consumption']}}" data-coin="{{$pageData['ethash']->price}}" data-difficulty="{{$pageData['ethash']->difficulty}}" data-reward="{{$pageData['ethash']->reward_block}}" data-min="250" data-max="50000" data-step="0.001" data-prefix=" MH/s">Ethash
                        </div>
                        <div class="miner-select-item" data-system="3" data-price="{{($pageData['equi_price_kh'])}}" data-cost="{{$pageData['equi_cost_per_kwh']}}" data-consumption="{{$pageData['equi_power_consumption']}}" data-coin="{{$pageData['equihash']->price}}" data-difficulty="{{$pageData['equihash']->difficulty}}" data-reward="{{$pageData['equihash']->reward_block}}" data-min="250" data-max="50000" data-step="0.001" data-prefix=" KH/s">Equihash
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
            <div class="col-md-6 p-4" style='border: 2px solid #fff !important'>

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

            <div class="col-md-6 p-4" style='border: 2px solid #fff !important'>
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
<section class="ico-apps parallax-2 lightskyblue pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInLeft flex-bottom order-r-2">
                <div class="ico-apps-img w-100 text-center">
                    <img src="{{asset('frontend')}}/images/ico-img.png" alt="mobile apps">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight pb-100 order-r-1">
                <div class="section-heading pb-20">
                    <label class="sub-heading">ico apps</label>
                    <h2 class="heading-title">ICO Mobile App</h2>
                    <p class="heading-des pb-20">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when
                        an unknown printer took a galley also the leap into electronic typesetting, remaining
                        essentially unchanged. </p>

                    <ul class="check-list mb-30">
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Crypto-news curation</p>
                        </li>
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Natural Language Understanding</p>
                        </li>
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Et harum quidem rerum facilis est et expedita distinctio.</p>
                        </li>
                    </ul>
                    <a href="#" class="btn">get the app now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq-part pt-100" id="faq">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="section-heading text-center pb-65">
                    <label class="sub-heading">Faqs</label>
                    <h2 class="heading-title">Frequently Asked questions</h2>
                    <p class="heading-des">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <ul class="nav nav-tabs Frequently-tabs pb-55" id="myTab" role="tablist">
                    <li>
                        <a class="active" data-toggle="tab" href="#general" role="tab">general</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#ico" role="tab">pre-ico & ico</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#Tokens" role="tab">Tokens</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#client" role="tab">client</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#legal" role="tab">legal</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What is Ico Crypto?</a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What cryptocurrencies can I use to
                                        purchase? </a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">How can I participate in the ICO Token
                                        sale?</a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">How do I benefit from the ICO Token?</a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ico" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">How can I participate in the ICO Token
                                        sale?</a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What is Ico Crypto?</a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What cryptocurrencies can I use to
                                        purchase? </a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Tokens" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">How can I participate in the ICO Token
                                        sale?</a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What cryptocurrencies can I use to
                                        purchase? </a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What is Ico Crypto?</a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="client" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">How can I participate in the ICO Token
                                        sale?</a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What cryptocurrencies can I use to
                                        purchase? </a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">How do I benefit from the ICO Token?</a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What is Ico Crypto?</a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="legal" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What cryptocurrencies can I use to
                                        purchase? </a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">How do I benefit from the ICO Token?</a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What is Ico Crypto?</a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
@include('home_js')
@endsection
