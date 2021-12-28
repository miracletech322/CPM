<!DOCTYPE html>
<html lang="en">
    <head>
    @include('layouts.head')
     @yield('style')
    <!-- Basic Page Needs -->
    </head>
    <body>
                <!-- Start preloader -->
        <div id="preloader"></div>
        <!-- End preloader -->

        <!-- Top scroll -->
        <div class="top-scroll transition">
            <a href="#banner" class="scrollTo"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
        </div>  

        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')
        @yield('script')
    </body>

</html>
