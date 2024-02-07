@extends('layouts.home.base')
@section('style')

@endsection

@section('title') {{__("Home")}} @endsection
@section('content')

<section class="home-banner" id="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 position-u flex-align wow fadeInLeft">
                <div class="banner-contain">
                    <h1 class="banner-heading">{{__("Transparent Crypto Mining - Made easy, made for you")}}</h1>
                    <p class="banner-des">{{__("Mine Bitcoin, Ether and Litecoin with our state of the art mining ASICs and GPU.")}} <br>{{__("Feel free to")}} <a href="mailto:support@cloudminepool.com">{{__("contact us")}}</a> {{__("for any query or details")}}.</p>
                    <a href="#calculator" class="btn">{{__("Calculator")}}</a>
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

<section class="work-part ptb-100 lightskyblue">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="section-heading text-center pb-65">
                    <label class="sub-heading text-black">{{__("Cloudminepool Crypto Mining")}}</label>
                    <h2 class="heading-title">{{__("How it Works")}}</h2>
                    <p class="heading-des">{{__("Using state of the art equipment and our low cost of electricity and maintenance, Cloudminepool offers you plans to start mining with us today.")}}</p>
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
                    <h3 class="work-process-title pb-25">{{__("We’ve built a platform for crypto beginners and experts a like - A community for crypto mining enthusiasts.")}}</h3>
                    <p class="work-des pb-20">{{__("With Cloudminepool, you’re in good hands with")}} </p>

                    <ul class="check-list">
                        <li><span><i class="fa fa-check" style="color: #fff" aria-hidden="true"></i></span>
                            <p>{{__("Access to mine top crypto tokens such as Bitcoin, Ether and Litecoin")}}</p>
                        </li>
                        <li><span><i class="fa fa-check" style="color: #fff" aria-hidden="true"></i></span>
                            <p>{{__("State of the art mining equipment and farms")}}</p>
                        </li>
                        <li><span><i class="fa fa-check" style="color: #fff" aria-hidden="true"></i></span>
                            <p>{{__("Easy setup - guided by tutorials")}}</p>
                        </li>
                        <li><span><i class="fa fa-check" style="color: #fff" aria-hidden="true"></i></span>
                            <p>{{__("24/7 Customer support to ensure your satisfaction")}}</p>
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
                    <label class="sub-heading text-black">{{__("CloudMinePool Platform")}}</label>
                    <h2 class="heading-title">{{__("Best Features")}}</h2>
                    <p class="heading-des">{{__("We have put together a platform that ensures smooth running and customer satisfaction so you are never in doubt. Mine crypto from anywhere, at any time!")}} <br>{{__("Some of our best features are listed below")}}</p>
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
                        <a class="feature-title pb-15">{{__("Revolutionary hardware")}}</a>
                        <p class="feature-des">{{__("Top-of-the-line equipment that is regularly monitored to ensure no downtime to our users, nor any loss of profits due to system errors.")}} </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a><img src="{{asset('frontend')}}/images/feature-2.png" alt="Early Bonus"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a class="feature-title pb-15">{{__("Crypto currency of your choice")}}</a>
                        <p class="feature-des">{{__("You can choose any of the crypto currencies available on our site to mine today! We offer multiple major crypto currencies including Bitcoin, Ether and Litecoin through various mining algorithms.")}} </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a><img src="{{asset('frontend')}}/images/feature-6.png" alt="Univarsal Access"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a class="feature-title pb-15">{{__("Reliable partners")}}</a>
                        <p class="feature-des">{{__("We are a team of crypto experts brought together by our common interest in decentralized finance. This is not a one-man show. Everyone at Cloudminepool is well trained, well equipped and vigilant in their duties and responsibilities.")}} </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a><img src="{{asset('frontend')}}/images/feature-5.png" alt="Secure Storage"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a class="feature-title pb-15">{{__("Low cost")}}</a>
                        <p class="feature-des">{{__("Due to our large scale of operation, and low cost of overheads, we are able to offer an incredible price to our customers. Our contracts pay for themselves as you start generating more and more profits while taking an active part in the cryptoverse.")}} </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a><img src="{{asset('frontend')}}/images/feature-2.png" alt="Low Cost"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a class="feature-title pb-15">{{__("Easy and accessible")}}</a>
                        <p class="feature-des">{{__("The equipment, infrastructure and overheads have already been set up and paid for. This creates a low barrier to entry meaning that anyone can start as early as today. With a user friendly interface, 24/7 customer support and a community of amateurs and experts alike, you can always rely on us!")}} </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 wow fadeInUp pb-80">
                <div class="feature-box">
                    <div class="feature-icon">
                        <a><img src="{{asset('frontend')}}/images/feature-4.png" alt="Several Profit"></a>
                    </div>
                    <div class="feature-contain pt-25">
                        <a class="feature-title pb-15">{{__("Trusted and Transparent")}}</a>
                        <p class="feature-des">{{__("Cloudminepool believes in being upfront and transparent about our operations, that's why we publish monthly reports of our computational and mining power.")}} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="calculate-earnings lightskyblue" id="calculator">
    <div class="container">
        <h2 class="calculate-earnings__title">{{__("Calculate earnings")}}</h2>
        <div class="calculate-earnings__wrap">
            <div class="form-loading"></div>
            <div class="calculate-earnings__calculator">
                <h3 class="calculate-earnings__calculator-title">{{__("Select the desired power")}}:</h3>
                <br><br>
                <div class="calculate-earnings__calculator-data-item-select">
                    <div class="miner-select">
                        @foreach ($coins as $key => $coin)
                            @include("calculator_coin_section", compact("coin"))
                        @endforeach
                    </div>
                </div>
                
                <div class="miner-setup-slider">
                    <span style="display: none;" class="irs irs--round js-irs-0">
                        {{-- 
                        <span class="irs">
                            <span class="irs-line" tabindex="0"></span>
                            <span class="irs-min" style="display: none; visibility: hidden;">0</span>
                            <span class="irs-max" style="display: none; visibility: visible;">1</span>
                            <span class="irs-from" style="visibility: hidden;">0</span>
                            <span class="irs-to" style="visibility: hidden;">0</span>
                            <span class="irs-single" style="left: -6.01825%;">25 TH/s</span>
                        </span>
                        --}}
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
        <div class="row">
            <div class="col-md-6 p-4">
                <div class="card mb-4 rounded-12 shadow border border-gray-50 p-4">
                    <div class="calculate-earnings__calculator-data mt-4">
                        <div class="calculate-earnings__calculator-data-item">
                            <h4 class="calculate-earnings__calculator-data-title">{{__("Investment in $")}}</h4>
                            <input type="text" style="box-shadow: 0 6px 20px rgb(0 0 0 / 5%); border: 1px solid #f2f2f2; border-radius: 5px;" value="" class="calculate-earnings__calculator-data-input" id="data-input-price">
                        </div>

                        <div class="calculate-earnings__calculator-data-item">
                            <h4 class="calculate-earnings__calculator-data-title">
                                {{__("Power")}} <span class="input-prefix"> TH/s</span>
                            </h4>
                            <input type="text" style="box-shadow: 0 6px 20px rgb(0 0 0 / 5%); border: 1px solid #f2f2f2; border-radius: 5px;" value="25" class="calculate-earnings__calculator-data-input" id="data-input-ghs">
                        </div>
                    </div>

                    <div class="calculate-earnings__calculator-results">
                        <div class="calculate-earnings__calculator-results-item">
                            <h4 class="calculate-earnings__calculator-results-title">
                                {{__("Income")}} <strong>{{__("per day")}}</strong>
                            </h4>
                            <p class="calculate-earnings__calculator-results-numbers" id="daily"></p>
                        </div>
                        <div class="calculate-earnings__calculator-results-item">
                            <h4 class="calculate-earnings__calculator-results-title">
                                {{__("Income")}} <strong>{{__("per month")}}</strong>
                            </h4>
                            <p class="calculate-earnings__calculator-results-numbers" id="month"></p>
                        </div>
                        <div class="calculate-earnings__calculator-results-item">
                            <h4 class="calculate-earnings__calculator-results-title">
                                {{__("Income")}} <strong>{{__("per year")}}</strong>
                            </h4>
                            <p class="calculate-earnings__calculator-results-numbers" id="year"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 p-4">
                <div class="card mb-4 rounded-12 shadow border border-gray-50 p-4">
                    <div class="calculate-earnings__calculator-data" style="display: inline-block !important;">
                        <div class="mt-4">
                            <h4 class="calculate-earnings__calculator-data-title">
                                <b>{{__("Your Own Electricity Cost (Per Watt)")}}</b>
                            </h4>
                            <input type="text" style="box-shadow: 0 6px 20px rgb(0 0 0 / 5%); border: 1px solid #f2f2f2; border-radius: 5px;" value="0.2" class="calculate-earnings__calculator-data-input" id="data-input-ghs-home">
                        </div>
                    </div>

                    <div class="calculate-earnings__calculator-results">
                        <div class="calculate-earnings__calculator-results-item">
                            <h4 class="calculate-earnings__calculator-results-title">
                                {{__("Income")}} <strong>{{__("per day")}}</strong>
                            </h4>
                            <p class="calculate-earnings__calculator-results-numbers" id="daily_home"></p>
                        </div>
                        <div class="calculate-earnings__calculator-results-item">
                            <h4 class="calculate-earnings__calculator-results-title">
                                {{__("Income")}} <strong>{{__("per month")}}</strong>
                            </h4>
                            <p class="calculate-earnings__calculator-results-numbers" id="month_home"></p>
                        </div>
                        <div class="calculate-earnings__calculator-results-item">
                            <h4 class="calculate-earnings__calculator-results-title">
                                {{__("Income")}} <strong>{{__("per year")}}</strong>
                            </h4>
                            <p class="calculate-earnings__calculator-results-numbers" id="year_home"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none">
                <input type="hidden" name="hashing" id="hashing">
                <input type="hidden" name="cash" id="cash">
                <input type="hidden" name="coin_data_id" id="coin_data_id">
            </div>


            <div class="col-md-12 mt-3">
                @if(Auth::check())
                @if(auth()->user()->role_id == 3)
                <a href="{{url('miners')}}" class="calculate-earnings__calculator-btn btn">{{__("Buy")}}</a>
                @else
                <a href="{{url('dashboard')}}" class="calculate-earnings__calculator-btn btn">{{__("Buy")}}</a>
                @endif
                @else
                <a href="{{route('login')}}" class="calculate-earnings__calculator-btn btn">{{__("Buy")}}</a>
                @endif
            </div>
        </div>


    </div>
