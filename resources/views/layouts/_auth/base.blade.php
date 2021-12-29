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

    @include('layouts.auth.header_includes' , $site_data)
    <title>@yield('title')</title>
    @yield('css')

</head>

<body>
    <div class="wrapper">
        <div class="block-center mt-4 wd-xl">
            @yield('content')
        </div>
        @include('layouts.auth.footer', $site_data)
    </div>
    @include('layouts.auth.footer_includes', $site_data)
    @yield('js')
</body>
</html>
