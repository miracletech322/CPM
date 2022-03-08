<!DOCTYPE html>
<html lang="en" data-footer="true" data-navcolor="dark" data-color="light-green">
@php
$site_data["site_name"] = "Folex Mining";
$site_data["site_logo"] = asset('frontend') . '/images/logo1.svg';
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
    <div id="preloader"></div>
    @include('layouts.main.sidebar' , $site_data)

    <div class="main-content">
        @include('layouts.main.header', $site_data)
        @yield('content')
        <div class="px-3 px-xxl-5 py-3 py-lg-4 after-header">
            @include('layouts.main.footer', $site_data)
        </div>
    </div>

    @include('layouts.main.footer_includes', $site_data)
    @yield('js')


    <div class="modal global-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="height: 50px;">
                    <h5 class="modal-title global-modal-title" style="font-weight: 800;"></h5>
                    <button type="button" class="close" onclick="hide_global_modal()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body global-modal-body">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
