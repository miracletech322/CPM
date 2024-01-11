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

            <li class="nav-item miners">
                <a class="nav-link" href="{{url("miners")}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i width="19.498" height="17.546"class="fa fa-bitcoin fa-lg" ></i>
                     &nbsp;<span class="ms-2">{{__("Miners")}}</span>
                </a>
            </li>
            <li class="nav-item withdraw">
                <a class="nav-link" href="{{url("withdraw")}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i width="19.498" height="17.546" class="fa fa-shopping-cart fa-lg"></i>
                     &nbsp;<span class="ms-2">{{__("Withdraw")}}</span>
                </a>
            </li>
            <li class="nav-item requests">
                <a class="nav-link" href="{{url("user-requests")}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i width="19.498" height="17.546" class="fa fa-list" ></i>
                     &nbsp;<span class="ms-2">{{__("Requests")}}</span>
                </a>
            </li>
            <li class="nav-item referrals">
                <a class="nav-link" href="{{url("referrals")}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i width="19.498" height="17.546" class="fa fa-tag"></i>
                     &nbsp;<span class="ms-2">{{__("Referrals")}}</span>
                </a>
            </li>
            <li class="nav-item invoice">
                <a class="nav-link" href="{{url("invoice")}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i width="19.498" height="17.546" class="fa fa-file" ></i>
                     &nbsp;<span class="ms-2">{{__("Invoices")}}</span>
                </a>
            </li>


            <li class="nav-item account">
                <a class="nav-link" href="{{url("account")}}" data-bs-toggle="" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i width="19.498" height="17.546" class="fa fa-user fa-lg"></i>
                     &nbsp;<span class="ms-2">{{__("Account")}}</span>
                </a>
            </li>
        </ul>
    </div>
</nav>