<!DOCTYPE html>
<html lang="en">

@php
$site_data["site_name"] = "SuperHumanTools";
$site_data["site_logo"] = "/template/img/logo.png";
$site_data["site_icon"] = "/template/img/logo-single.png";

$settings = DB::table("settings")->first();

if($settings){
    $site_data["site_name"] = @$settings->site_name ? @$settings->site_name : $site_data["site_name"];
    $site_data["site_logo"] = @$settings->site_logo ? @$settings->site_logo : $site_data["site_logo"];
    $site_data["site_icon"] = @$settings->site_icon ? @$settings->site_icon : $site_data["site_icon"];
}
@endphp
<head>

    @include('layouts.main.header_includes' , $site_data)
    <title>@yield('title')</title>
    @yield('css')

</head>

<body>
    <div id="preloader">
        <div class="lds-hourglass"></div>
    </div>

    <div class="wrapper">
        @include('layouts.main.header', $site_data)

        @include('layouts.main.sidebar' , $site_data)

        <section class="section-container">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </section>
        @include('layouts.main.footer', $site_data)
    </div>
    @include('layouts.main.footer_includes', $site_data)
    @yield('js')
</body>
</html>
