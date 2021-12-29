@php
    $site_logo = "/template/img/logo.png";
    $site_icon = "/template/img/logo-single.png";
    $settings = DB::table("settings")->first();
    if($settings){
        $site_logo = $settings->site_logo ? $settings->site_logo : $site_logo;
        $site_icon = $settings->site_icon ? $settings->site_icon : $site_icon;
    }
@endphp




<header class="topnavbar-wrapper">
    <!-- START Top Navbar-->
    <nav class="navbar topnavbar">
        <!-- START navbar header-->
        <div class="navbar-header"><a class="navbar-brand" href="#/">
                <div class="brand-logo"><img class="img-fluid" src="{{url('/') . @$site_logo}}" style="height: 40px !important;" alt="Logo"></div>
                <div class="brand-logo-collapsed"><img class="img-fluid" src="{{url('/') . @$site_icon}}" alt="Icon"></div>
            </a></div><!-- END navbar header-->
        <!-- START Left navbar-->
        <ul class="navbar-nav mr-auto flex-row">
            <li class="nav-item">
                <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops--><a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed"><em class="fas fa-bars"></em></a><!-- Button to show/hide the sidebar on mobile. Visible on mobile only.--><a class="nav-link sidebar-toggle d-md-none" href="#" data-toggle-state="aside-toggled" data-no-persist="true"><em class="fas fa-bars"></em></a>
            </li><!-- START User avatar toggle-->
            <li class="nav-item d-none d-md-block">
                <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops--><a class="nav-link" id="user-block-toggle" href="#user-block" data-toggle="collapse"><em class="icon-user"></em></a>
            </li><!-- END User avatar toggle-->
            <!-- START lock screen-->
        </ul><!-- END Left navbar-->
        <!-- START Right Navbar-->
        <ul class="navbar-nav flex-row">
            <!-- Search icon-->
            <li class="nav-item d-none d-md-block"><a class="nav-link" href="#" data-toggle-fullscreen=""><em class="fas fa-expand"></em></a></li><!-- START Alert menu-->
            <li class="nav-item dropdown dropdown-list mr-2"><a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-toggle="dropdown"><em class="fa fa-arrow-alt-circle-down fa-lg"></em></a><!-- START Dropdown menu-->
                <div class="dropdown-menu dropdown-menu-right animated flipInX">
                    <div class="dropdown-item">
                        <!-- START list group-->
                        <div class="list-group">
                            <!-- list item-->
                            <div class="list-group-item list-group-item-action">
                                <a class="media" style="text-decoration: none; color: black !important;" href="{{url('profile')}}">
                                    <div class="align-self-start mr-2"><em class="fa fa-user-circle fa-2x text-info"></em></div>
                                    <div class="media-body">
                                        <p class="m-0">My Profile</p>
                                    </div>
                                </a>
                            </div><!-- list item-->
                            <div class="list-group-item list-group-item-action">
                                <a class="media" style="text-decoration: none; color: black !important;" href="{{url('settings')}}">
                                    <div class="align-self-start mr-2"><em class="fa fa-cog fa-2x text-warning"></em></div>
                                    <div class="media-body">
                                        <p class="m-0">Settings</p>
                                    </div>
                                </a>
                            </div><!-- list item-->


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class="list-group-item list-group-item-action">
                                <a class="media" style="text-decoration: none; color: black !important;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                    <div class="align-self-start mr-2"><em class="fa fa-sign-out-alt fa-2x text-danger"></em></div>
                                    <div class="media-body">
                                        <p class="m-0">Sign-out</p>
                                    </div>
                                </a>
                            </div><!-- list item-->
                        </div><!-- END list group-->
                    </div>
                </div><!-- END Dropdown menu-->
            </li><!-- END Alert menu-->
            <!-- START Offsidebar button-->
        </ul><!-- END Right Navbar-->
        <!-- START Search form-->
        <form class="navbar-form" role="search" action="search.html">
            <div class="form-group"><input class="form-control" type="text" placeholder="Type and hit enter ...">
                <div class="fas fa-times navbar-form-close" data-search-dismiss=""></div>
            </div><button class="d-none" type="submit">Submit</button>
        </form><!-- END Search form-->
    </nav><!-- END Top Navbar-->
</header><!-- sidebar-->
