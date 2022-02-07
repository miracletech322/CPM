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
                    <h1 class="banner-heading">Transparent Crypto Mining - Made easy, made for you</h1>
                    <p class="banner-des">Mine Bitcoin, Ether and Litecoin with our state of the art mining ASICs and GPU. <br>Feel free to <a href="mailto:">contact us</a> for any query or details.</p>
                    <a href="#calculator" class="btn">Calculator</a>
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
                    <label class="sub-heading">Folex Crypto Mining</label>
                    <h2 class="heading-title">How it Works</h2>
                    <p class="heading-des">Using state of the art equipment and our low cost of electricity and maintenance, Folex-Mining offers you plans to start mining with us today.</p>
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
                    <h3 class="work-process-title pb-25">We’ve built a platform for crypto beginners and experts a like - A community for crypto mining enthusiasts.</h3>
                    <p class="work-des pb-20">With Folex-Mining, you’re in good hands with </p>

                    <ul class="check-list">
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Access to mine top crypto tokens such as Bitcoin, Ether and Litecoin</p>
                        </li>
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>State of the art mining equipment and farms</p>
                        </li>
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Easy setup - guided by tutorials</p>
                        </li>
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>24/7 Customer support to ensure your satisfaction</p>
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
                    <label class="sub-heading">Folex Mining Platform</label>
                    <h2 class="heading-title">Best Features</h2>
                    <p class="heading-des">We have put together a platform that ensures smooth running and customer satisfaction so you are never in doubt. Mine crypto from anywhere, at any time! <br>Some of our best features are listed below</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <img src="{{asset('frontend')}}/images/feature-3.png" alt="Safe & Secure">
                    </div>
                    <div class="feature-contain pt-25">
                        <a class="feature-title pb-15">Revolutionary hardware</a>
                        <p class="feature-des">Top-of-the-line equipment that is regularly monitored to ensure no downtime to our users, nor any loss of profits due to system errors. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a><img src="{{asset('frontend')}}/images/feature-2.png" alt="Early Bonus"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a class="feature-title pb-15">Crypto currency of your choice</a>
                        <p class="feature-des">You can choose any of the crypto currencies available on our site to mine today! We offer multiple major crypto currencies including Bitcoin, Ether and Litecoin through various mining algorithms. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a href="feature.html"><img src="{{asset('frontend')}}/images/feature-6.png" alt="Univarsal Access"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a class="feature-title pb-15">Reliable partners</a>
                        <p class="feature-des">We are a team of crypto experts brought together by our common interest in decentralized finance. This is not a one-man show. Everyone at Folex is well trained, well equipped and vigilant in their duties and responsibilities. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a href="feature.html"><img src="{{asset('frontend')}}/images/feature-5.png" alt="Secure Storage"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a class="feature-title pb-15">Low cost</a>
                        <p class="feature-des">Due to our large scale of operation, and low cost of overheads, we are able to offer an incredible price to our customers. Our contracts pay for themselves as you start generating more and more profits while taking an active part in the cryptoverse. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a><img src="{{asset('frontend')}}/images/feature-2.png" alt="Low Cost"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a class="feature-title pb-15">Easy and accessible</a>
                        <p class="feature-des">The equipment, infrastructure and overheads have already been set up and paid for. This creates a low barrier to entry meaning that anyone can start as early as today. With a user friendly interface, 24/7 customer support and a community of amateurs and experts alike, you can always rely on us! </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a><img src="{{asset('frontend')}}/images/feature-4.png" alt="Several Profit"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a class="feature-title pb-15">Trusted and Transparent</a>
                        <p class="feature-des">Folex-Mining believes in being upfront and transparent about our operations, that's why we publish monthly reports of our computational and mining power.  </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="calculate-earnings" id="calculator">
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
                        <div class="miner-select-item" data-system="3" data-price="{{($pageData['equi_price_kh'])}}" data-cost="{{$pageData['equi_cost_per_kwh']}}" data-consumption="{{$pageData['equi_power_consumption']}}" data-coin="{{$pageData['equihash']->price}}" data-difficulty="{{$pageData['equihash']->difficulty}}" data-network="{{$pageData['equihash']->network_hashrate}}" data-reward="{{$pageData['equihash']->reward_block}}" data-min="{{$pageData['equi_min']}}" data-max="{{$pageData['equi_max']}}" data-step="0.001" data-prefix=" KH/s">Equihash
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
            <div class="d-none">
                <input type="hidden" name="hashing" id="hashing">
                <input type="hidden" name="cash" id="cash">
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
                    <label class="sub-heading">App For IOS/Android Coming Soon</label>
                    <h2 class="heading-title">Folex Mining App</h2>
                    <p class="heading-des pb-20">Stay updated on the status of your mining operation with Folex's mining app. Get alerts for high temperature and electricity consumption through the that will be accessible to all through Goolge-Play and App-Store. Stay equipped with real time reports on all your mining hasrate and profitability. </p>

                    <ul class="check-list mb-30">
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Full overview of your status, speed and health</p>
                        </li>
                        <li><span><i class="fa fa-check" aria-hidden="true"></i></span>
                            <p>Detailed reports of your mining operation and profitability</p>
                        </li>
                    </ul>
                    {{-- <a href="#" class="btn">get the app now</a> --}}
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
                    <p class="heading-des">We understand you have many questions, if you find a question that's not already been answered below, please alert us through customer support at <a href="mailto:support@folex-mining.com">support@folex-mining.com</a> Thank you.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <ul class="nav nav-tabs Frequently-tabs pb-55" id="myTab" role="tablist">
                    <li>
                        <a class="active" data-toggle="tab" href="#General" role="tab">General</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#Started" role="tab">Getting Started</a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#Technical" role="tab">Technical</a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#Payments" role="tab">Payments, Pricing and Costs</a>
                    </li>
                    {{-- <li>
                        <a data-toggle="tab" href="#legal" role="tab">legal</a>
                    </li>  --}}
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="General" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">Why should I mine crypto?</a>
                                    <p class="qus-des pt-10">Cryptocurrency mining enables you to not only earn economic value in the form of rewards, it also allows you to become a valuable member of the crypto ecosystem. By ensuring honest transactions between users, you keep this digital network functional and reliable.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What Crypto Currencies can I mine? </a>
                                    <p class="qus-des pt-10">With Folex you can mine Bitcoin, Ethereum, and Litecoin as for now, new Algorithms may available soon.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What would be the cost of starting my mining operation with Folex?</a>
                                    <p class="qus-des pt-10">Folex offers you solutions to start mining using either our already established mining rigs all over the world by signing up for a [contact / subscription] with us, or you can use your own hardware, ASICs and GPUs to mine at your own overhead costs and place. <br> To view our pricing plans, please visit: <a href="#calculator">calculator section</a></p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">Which token should I mine?</a>
                                    <p class="qus-des pt-10">You can choose to mine one or all three of our supported Cryptos that include Bitcoin, Ethereum and Litecoin, the world's most renowned tokens that have relevance even today a decade after their debut.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Started" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">Can I mine on my own?</a>
                                    <p class="qus-des pt-10">Of course! Although, we would advise against it. Mining on your own would require you to invest a sizable sum on the hardware itself, the delivery fee, customs, electricity and any additional equipment that might be required for setting up and maintaining the system. By using our mining farms, you save on both time and money while not having to worry about such factors. Start mining as early as today.</p>
                                </div>
                            </div>

                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What is the benefit of using Folex's Mining? </a>
                                    <p class="qus-des pt-10">
                                        Folex has established mining operations in several countries with low cost of electricity and parts to ensure the savings are then forwarded to you. We aim to be the largest and most well known Crypto mining platform that users trust and benefit from all over the world.<br>With us, you will not have to worry about the initial setup of hardware, maintenance or cost of electricity as we'll take care of it for you.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">How can I get started?</a>
                                    <p class="qus-des pt-10">To start mining using our pre-established mining Power, simply sign up with a contract of your choice at <a href="{{url('/register')}}">registration page</a>.</p>
                                </div>
                            </div>
                            
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">Why us? </a>
                                    <p class="qus-des pt-10">
                                        <ul class="ml-3">
                                            <li>●  No barrier to entry: Start mining with an investment as low as [$USD] for [hashrate]</li>
                                            <li>●  State of the art mining equipment: At folex mining, we use the latest devices from bitmain innosillicon goldshell and GPUs from NVIDIA and AMD</li>
                                            <li>●  Community of experts: Join to ou Telegram Chanel experts and investors that share a common goal of decentralized finance and the future of our economy</li>
                                            <li>●  Trusted and Transparent: We release reports every month that detail our crypto mining capability and accomplishments for you to review</li>
                                            <li>●  24/7 Customer support: Our exceptionally trained customer support is with you at every step of the way</li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Technical" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">Which Wallet does Folex recommend?</a>
                                    <p class="qus-des pt-10">Ideally we recommend hardware or paper wallets; however, to start off your mining journey, you may use desktop wallets such as MetaMask or MyEtherWallet or Trustwallet. We are not responsible for which wallet you use, we only give possible options for a wallet.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What is a hash rate?</a>
                                    <p class="qus-des pt-10">In layman's terms, a hash rate is the speed at which a token is mined. The higher the hash rate, the faster you can mine. Hash rate depends on the CPU or GPU that you are using. The better and faster the CPU / GPU, the faster you can mine.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">How can I protect my crypto? </a>
                                    <p class="qus-des pt-10">As mentioned earlier, we recommend storing your Crypto in more secure locations such as hardware (Ledger, KeepKey etc.) or paper wallets. If you use desktop wallets like MetaMask or MyEtherWallet, we recommend:
                                        <br><br>
                                        <ul class="ml-3">
                                            <li>●  Running an antivirus frequently to detect and subdue any malware/spyware that may be running on your computer</li>

                                            <li>●  Avoid storing private information such as your private key or Seed Phrase / Secret Recover Phrase on your computer.</li>

                                            <li>●  Be wary of malicious phishing websites that are looking to steal your information.</li>

                                            <li>●  Ensure you're not using a fake MetaMask or desktop wallet.</li>

                                            <li>●  In case of breach of security, notify the customer support for your wallet immediately.</li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                           
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Payments" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">When will I get paid?</a>
                                    <p class="qus-des pt-10">Payouts are processed on the 15th and end of month. These are requested in the user dashboard and released by our admins, this is only for self-protection to protect our wallets.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">How do I calculate my mining profit? </a>
                                    <p class="qus-des pt-10">Using our profit calculator on <a href="#calculator">calculator section</a> <br>. You can easily calculate your profit and earnings for both cases in which you use our mining infrastructure or if you were to set up your own.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">Can I purchase crypto currencies through Folex?</a>
                                    <p class="qus-des pt-10">Our teams are working diligently to implement trading of various cryptos on Folex; however, this is not yet available. Please check back with us on a later date.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">What payment methods do you accept?</a>
                                    <p class="qus-des pt-10">Accepted payment methods include VISA, MasterCard, Debit / Credit cards, Coin Payment via CoinBase Commerce, and SEPA Transfer to our Company account.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a href="faq.html" class="qus-title">How do I contact you if I have further questions?</a>
                                    <p class="qus-des pt-10">Our customer support is available to cater to your queries at any given time. <a href="mailto:support@folex-mining.com">support@folex-mining.com</a></p>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="legal" role="tabpanel">
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
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
@include('shared.calculator_js')
@endsection
