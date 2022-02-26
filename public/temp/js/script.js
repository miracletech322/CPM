/*! Template: TokenWiz v1.0.3 */
(function($){
    'use strict';
    var $win = $(window), $body = $('body'), $doc = $(document);

    // Touch Class
    if (!("ontouchstart" in document.documentElement)) {
        $body.addClass("no-touch");
    }
    // Get Window Width
    function winwidth () {
        return $win.width();
    }
    var wwCurrent = winwidth();
    $win.on('resize', function () {
        wwCurrent = winwidth();
    });

    //Sticky Nav
    var $is_sticky = $('.is-sticky'), $topbar = $('.topbar'), $topbar_wrap = $('.topbar-wrap');
    if ($is_sticky.length > 0 ) {
        var $navm = $is_sticky.offset();
        $win.scroll(function(){
            var $scroll = $win.scrollTop(), $topbar_height = $topbar.height();
            if($scroll > $navm.top){
                if(!$is_sticky.hasClass('has-fixed')) {$is_sticky.addClass('has-fixed');$topbar_wrap.css('padding-top', $topbar_height);}

            } else {
                if($is_sticky.hasClass('has-fixed')) {$is_sticky.removeClass('has-fixed');$topbar_wrap.css('padding-top', 0);}
            }
        });
    }

    //Data Percent
    var $data_percent = $('[data-percent]');
    if($data_percent.length > 0){
        $data_percent.each(function() {
            var $this = $(this), $this_percent = $this.data('percent');
            $this.css('width', $this_percent + '%');
        });
    }

    // Active page menu when click
    var CurURL = window.location.href, urlSplit = CurURL.split("#");
    var $nav_link = $("a");
    if ($nav_link.length > 0) {
        $nav_link.each(function() {
            if (CurURL === (this.href) && (urlSplit[1]!=="")) {
                $(this).closest("li").addClass("active").parent().closest("li").addClass("active");
            }
        });
    }

    // Countdown Clock
    var $count_token_clock = $('.countdown-clock');
    if ($count_token_clock.length > 0 ) {
        $count_token_clock.each(function() {
            var $self = $(this), datetime = $self.attr("data-date");
            $self.countdown(datetime).on('update.countdown', function(event) {
                $(this).html(event.strftime('<div><span class="countdown-time countdown-time-first">%D</span><span class="countdown-text">Day</span></div>' + '<div><span class="countdown-time">%H</span><span class="countdown-text">Hour</span></div>' + '<div><span class="countdown-time">%M</span><span class="countdown-text">Min</span></div>' + '<div><span class="countdown-time countdown-time-last">%S</span><span class="countdown-text">Sec</span></div>'));
            });
        });
    }

    // Select
    var $select = $('.select');
    if ($select.length > 0) {
        $select.each(function() {
            var $this = $(this);
            $this.select2({
                theme: "flat"
            });
        });
    }
    var $select_bdr = $('.select-bordered');
    if ($select_bdr.length > 0) {
        $select_bdr.each(function() {
            var $this = $(this);
            $this.select2({
                theme: "flat bordered"
            });
        });
    }

    // Toggle section On click
    var _trigger = '.toggle-tigger', _toggle = '.toggle-class';

    if ($(_trigger).length > 0 ) {
        $doc.on('click', _trigger, function(e){
            var $self = $(this);
            $(_trigger).not($self).removeClass('active');
            $(_toggle).not($self.parent().children()).removeClass('active');
            $self.toggleClass('active').parent().find(_toggle).toggleClass('active');
            e.preventDefault();
        });
    }

    $doc.on('click', 'body', function(e){
        var $elm_tig = $(_trigger), $elm_tog = $(_toggle);
        if (!$elm_tog.is(e.target) && $elm_tog.has(e.target).length===0 &&
            !$elm_tig.is(e.target) && $elm_tig.has(e.target).length===0) {
            $elm_tog.removeClass('active');
            $elm_tig.removeClass('active');
        }
    });

    // Mobile Nav
    var $toggle_nav = $('.toggle-nav'),  $navbar = $('.navbar');
    if($toggle_nav.length > 0){
        $toggle_nav.on('click', function(e){
            $toggle_nav.toggleClass('active');
            $navbar.toggleClass('active');
            e.preventDefault();
        });
    }
    $doc.on('click', 'body', function(e){
        if (!$toggle_nav.is(e.target) && $toggle_nav.has(e.target).length===0 &&
            !$navbar.is(e.target) && $navbar.has(e.target).length===0) {
            $toggle_nav.removeClass('active');
            $navbar.removeClass('active');
        }
    });

    function activeNav(navbar){
        if(wwCurrent < 991){
            navbar.delay(500).addClass('navbar-mobile');
        }else{
            navbar.delay(500).removeClass('navbar-mobile');
        }
    }
    activeNav($navbar);
    $win.on('resize', function () {
        activeNav($navbar);
    });


    // Tooltip
    var $tooltip = $('[data-toggle="tooltip"]');
    if($tooltip.length > 0){
        $tooltip.tooltip();
    }

    // Date Picker
    var $date_picker = $('.date-picker'), $date_picker_dob = $('.date-picker-dob'), $time_picker = $('.time-picker');
    if($date_picker.length > 0){
        $date_picker.each(function(){
            $(this).datepicker({
                format: "mm/dd/yyyy",
                maxViewMode: 2,
                clearBtn: true,
                autoclose: true,
                todayHighlight: true
            });
        });
    }
    if($date_picker_dob.length > 0){
        $date_picker_dob.each(function(){
            $(this).datepicker({
                format: "mm/dd/yyyy",
                startView: 2,
                maxViewMode: 2,
                clearBtn: true,
                autoclose: true
            });
        });
    }
    // Time Picker
    if($time_picker.length > 0){
        $time_picker.each(function(){
            $(this).parent().addClass('has-timepicker');
            $(this).timepicker({
                timeFormat: 'HH:mm',
                interval: 15
            });
        });
    }


    //Copy Text to Clipboard
    function copytoclipboard(triger,action,feedback){
        var supportCopy = document.queryCommandSupported('copy'), $triger = triger, $action = action, $feedback = feedback;

        $triger.parent().find($action).removeAttr('disabled').select();
        if (supportCopy===true) {

            document.execCommand("copy");
            $feedback.text('Copied to Clipboard').fadeIn().delay(1000).fadeOut();
            $triger.parent().find($action).attr('disabled', 'disabled');
        } else {
            window.prompt("Copy to clipboard: Ctrl+C or Command+C, Enter", text);
        }

    }

    // Copyto clipboard Feedback Function
    function feedback (el, state) {
        if (state==='success'){
            $(el).parent().find('.copy-feedback').text('Copied to Clipboard').fadeIn().delay(1000).fadeOut();
        } else {
            $(el).parent().find('.copy-feedback').text('Faild to Copy').fadeIn().delay(1000).fadeOut();
        }
    }
    // Copyto clipboard
    var clipboard = new ClipboardJS('.copy-clipboard');
    clipboard.on('success', function(e) {
        feedback(e.trigger, 'success'); e.clearSelection();
    }).on('error', function(e) {
        feedback(e.trigger, 'fail');
    });

    // Copyto clipboard In Modal
    var clipboardModal = new ClipboardJS('.copy-clipboard-modal', {
        container: document.querySelector('.modal')
    });
    clipboardModal.on('success', function(e) {
        feedback(e.trigger, 'success'); e.clearSelection();
    }).on('error', function(e) {
        feedback(e.trigger, 'fail');
    });


    //File Input
    var $input_file = $('.input-file');
    if($input_file.length > 0){
        $input_file.each(function(){
            var $this = $(this), $thislabel = $(this).next(), $thislabeltext = $(this).next().text();
            $this.on('change', function(){
                var $thisval = $this.val();
                $thislabel.html($thisval);
                if ($thislabel.is(':empty')){
                    $thislabel.html($thislabeltext);
                }
            });
        });
    }

    // Dropzone
    var $upload_zone = $('.upload-zone');
    if ($upload_zone.length > 0 ) {
        Dropzone.autoDiscover = false;
        $upload_zone.each(function(){
            var $self = $(this);
            $self.addClass('dropzone').dropzone({ url: "/images" });
        });
    }

    //magnificPopup	Content
    var $image_popup = $('.image-popup');
    if ($image_popup.length > 0 ) {
        $image_popup.magnificPopup({
            type: 'image',
            preloader: true,
            removalDelay: 400,
            mainClass: 'mfp-fade'
        });
    }

    // Data Tables
    // var $data_table = $('.dt-init');
    // if($data_table.length > 0){
    //     $data_table.DataTable({
    //         "ordering": false,
    //         "autoWidth": false,
    //         "dom":'<t><"row align-items-center"<"col-sm-6 text-left"p><"col-sm-6 text-sm-right"i>>',
    //         "pageLength": 5,
    //         "bPaginate" : $('.data-table tbody tr').length>5,
    //         "iDisplayLength": 5,
    //         "language": {
    //             "search": "",
    //             "searchPlaceholder": "Type in to Search",
    //             "info": "_START_ -_END_ of _TOTAL_",
    //             "infoEmpty": "No records",
    //             "infoFiltered": "( Total _MAX_  )",
    //             "paginate": {
    //                 "first":      "First",
    //                 "last":       "Last",
    //                 "next":       "Next",
    //                 "previous":   "Prev"
    //             },
    //         },
    //     });
    // }


    // var $data_table_filter = $('.dt-filter-init');
    // if($data_table_filter.length > 0){
    //     var $data_table_fltr = $data_table_filter.DataTable({
    //         "ordering": false,
    //         autoWidth: false,
    //         "dom":'<"row justify-content-between pdb-1x"<"col-9 col-sm-6 col-md-12 text-left"f><"col-3 text-right">><t><"row align-items-center"<"col-sm-6 text-left"p><"col-sm-6 text-sm-right"i>>',
    //         "pageLength": 6,
    //         "bPaginate" : $('.data-table tbody tr').length>6,
    //         "iDisplayLength": 6,
    //         "language": {
    //             "search": "",
    //             "searchPlaceholder": "Type in to Search",
    //             "info": "_START_ -_END_ of _TOTAL_",
    //             "infoEmpty": "No records",
    //             "infoFiltered": "( Total _MAX_  )",
    //             "paginate": {
    //                 "first":      "First",
    //                 "last":       "Last",
    //                 "next":       "Next",
    //                 "previous":   "Prev"
    //             },
    //         },
    //     });
           // "dom":'<"row justify-content-between pdb-1x"<"col-9 col-sm-6 col-md-12 text-left"f><"col-3 text-right"<"data-table-filter relative d-inline-block">>><t><"row align-items-center"<"col-sm-6 text-left"p><"col-sm-6 text-sm-right"i>>',
        // $(".data-table-filter")
        // .append('<a href="#" class="btn btn-light-alt btn-xs btn-icon toggle-tigger"> <em class="ti ti-settings"></em> </a><div class="toggle-class toggle-datatable-filter dropdown-content dropdown-content-top-left text-left"><ul class="pdt-1x pdb-1x"><li class="pd-1x pdl-2x pdr-2x"> <input class="data-filter input-checkbox input-checkbox-sm" type="radio" name="filter" id="all" checked value=""> <label for="all">All</label></li><li class="pd-1x pdl-2x pdr-2x"> <input class="data-filter input-checkbox input-checkbox-sm" type="radio" name="filter" id="approved" value="approved"> <label for="approved">Approved</label></li><li class="pd-1x pdl-2x pdr-2x"> <input class="data-filter input-checkbox input-checkbox-sm" type="radio" name="filter" value="pending" id="pending"> <label for="pending">Pending</label></li><li class="pd-1x pdl-2x pdr-2x"> <input class="data-filter input-checkbox input-checkbox-sm" type="radio" name="filter" value="progress" id="progress"> <label for="progress">Progress</label></li><li class="pd-1x pdl-2x pdr-2x"> <input class="data-filter input-checkbox input-checkbox-sm" type="radio" name="filter" value="cancled" id="cancled"> <label for="cancled">Cancled</label></li></ul></div>');

        // var $data_filter = $('.data-filter');
        // $data_filter.on('change', function(){
        //     var _thisval = $(this).val();
        //     $data_table_fltr.columns('.dt-tnxno').search( _thisval ? _thisval : '', true, false ).draw();
        // });

        // $('#locations tbody').on('click', function () {
        //     console.log($(this).find('tr').data('href'));
        //     // if($(this).find('tr').data('href')) {
        //     //    window.location.href = $(this).find('tr').data('href');
        //     // }
        // } );
    // }

    // Line Chart
    var lineChart = 'tknSale';
    if ($('#'+lineChart).length > 0) {
        var lineCh = document.getElementById(lineChart).getContext("2d");

        var chart = new Chart(lineCh, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["01 Oct", "02 Oct", "03 Oct", "04 Oct", "05 Oct", "06 Oct", "07 Oct"],
                datasets: [{
                    label: "",
                    tension:0.4,
                    backgroundColor: 'transparent',
                    borderColor: '#2c80ff',
                    pointBorderColor: "#2c80ff",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 2,
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "#2c80ff",
                    pointHoverBorderWidth: 2,
                    pointRadius: 6,
                    pointHitRadius: 6,
                    data: [110, 80, 125, 55, 95, 75, 90],
                }]
            },

            // Configuration options go here
            options: {
                legend: {
                    display: false
                },
                maintainAspectRatio: false,
                tooltips: {
                    callbacks: {
                        title: function(tooltipItem, data) {
                            return 'Date : ' + data['labels'][tooltipItem[0]['index']];
                        },
                        label: function(tooltipItem, data) {
                            return data['datasets'][0]['data'][tooltipItem['index']] + ' Tokens' ;
                        }
                    },
                    backgroundColor: '#eff6ff',
                    titleFontSize: 13,
                    titleFontColor: '#6783b8',
                    titleMarginBottom:10,
                    bodyFontColor: '#9eaecf',
                    bodyFontSize: 14,
                    bodySpacing:4,
                    yPadding: 15,
                    xPadding: 15,
                    footerMarginTop: 5,
                    displayColors: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            fontSize:12,
                            fontColor:'#9eaecf',

                        },
                        gridLines: {
                            color: "#e5ecf8",
                            tickMarkLength:0,
                            zeroLineColor: '#e5ecf8'
                        },

                    }],
                    xAxes: [{
                        ticks: {
                            fontSize:12,
                            fontColor:'#9eaecf',
                            source: 'auto',
                        },
                        gridLines: {
                            color: "transparent",
                            tickMarkLength:20,
                            zeroLineColor: '#e5ecf8',
                        },
                    }]
                }
            }
        });
    }

    // Bootstrap Modal Fix
    var $modal = $('.modal');
    $modal.on('shown.bs.modal', function () {
        if(!$body.hasClass('modal-open'))  {
            $body.addClass('modal-open');
        }
    });

    // Dropdown
    var $drop_toggle = $('.drop-toggle');
    if ($drop_toggle.length > 0 ) {
        $drop_toggle.on("click",function(e){
            if ($win.width() < 991) {
                $(this).parent().children('.navbar-dropdown').slideToggle(400);
                $(this).parent().siblings().children('.navbar-dropdown').slideUp(400);
                $(this).parent().toggleClass('current');
                $(this).parent().siblings().removeClass('current');
                e.preventDefault();
            }
        });
    }

    // Form validation
    var $form_validate = $('.form-validate');
    if ($form_validate.length > 0) {
        $form_validate.each(function(){
            var $self = $(this);
            $self.validate();
        });
    }

    // Form Wizerd
    // var $wizard = $(".wizard-wrap").show();
    // $wizard.steps({
    //     headerTag: ".wizard-head",
    //     bodyTag: ".wizard-content",
    //     labels: {
    //         finish: "Submit",
    //         next: "Next",
    //         previous: "Prev",
    //         loading: "Loading ..."
    //     },
    //     onStepChanging: function (event, currentIndex, newIndex)
    //     {
    //         // Allways allow previous action even if the current form is not valid!
    //         if (currentIndex > newIndex)
    //         {
    //             return true;
    //         }
    //         // Needed in some cases if the user went back (clean up)
    //         if (currentIndex < newIndex)
    //         {
    //             // To remove error styles
    //             $wizard.find(".body:eq(" + newIndex + ") label.error").remove();
    //             $wizard.find(".body:eq(" + newIndex + ") .error").removeClass("error");
    //         }
    //         $wizard.validate().settings.ignore = ":disabled,:hidden";
    //         return $wizard.valid();
    //     },
    //     onFinishing: function (event, currentIndex)
    //     {
    //         $wizard.validate().settings.ignore = ":disabled";
    //         return $wizard.valid();
    //     },
    //     onFinished: function (event, currentIndex){window.location.href = "thank-you.html";}
    //
    // }).validate({
    //     errorPlacement: function errorPlacement(error, element) { element.after(error); }
    // });


    var $toastr_bottom_right = $('.toastr-success');
    if ($toastr_bottom_right.length > 0 ) {
        $toastr_bottom_right.on("click", function(){
            toastr.clear();
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": true,
                "showDuration": "1000",
                "hideDuration": "10000",
                "timeOut": "2000",
                "extendedTimeOut": "1000"
            };
            toastr.success('Success');
        });
    }

    var $equipmentForm = $('form.equipment');
    var $addPadBtn = $equipmentForm.find('#addPads');
    var $removePadBtn = $equipmentForm.find('#removePads');
    var $formPads = 0;

    $addPadBtn.on('click', function(e) {
        e.preventDefault();
        $formPads++;
        console.log($formPads);
    });

    $removePadBtn.on('click', function(e) {
        e.preventDefault();
        if($formPads !== 0){
            $formPads--;
        }
        console.log($formPads);
    });


    $('.setLoading').on('click', function(e) {

        let $this = $(this);
        let $text = $this.text();
        $(this).prop('disabled',true);

        $this.addClass("disabled").text("").html("<i class='fa fa-spin fa-spinner fa-spin m-0'></i> Loading");

        setTimeout(function() {
            $this.html("").text($text).removeClass("disabled");
        }, 10000);
    });

    $('form').on('submit', function(e) {
        let $this = $(this);
        let $button = $this.find(':submit');
        let $text = $button.text();
        // e.preventDefault();

        $button.addClass("disabled").text("").html("<i class='fa fa-spin fa-spinner fa-spin m-0'></i> Loading").attr('disabled','disabled');

        setTimeout(function() {
            $button.html("").text($text).removeClass("disabled").removeAttr('disabled');
        }, 15000);
    });





    // Load Array
    // Add to array
    // Subtract from array
    //


    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
    }

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    })

    // Fix for browsers that do not support date inputs
    if ( $('[type="date"]').prop('type') != 'date' ) {
        $('[type="date"]').datepicker();
    }


})(jQuery);
