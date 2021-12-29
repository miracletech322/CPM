<header class="transition">
    <div class="container">
        <div class="row flex-align">
            <div class="col-lg-4 col-md-3 col-8">
                <div class="logo">
                    <a href="#"><img src="{{asset('frontend')}}/images/logo.png" class="transition" alt="{{$site_data["site_name"]}}"></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-9 col-4 text-right">
                <div class="menu-toggle">
                    <span></span>
                </div>
                <div class="menu">
                    <ul class="d-inline-block">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li><a href="#faq">FAQ</a></li>
                        <li><a href="#team">Our Team</a></li>
                    </ul>
                    @if(Auth()->check())
                    <div class="signin d-inline-block">
                        <a href="{{ route('dashboard')}}" class="btn">Dashboard</a>
                    </div>
                    @else
                    <div class="signin d-inline-block">
                        <a href="{{ route('login')}}" class="btn">Sign in</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>