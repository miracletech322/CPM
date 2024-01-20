@php
    $home_url = url("/");  
@endphp
<nav class="navbar navbar-vertical navbar-expand-lg navbar-light">
    <a class="navbar-brand mx-auto d-none d-lg-block my-0 my-lg-4 text-center" href="{{$home_url}}">
        <img src="{{$site_data["site_logo"]}}" alt="{{$site_data["site_name"]}}" style="max-width: 180px !important; max-height: 75px !important;">
        <img src="{{$site_data["site_logo"]}}" width="40" class="muze-icon" alt="{{$site_data["site_name"]}}">
    </a>

    <div class="navbar-collapse">
        <ul class="navbar-nav mb-2" id="accordionExample" data-simplebar>
            <li class="nav-item dashboard">
                <a class="nav-link" href="{{url("dashboard")}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i width="19.498" height="17.546" class="fa fa-dashboard fa-lg"></i>
                    &nbsp;<span class="ms-2">Dashboard</span>
                </a>
            </li>
            <li class="nav-item admins">
                <a class="nav-link" href="{{url('admins')}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-users fa-lg" data-acorn-size="18"></i>
                    &nbsp;<span class="ms-2">Admins</span>
                </a>
            </li>

            <li class="nav-item users">
                <a class="nav-link" href="{{url('users')}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-users fa-lg" data-acorn-size="18"></i>
                    &nbsp;<span class="ms-2">Users</span>
                </a>
            </li>

            <li class="nav-item withdraw">
                <a class="nav-link" href="{{url('withdraw-requests')}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-money fa-lg" data-acorn-size="18"></i>
                    &nbsp;<span class="ms-2">Withdraw Requests</span>
                </a>
            </li>

            <li class="nav-item deposit">
                <a class="nav-link" href="{{url('deposit-requests')}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-money fa-lg" data-acorn-size="18"></i>
                    &nbsp;<span class="ms-2">Deposit Requests</span>
                </a>
            </li>

            <li class="nav-item account">
                <a class="nav-link" href="{{url('account')."?section=upcoming"}}">
                    <i width="19.498" height="17.546" class="fa fa-user fa-lg"></i>
                    &nbsp;<span class="ms-2">Account</span>
                </a>
            </li>

            <li class="nav-item settings">
                <a class="nav-link" href="{{url('settings')}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-cog fa-lg" data-acorn-size="18"></i>
                    &nbsp;<span class="ms-2">Settings</span>
                </a>
            </li>

            <li class="nav-item hashing-settings">
                <a class="nav-link" href="{{url('hashing-settings')}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-cog fa-lg" data-acorn-size="18"></i>
                    &nbsp;<span class="ms-2">Hashing Settings</span>
                </a>
            </li>

            <li class="nav-item coin-settings">
                <a class="nav-link" href="{{url('coin-settings')}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="fa fa-cog fa-lg" data-acorn-size="18"></i>
                    &nbsp;<span class="ms-2">Coin Settings</span>
                </a>
            </li>

        </ul>
    </div>
</nav>