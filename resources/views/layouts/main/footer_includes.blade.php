{{-- 

<script src="{{asset('backend')}}/js/vendor/OverlayScrollbars.min.js"></script>
<script src="{{asset('backend')}}/js/vendor/autoComplete.min.js"></script>
<script src="{{asset('backend')}}/js/vendor/clamp.min.js"></script>
<script src="{{asset('backend')}}/icon/acorn-icons.js"></script>
<script src="{{asset('backend')}}/icon/acorn-icons-interface.js"></script>
<script src="{{asset('backend')}}/icon/acorn-icons-commerce.js"></script>
<script src="{{asset('backend')}}/js/vendor/Chart.bundle.min.js"></script>
<script src="{{asset('backend')}}/js/vendor/chartjs-plugin-rounded-bar.min.js"></script>
<script src="{{asset('backend')}}/js/vendor/jquery.barrating.min.js"></script>
<script src="{{asset('backend')}}/js/base/helpers.js"></script>
<script src="{{asset('backend')}}/js/base/globals.js"></script>
<script src="{{asset('backend')}}/js/base/nav.js"></script>
<script src="{{asset('backend')}}/js/base/search.js"></script>
<script src="{{asset('backend')}}/js/base/settings.js"></script>
<script src="{{asset('backend')}}/js/cs/charts.extend.js"></script>
<script src="{{asset('backend')}}/js/pages/dashboard.js"></script>
<script src="{{asset('backend')}}/js/common.js"></script>
<script src="{{asset('backend')}}/js/scripts.js"></script>
<script src="{{asset('backend')}}/js/vendor/select2.full.min.js"></script>

<script src="{{ asset('plugins/inputmask/jquery.mask.min.js')}}"></script>
<script src="{{asset("js/main.js")}}"></script>
 <script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>

<!-- Datatables-->
<script src="{{asset('template/vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('template/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('template/vendor/datatables.net-buttons/js/dataTables.buttons.js')}}"></script>
<script src="{{asset('template/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.js')}}"></script>
<script src="{{asset('template/vendor/datatables.net-buttons/js/buttons.colVis.js')}}"></script>
<script src="{{asset('template/vendor/datatables.net-buttons/js/buttons.flash.js')}}"></script>
<script src="{{asset('template/vendor/datatables.net-buttons/js/buttons.html5.js')}}"></script>
<script src="{{asset('template/vendor/datatables.net-buttons/js/buttons.print.js')}}"></script>
<script src="{{asset('template/vendor/datatables.net-keytable/js/dataTables.keyTable.js')}}"></script>
<script src="{{asset('template/vendor/datatables.net-responsive/js/dataTables.responsive.js')}}"></script>
<script src="{{asset('template/vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('backend')}}/js/vendor/bootstrap.bundle.min.js"></script> 


--}}


<script src="{{asset("plugins\sweetalerts2\sweetalert2.min.js")}}"></script>
<script src="{{asset('temp/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('temp/assets/vendor/lodash/lodash.min.js')}}"></script>
<script src="{{asset('temp/assets/js/theme-custom.js')}}"></script>
<script src="{{ asset('plugins\select2\select2.min.js')}}"></script>

{{-- <script src="{{ asset('plugins/datatable/datatables.min.js')}}"></script> --}}
<script src="{{ asset('plugins\inputmask\jquery.mask.min.js')}}"></script>
 <script src="{{asset('frontend')}}/cal/ion.rangeSlider.min.js"></script>
<script src="{{asset("js/main.js")}}"></script>


<script>
    (function ($) {
    'use strict';
    $(window).on('load', function () {
            $('#preloader')
                .delay(500)
                .fadeOut('slow', function () {
                    $(this).remove();
                });
            });
    })(window.jQuery);
    
    $(function() {
        active_item = "{{@$active_item}}";
        $("."+active_item + " .nav-link").addClass("active");
    });
</script>