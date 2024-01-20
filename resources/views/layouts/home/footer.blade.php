<footer class="bg-pattern lightskyblue ptb-100">
    <div class="container">
        <div class="footer">
            <div class="row">
                <div class="col-lg-12 col-md-12 text-center">
                    <div class="footer-logo pb-25">
                        <a href="#"><img src="{{$site_data["site_logo"]}}" style="max-height:55px !important" alt="{{$site_data["site_name"]}}"></a>
                    </div>
                    <div class="footer-icon">
                        <ul>
                            <li><a href="https://t.me/cloudminepool_mining"><i class="fa fa-telegram" aria-hidden="true"></i></a></li>
                            {{-- <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer {{@(auth()->user()->role_id) == 3 || !auth()->check() ? '' : 'd-none'}}" style='padding-bottom: 30px; padding-top: 30px;'>
            <div class="row">
                <div class="col-lg-12 col-md-12 text-center">
                    <a href='{{url('lang/en')}}' class='text-primary {{session()->get('locale') == "en" ? "fw-bold" : ""}}'>{{__("English")}}</a> | 
                    <a href='{{url('lang/de')}}' class='text-primary {{session()->get('locale') == "de" ? "fw-bold" : ""}}'>{{__("German")}}</a>
                </div>
            </div>
        </div>
        
        <div class="copyright">
            <div class="row">
                <div class="col-lg-6">
                    <p>{{$site_data["site_name"]}} © {{__("All Rights Reserved")}}.</p>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li><a href="{{url('terms')}}">{{__("Terms & Condition")}}</a></li>
                        <li><a href="{{url('privacy')}}">{{__("Privacy Policy")}}</a></li>
                        <li><a href="mailto:support@cloudminepool.com">{{__("Contact Us")}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>