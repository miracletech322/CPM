<script src="{{asset('temp/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('temp/assets/vendor/lodash/lodash.min.js')}}"></script>
<script src="{{asset('temp/assets/js/theme-custom.js')}}"></script>
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