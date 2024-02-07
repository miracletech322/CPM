<!DOCTYPE html>
<html lang="en">
@php
$site_data["site_name"] = "CloudMinePool";
$site_data["site_logo"] = asset('frontend') . '/images/logo1.svg';
$site_data["favicon"] = asset('frontend') . '/images/favicon.png';
$settings = DB::table("settings")->first();

if($settings){
$site_data["site_name"] = @$settings->site_name;
$site_data["site_logo"] = @$settings->site_logo ? (url('/').@$settings->site_logo) : $site_data["site_logo"];
}
@endphp
<head>
    @include('layouts.home.header_includes' , $site_data)
    <title>@yield('title')</title>
    @yield('css')

    <style>
        button.close {
            top: 5px !important;
            right: 6px !important;
            float: right;
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
        }

        .form-control {
            font-size: 1.5rem !important;
        }

        .simple-login-form {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }

        .btn {
            font-size: 1.67rem !important;
            color: #fff !important;
            font-weight: 600 !important;
            text-transform: unset !important;
            font-family: Montserrat, sans-serif !important;
            padding: 1.39rem 2.5rem !important;
        }

        .text-black {
            color: #999999 !important;
            font-weight: 600 !important;
        }

        .miner-select-item.active,
        .irs--round .irs-from,
        .irs--round .irs-to,
        .irs--round .irs-single {
            color: #fff !important;
            font-weight: 600 !important;
        }

        .btn:hover {
            -webkit-transform: unset !important;
            transform: unset !important;
        }

        .btn:before {
            content: unset !important;
        }

        .rounded-12 {
            border-radius: 0.75rem !important;
        }

        .fw-bold {
            font-weight: bold;
        }

    </style>
</head>


<body>
    <!-- Start preloader -->
    <div id="preloader">
        <img src="{{url('frontend/images/loader.svg')}}" alt="Loading...">
    </div>
    <!-- End preloader -->

    <!-- Top scroll -->
    <div class="top-scroll transition">
        <a href="#banner" class="scrollTo"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    </div>

    @include('layouts.home.header', $site_data)

    @yield('content')

    @include('layouts.home.footer', $site_data)
    @include('layouts.home.footer_includes', $site_data)
    @yield('js')
</body>
</html>
