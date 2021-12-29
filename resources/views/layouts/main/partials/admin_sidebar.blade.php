<div id="nav" class="nav-container d-flex">
    <div class="nav-content d-flex">
        <div class=" position-relative">
            <a href="{{url('/')}}">
                <img src="{{asset('backend')}}/img/logo/icons8-omega-96 (1).png" width="50px" height="50px">

            </a>
        </div>
        <div class="user-container d-flex">
            <a href="#" class="d-flex user position-relative">
                <img class="profile" alt="profile" src="{{asset('backend')}}/img/blank-profile-picture-973460__480.png">
                <div class="name">{{ Auth()->user()->first_name.' '.Auth()->user()->last_name}}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end user-menu wide">
                <div class="row mb-1 ms-0 me-0">
                    <p class="text-success"><i class="far fa-check-circle"></i> Verified User</p>
                </div>
            </div>
        </div>

        <div class="menu-container flex-grow-1">
            <ul id="menu" class="menu">
                <li>
                    <a href="{{ url('dashboard')}}" class='dashboard'>
                        <i class="icon fa fa-dashboard" data-acorn-size="18"></i>
                        <span class="label">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('users')}}" class='users'>
                        <i class="icon fa fa-users" data-acorn-size="18"></i>
                        <span class="label">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('withdraw-requests')}}">
                        <i class="icon fa fa-money" data-acorn-size="18"></i>
                        <span class="label">Withdraw Requests</span>
                    </a>
                </li>
                 <li>
                    <a href="{{ url('deposit-requests')}}">
                        <i class="icon fa fa-money" data-acorn-size="18"></i>
                        <span class="label">Deposit Requests</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('settings')}}" class='settings'>
                        <i class="icon fa fa-cog" data-acorn-size="18"></i>
                        <span class="label">Settings</span>
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