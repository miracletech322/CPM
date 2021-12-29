<!DOCTYPE html>
<html lang="en" data-footer="true" data-navcolor="dark" data-color="light-green">
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
        @include('layouts.main.header_includes' , $site_data)
        <title>@yield('title')</title>
        @yield('css')
    </head>


    <body>
        <div id="root">
            @include('layouts.main.header', $site_data)
            @include('layouts.main.sidebar', $site_data)
            <main>
                @yield('content')
            </main>
            @include('layouts.main.footer', $site_data)
        </div>
        @include('layouts.main.footer_includes', $site_data)
        @yield('js')
    </body>
</html>