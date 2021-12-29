<script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset("plugins\sweetalerts2\sweetalert2.min.js")}}"></script>
<script src="{{asset('/plugins/tiny_mce/tinymce.min.js')}}"></script>
<script src="{{ asset('plugins\select2\select2.min.js')}}"></script>
<script src="{{asset("plugins/moment/moment.min.js")}}"></script>
<script src="{{asset("js/main.js")}}"></script>
<script src="{{ asset('plugins/inputmask/jquery.mask.min.js')}}"></script>



<script src="{{asset('template/vendor/modernizr/modernizr.custom.js')}}"></script><!-- STORAGE API-->
<script src="{{asset('template/vendor/js-storage/js.storage.js')}}"></script><!-- SCREENFULL-->
<script src="{{asset('template/vendor/screenfull/dist/screenfull.js')}}"></script><!-- i18next-->
<script src="{{asset('template/vendor/i18next/i18next.js')}}"></script>
<script src="{{asset('template/vendor/i18next-xhr-backend/i18nextXHRBackend.js')}}"></script>
<script src="{{asset('template/vendor/popper.js/dist/umd/popper.js')}}"></script>
<script src="{{asset('template/vendor/bootstrap/dist/js/bootstrap.js')}}"></script><!-- =============== PAGE VENDOR SCRIPTS ===============-->
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
<script src="{{asset('template/vendor/jszip/dist/jszip.js')}}"></script>
<script src="{{asset('template/vendor/pdfmake/build/pdfmake.js')}}"></script>
<script src="{{asset('template/vendor/pdfmake/build/vfs_fonts.js')}}"></script><!-- =============== APP SCRIPTS ===============-->
<script src="{{asset('template/js/app.js')}}"></script>



<script>
    (function($) {
        'use strict';
        $(window).on('load', function() {
            $('#preloader')
                .delay(500)
                .fadeOut('slow', function() {
                    $(this).remove();
                });
        });
    })(window.jQuery);

    $(function() {
        active_item = "{{@$active_item}}";
        $("."+active_item).addClass("active");
    });
</script>
