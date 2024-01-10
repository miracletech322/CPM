<header class="transition">
    <div class="container">
        <div class="row flex-align">
            <div class="col-lg-4 col-md-3 col-8">
                <div class="logo">
                    <a href="#"><img src="{{$site_data["site_logo"]}}" style="max-height:55px !important" class="transition" alt="{{$site_data["site_name"]}}"></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-9 col-4 text-right">
                <div class="menu-toggle">
                    <span></span>
                </div>

                <div class="menu">
                    @if(url()->current() == url('/'))
                    <ul class="d-inline-block">
                        <li><a href="#">{{__("Home")}}</a></li>
                        <li><a href="#calculator">{{__("Calculator")}}</a></li>
                        <li><a href="#faq">{{__("FAQ")}}</a></li>
                    </ul>
                    @else
                    <ul class="d-inline-block">
                        <li><a href="{{url('/')}}">{{__("Home")}}</a></li>
                        <li><a href="{{url('/')}}#calculator">{{__("Calculator")}}</a></li>
                        <li><a href="{{url('/')}}#faq">{{__("FAQ")}}</a></li>
                    </ul>
                     @endif
                    @if(Auth()->check())
                    <div class="d-inline-block">
                        <a href="{{ route('dashboard')}}" class="btn">{{__("Dashboard")}}</a>
                    </div>
                    @else
                    <div class="d-inline-block">
                        <a href="{{ route('login')}}" class="btn btn-lg mr-2">{{__("Login")}}</a>
                        <a href="{{url('register')}}" class="btn btn-lg">{{__("Register")}}</a>
                    </div>
                    @endif
                </div>

              
            </div>
        </div>
    </div>
</header>
