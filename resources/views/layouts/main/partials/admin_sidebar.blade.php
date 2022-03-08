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
            <li class="nav-item users">
                <a class="nav-link" href="{{url('users')}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i width="19.498" height="17.546" class="fa fa-users fa-lg"></i>
                    &nbsp;<span class="ms-2">Users</span>
                </a>
            </li>
            <li class="nav-item account">
                <a class="nav-link" href="{{url('account')."?section=upcoming"}}">
                    <i width="19.498" height="17.546" class="fa fa-user fa-lg"></i>
                    &nbsp;<span class="ms-2">Account</span>
                </a>
            </li>
        </ul>
    </div>
</nav>