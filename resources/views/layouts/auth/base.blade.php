<!DOCTYPE html>
<html lang="en">
@php
$site_data["site_name"] = "Folex Mining";
$site_data["site_logo"] = "";
$settings = DB::table("settings")->first();

if($settings){
    $site_data["site_name"] = @$settings->site_name;
    $site_data["site_logo"] = @$settings->site_logo;
}
@endphp
<head>
    @include('layouts.auth.header_includes' , $site_data)
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
    </style>
</head>


<body>
    <!-- Start preloader -->
    <div id="preloader"></div>
    <!-- End preloader -->

    <!-- Top scroll -->
    <div class="top-scroll transition">
        <a href="#banner" class="scrollTo"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    </div>

    @include('layouts.auth.header', $site_data)

    @yield('content')

    @include('layouts.auth.footer', $site_data)
    @include('layouts.auth.footer_includes', $site_data)
    @yield('js')
</body>
</html>
