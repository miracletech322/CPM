<div class="header border-bottom border-gray-200 header-fixed">
    <div class="container-fluid px-0">
        <div class="header-body px-3 px-xxl-5 py-3 py-lg-4">
            <div class="row align-items-center">
                <a href="javascript:void(0);" class="muze-hamburger d-block d-lg-none col-auto">
                    <img src="{{asset('temp/assets/svg/icons/hamburger1.svg')}}" alt="img">
                    <img src="{{asset('temp/assets/svg/icons/close1.svg')}}" style="width:20px;" class="menu-close" alt="img">
                </a>
                <a class="navbar-brand mx-auto d-lg-none col-auto px-0" href="#">
                    <img src="{{$site_data["site_logo"]}}" height="40" alt="{{$site_data["site_name"]}}">
                </a>
                <div class="col d-flex align-items-center">
                    <a href="javascript:void(0);" class="back-arrow bg-white circle circle-sm shadow border border-gray-200 rounded mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 16 16">
                            <g data-name="icons/tabler/chevrons-left" transform="translate(0)">
                                <rect data-name="Icons/Tabler/Chevrons Left background" width="16" height="16" fill="none" />
                                <path d="M14.468,14.531l-.107-.093-6.4-6.4a.961.961,0,0,1-.094-1.25l.094-.107,6.4-6.4a.96.96,0,0,1,1.451,1.25l-.094.108L10,7.36l5.72,5.721a.961.961,0,0,1,.094,1.25l-.094.107a.96.96,0,0,1-1.25.093Zm-7.68,0-.107-.093-6.4-6.4a.961.961,0,0,1-.093-1.25l.093-.107,6.4-6.4a.96.96,0,0,1,1.45,1.25l-.093.108L2.318,7.36l5.72,5.721a.96.96,0,0,1,.093,1.25l-.093.107a.96.96,0,0,1-1.25.093Z" transform="translate(0 1)" fill="#6C757D" />
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="col-auto d-flex flex-wrap align-items-center icon-blue-hover ps-0">

                    <div class="dropdown grid-option {{auth()->user()->role_id != 3 ? 'd-none' : ''}}">
                        <a href="#" class="text-dark ms-4 ms-xxl-5 h5 mb-0" data-bs-toggle="dropdown" aria-expanded="false" id="grid">
                            <img src='{{@languages()[auth()->user()->locale][1]}}' height=33 >
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0" style='min-width: auto;' aria-labelledby="grid" style="">
                            <div class="dropdown-header d-flex align-items-center px-4 py-2">
                                <span class="fs-16 Montserrat-font font-weight-semibold text-black-600" style='padding-top: 11px !important; padding-bottom: 11px !important;'>{{__("Set Language")}}</span>
                            </div>
                            <div class="dropdown-footer text-center py-2 border-top border-gray-50">
                                @foreach (languages() as $locale => $lang)
                                    <a href="{{url("lang/$locale")}}" class="dropdown-item text-wrap">
                                        <div class="media align-items-center">
                                            <span class="me-3">
                                                <img class="avatar avatar-xs rounded-0" src="{{$lang[1]}}" alt="{{$lang[0]}}">
                                            </span>
                                            <div class="media-body" style='text-align: left;'>
                                                <span class="fs-16 font-weight-semibold dropdown-title">{{$lang[0]}}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="dropdown profile-dropdown">
                        <a href="#" class="avatar avatar-sm avatar-circle ms-4 ms-xxl-5" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton">
                            <img class="avatar-img" src="{{asset('temp/assets/img/avatar.png')}}" alt="Avatar">
                            <span class="avatar-status avatar-sm-status avatar-success">&nbsp;</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li class="pt-2 px-4">
                                <span class="fs-16 font-weight-bold text-black-600 Montserrat-font me-2">{{Auth::user()->first_name." ".Auth::user()->last_name}}</span>
                                <small class="text-gray-600 pb-3 d-block">{{Auth::user()->email}}</small>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a href="#" class="dropdown-item" onclick="event.preventDefault(); 
                            document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fa-2x"></i><span class="ms-2">{{__("Sign Out")}}</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
