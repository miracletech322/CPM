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
    @include('layouts.home.header_includes' , $site_data)
    <title>@yield('title')</title>
    @yield('css')
</head>


<body>
    <!-- Start preloader -->
    <div id="preloader"></div>
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