</section>

<section class="ico-apps pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInLeft flex-bottom order-r-2">
                <div class="ico-apps-img w-100 text-center">
                    <img src="{{asset('frontend')}}/images/ico-img.png" alt="mobile apps">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight pb-100 order-r-1">
                <div class="section-heading pb-20">
                    <label class="sub-heading text-black">{{__("App For IOS/Android Coming Soon")}}</label>
                    <h2 class="heading-title">{{__("CloudMinePool App")}}</h2>
                    <p class="heading-des pb-20">{{__("Stay updated on the status of your mining operation with Cloudminepool's mining app. Get alerts for high temperature and electricity consumption through the that will be accessible to all through Goolge-Play and App-Store. Stay equipped with real time reports on all your mining hasrate and profitability.")}}</p>

                    <ul class="check-list mb-30">
                        <li><span><i class="fa fa-check" style="color: #fff;" aria-hidden="true"></i></span>
                            <p>{{__("Full overview of your status, speed and health")}}</p>
                        </li>
                        <li><span><i class="fa fa-check" style="color: #fff;" aria-hidden="true"></i></span>
                            <p>{{__("Detailed reports of your mining operation and profitability")}}</p>
                        </li>
                    </ul>
                    {{-- <a href="#" class="btn">get the app now</a> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq-part pt-100 lightskyblue parallax-2" id="faq">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="section-heading text-center pb-65">
                    <label class="sub-heading text-black">{{__("Faqs")}}</label>
                    <h2 class="heading-title">{{__("Frequently Asked questions")}}</h2>
                    <p class="heading-des">{{__("We understand you have many questions, if you find a question that's not already been answered below, please alert us through customer support at")}} <a href="mailto:support@cloudminepool.com">support@cloudminepool.com</a> {{__("Thank you.")}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <ul class="nav nav-tabs Frequently-tabs pb-55" id="myTab" role="tablist">
                    <li>
                        <a class="active" data-toggle="tab" href="#General" role="tab">{{__("General")}}</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#Started" role="tab">{{__("Getting Started")}}</a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#Technical" role="tab">{{__("Technical")}}</a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#Payments" role="tab">{{__("Payments, Pricing and Costs")}}</a>
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
                                    <a class="qus-title">{{__("Why should I mine crypto?")}}</a>
                                    <p class="qus-des pt-10">{{__("Cryptocurrency mining enables you to not only earn economic value in the form of rewards, it also allows you to become a valuable member of the crypto ecosystem. By ensuring honest transactions between users, you keep this digital network functional and reliable.")}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a class="qus-title">{{__("What Crypto Currencies can I mine? ")}}</a>
                                    <p class="qus-des pt-10">{{__("With Cloudminepool you can mine Bitcoin, Ethereum, and Litecoin as for now, new Algorithms may available soon.")}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a class="qus-title">{{__("What would be the cost of starting my mining operation with Cloudminepool?")}}</a>
                                    <p class="qus-des pt-10">{{__("Cloudminepool offers you solutions to start mining using either our already established mining rigs all over the world by signing up for a [contact / subscription] with us, or you can use your own hardware, ASICs and GPUs to mine at your own overhead costs and place.")}} <br> {{__("To view our pricing plans, please visit:")}} <a href="#calculator">{{__("calculator section")}}</a></p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a class="qus-title">{{__("Which token should I mine?")}}</a>
                                    <p class="qus-des pt-10">{{__("You can choose to mine one or all three of our supported Cryptos that include Bitcoin, Ethereum and Litecoin, the world's most renowned tokens that have relevance even today a decade after their debut.")}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="Started" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a class="qus-title">{{__("Can I mine on my own?")}}</a>
                                    <p class="qus-des pt-10">{{__("Of course! Although, we would advise against it. Mining on your own would require you to invest a sizable sum on the hardware itself, the delivery fee, customs, electricity and any additional equipment that might be required for setting up and maintaining the system. By using our mining farms, you save on both time and money while not having to worry about such factors. Start mining as early as today.")}}</p>
                                </div>
                            </div>

                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a class="qus-title">{{__("What is the benefit of using Cloudminepool's Mining? ")}}</a>
                                    <p class="qus-des pt-10">
                                        {{__("Cloudminepool has established mining operations in several countries with low cost of electricity and parts to ensure the savings are then forwarded to you. We aim to be the largest and most well known Crypto mining platform that users trust and benefit from all over the world.")}}<br>{{__("With us, you will not have to worry about the initial setup of hardware, maintenance or cost of electricity as we'll take care of it for you.")}}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a class="qus-title">{{__("How can I get started?")}}</a>
                                    <p class="qus-des pt-10">{{__("To start mining using our pre-established mining Power, simply sign up with a contract of your choice at")}} <a href="{{url('/register')}}">{{__("registration page")}}</a>.</p>
                                </div>
                            </div>

                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a class="qus-title">{{__("Why us? ")}}</a>
                                    <p class="qus-des pt-10">
                                        <ul class="ml-3">
                                            <li>● {{__('No barrier to entry: Start mining with an investment as low as [$USD] for [hashrate]')}}</li>
                                            <li>● {{__("State of the art mining equipment: At cloudminepool mining, we use the latest devices from bitmain innosillicon goldshell and GPUs from NVIDIA and AMD")}}</li>
                                            <li>● {{__("Community of experts: Join to our Telegram Channel experts and investors that share a common goal of decentralized finance and the future of our economy")}}</li>
                                            <li>● {{__("Trusted and Transparent: We release reports every month that detail our crypto mining capability and accomplishments for you to review")}}</li>
                                            <li>● {{__("24/7 Customer support: Our exceptionally trained customer support is with you at every step of the way")}}</li>
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
                                    <a class="qus-title">{{__("Which Wallet does Cloudminepool recommend?")}}</a>
                                    <p class="qus-des pt-10">{{__("Ideally we recommend hardware or paper wallets; however, to start off your mining journey, you may use desktop wallets such as MetaMask or MyEtherWallet or Trustwallet. We are not responsible for which wallet you use, we only give possible options for a wallet.")}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a class="qus-title">{{__("What is a hash rate?")}}</a>
                                    <p class="qus-des pt-10">{{__("In layman's terms, a hash rate is the speed at which a token is mined. The higher the hash rate, the faster you can mine. Hash rate depends on the CPU or GPU that you are using. The better and faster the CPU / GPU, the faster you can mine.")}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a class="qus-title">{{__("How can I protect my crypto? ")}}</a>
                                    <p class="qus-des pt-10">{{__("As mentioned earlier, we recommend storing your Crypto in more secure locations such as hardware (Ledger, KeepKey etc.) or paper wallets. If you use desktop wallets like MetaMask or MyEtherWallet, we recommend:")}}
                                        <br><br>
                                        <ul class="ml-3">
                                            <li>● {{__("Running an antivirus frequently to detect and subdue any malware/spyware that may be running on your computer")}}</li>

                                            <li>● {{__("Avoid storing private information such as your private key or Seed Phrase / Secret Recover Phrase on your computer.")}}</li>

                                            <li>● {{__("Be wary of malicious phishing websites that are looking to steal your information.")}}</li>

                                            <li>● {{__("Ensure you're not using a fake MetaMask or desktop wallet.")}}</li>

                                            <li>● {{__("In case of breach of security, notify the customer support for your wallet immediately.")}}</li>
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
                                    <a class="qus-title">{{__("When will I get paid?")}}</a>
                                    <p class="qus-des pt-10">{{__("Payouts are processed on the 15th and end of month. These are requested in the user dashboard and released by our admins, this is only for self-protection to protect our wallets.")}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a class="qus-title">{{__("How do I calculate my mining profit? ")}}</a>
                                    <p class="qus-des pt-10">{{__("Using our profit calculator on")}} <a href="#calculator">{{__("calculator section")}}</a> <br>. {{__("You can easily calculate your profit and earnings for both cases in which you use our mining infrastructure or if you were to set up your own.")}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a class="qus-title">{{__("Can I purchase crypto currencies through Cloudminepool?")}}</a>
                                    <p class="qus-des pt-10">{{__("Our teams are working diligently to implement trading of various cryptos on Cloudminepool; however, this is not yet available. Please check back with us on a later date.")}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a class="qus-title">{{__("What payment methods do you accept?")}}</a>
                                    <p class="qus-des pt-10">{{__("Accepted payment methods include VISA, MasterCard, Debit / Credit cards, Coin Payment via CoinBase Commerce, and SEPA Transfer to our Company account.")}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a class="qus-title">{{__("How do I contact you if I have further questions?")}}</a>
                                    <p class="qus-des pt-10">{{__("Our customer support is available to cater to your queries at any given time.")}} <a href="mailto:support@cloudminepool.com">support@cloudminepool.com</a></p>
                                </div>
                            </div>


                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="legal" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a  class="qus-title">What cryptocurrencies can I use to
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
                                    <a  class="qus-title">How do I benefit from the ICO Token?</a>
                                    <p class="qus-des pt-10">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                        text ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen book. remaining essentially
                                        unchanged.</p>
                                </div>
                            </div>
                            <div class="col-md-6 pb-65">
                                <div class="faq-tab">
                                    <a  class="qus-title">What is Ico Crypto?</a>
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
