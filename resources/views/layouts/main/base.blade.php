<!DOCTYPE html>
<html lang="en" data-footer="true" data-navcolor="dark" data-color="light-green">
@php
    $site_data["site_name"] = "Folex Mining";
    $site_data["site_logo"] = asset('frontend') . '/images/logo.svg';
    $settings = DB::table("settings")->first();
    if($settings){
        $site_data["site_name"] = @$settings->site_name;
        $site_data["site_logo"] = @$settings->site_logo ? @$settings->site_logo : $site_data["site_logo"];
    }
    @endphp
<head>
    @include('layouts.main.header_includes' , $site_data)
    <title>@yield('title')</title>
    @yield('css')
    <style>
        .alert .close {
            font-size: x-large;
        }

        table {
            width: inherit !important;
        }

        input[type="search"] {
            display: none !important;
        }

        .buttons-excel,
        .dataTables_length {
            /* display: none !important; */
        }

        /* Hide the row containing datatable search and buttons etc  */
        .dataTables_wrapper .row:first-child {
            display: none !important;
        }

    </style>
</head>


<body class="bg-gray-100 analytics-template">

    @include('layouts.main.sidebar' , $site_data)

    <div class="main-content">
        @include('layouts.main.header', $site_data)
        @yield('content')
        <div class="container-fluid px-0">
            <div class="px-3 px-xxl-5 py-3 py-lg-4 border-gray-200 after-header">
                @include('layouts.main.footer', $site_data)
            </div>
        </div>
    </div>
    @include('layouts.main.footer_includes', $site_data)
    @yield('js')
</body>
</html>
