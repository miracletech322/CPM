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
    @include('layouts.auth.header_includes' , $site_data)
    <title>@yield('title')</title>
    @yield('css')
</head>


<body class="signup-simple-template bg-gray-100" data-new-gr-c-s-check-loaded="14.1050.0" data-gr-ext-installed="">
    <div id="preloader">
        <img src="{{url('frontend/images/loader.svg')}}" alt="Loading...">
    </div>

    <div class="signup-header text-center" style="background-image:url('{{url("images/cover.jpg")}}'); background-size: contain;">
        <div class="container">
            <a href="{{url("/")}}"><img src="{{$site_data["site_logo"]}}" style="max-height: 100px !important;" alt="Muze"></a>
        </div>
    </div>

    <div class="container">
        @yield('content')
        @include('layouts.auth.footer')
    </div>

    
    
    @include('layouts.auth.footer_includes', $site_data)
    @yield('js')
</body>
</html>