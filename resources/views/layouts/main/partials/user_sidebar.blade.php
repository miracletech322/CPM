<div id="nav" class="nav-container d-flex">
    <div class="nav-content d-flex">
        <div class=" position-relative">
            <a href="{{url('/')}}">
                <img src="{{$site_data["site_logo"] ? $site_data["site_logo"] : asset('backend/img/logo/icons8-omega-96 (1).png')}}" style="max-height:55px !important" alt="{{$site_data["site_name"]}}">
            </a>
        </div>
        <div class="user-container d-flex">
            <a href="#" class="d-flex user position-relative">
                <img class="profile" alt="profile" src="{{asset('backend')}}/img/blank-profile-picture-973460__480.png">
                <div class="name">{{ Auth()->user()->first_name.' '.Auth()->user()->last_name}}</div>
            </a>
        </div>

        <div class="menu-container flex-grow-1">
            <ul id="menu" class="menu">
                <li>
                    <a href="{{ url('miners')}}" class='miners'>
                        <i data-acorn-icon="shop" class="icon" data-acorn-size="18"></i>
                        <span class="label">Miners</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('referrals')}}">
                        <i data-acorn-icon="tag" class="icon" data-acorn-size="18"></i>
                        <span class="label">Referrals</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('withdraw')}}" class='withdraw'>
                        <i data-acorn-icon="cart" class="icon" data-acorn-size="18"></i>
                        <span class="label">Withdraw</span>
                    </a>
                </li>
                 <li>
                    <a href="{{ url('account')}}" class='account'>
                        <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
                        <span class="label">Account</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        <i data-acorn-icon="logout" class="icon" data-acorn-size="18"></i>
                        <span class="label">Logout</span>
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
        <div class="mobile-buttons-container">
            <a href="#" id="mobileMenuButton" class="menu-button">
                <i data-acorn-icon="menu"></i>
            </a>
        </div>
    </div>
    <div class="nav-shadow"></div>
</div>