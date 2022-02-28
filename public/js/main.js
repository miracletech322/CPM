var e=$("body")
$(function(){
    $('[data-toggle="minimize"]').on("click",function(){
        e.hasClass("sidebar-toggle-display")||e.hasClass("sidebar-absolute")?e.toggleClass("sidebar-hidden"):e.toggleClass("sidebar-icon-only")
    });

    $(".search_box").keyup(function(){
        $('input[type="search"]').val( $(".search_box").val() );
        $('input[type="search"]').trigger("keyup");
    });
})


$(function() {

    if ($('[data-daterangepicker]').length) {
        $('[data-daterangepicker]').daterangepicker({
            locale: {
                format: 'MM/DD/YYYY',
                firstDay:1
            },
        });
    };

    if ($(".mceEditor").length) {
        tinymce.init({
            theme: "modern",
            mode: "specific_textareas",
            editor_selector: "mceEditor",
            plugins: [
                "advlist autolink lists charmap preview hr pagebreak",
                "searchreplace wordcount visualblocks visualchars code",
                "nonbreaking save contextmenu directionality",
                "emoticons textcolor colorpicker textpattern imagetools moxiemanager",
                "contextmenu paste"
            ],

            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            // document_base_url : "{{url('/')}}",

            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            }
        });
    }


    if ($('.select2').length) {
        $(".select2").select2();
    }

    if ($('[data-toggle="tooltip"]').length) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    $('.ajax-form-success').on('submit', function(event) {
        event.preventDefault();
        url = $(this).prop("action");
        method = $(this).prop("method");
        form = new FormData(this);
        obj = this;
        submit_form(method, url, form, obj, true, true);
    });


    $('.ajax-form-relaod').on('submit', function(event) {
        event.preventDefault();
        url = $(this).prop("action");
        method = $(this).prop("method");
        $(".submit-btn").attr("disabled", true);
        form = new FormData(this);
        obj = this;
        submit_form(method, url, form, obj, true, false);
    });

    $('.ajax-form').on('submit', function(event) {
        event.preventDefault();
        url = $(this).prop("action");
        method = $(this).prop("method");
        form = new FormData(this);
        obj = this;
        submit_form(method, url, form, obj, false, false);
    });

    if ($('.card-mask').length){
        //$('.card-mask').mask("#,##0", {reverse: true});
        $('.card-mask').mask('ZZZZ ZZZZ ZZZZ ZZZZ', {
            translation: {
              'Z': {
                pattern: /[a-zA-Z0-9]/, optional: true
              }
            }
        });
    }

    if ($('.code').length){
        $('.code').mask('Z Z Z Z Z Z Z Z', {
            translation: {
              'Z': {
                pattern: /[a-zA-Z0-9]/, optional: true
              }
            }
        });
    }
           
   

});

function delete_record(url , msg=""){
    swal({
        title: "Are you sure?",
        text: msg ? msg : "You won't be able to recover this record?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        confirmButtonColor: "#ec6c62"
    }).then((result) => {        
        if(result == true || result == "true")
        {
            location.replace(url);
        }
    });
}



function goto_url(url, text){
    swal({
        title: "Are you sure?",
        text: text,
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonText: "Yes",
        confirmButtonColor: "#ec6c62"
    }).then((result) => {
        if(result == true || result == "true")
        {
            location.replace(url);
        }
    });
}

function submit_form(method, url, form, obj = null, reloadOnSuccess = false, gotoURL = false, btn_text="") {

    
    $(obj).find('.submit-btn').attr("disabled", true);
    btn_text == "" ? btn_text = $(obj).find('.submit-btn').text() : btn_text;
    $(obj).find('.submit-btn').text("Please Wait..");

    flow = true;
    $.ajax({

        url: url,
        type: method,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        data: form,
        success: function(response) {
            if (reloadOnSuccess === true) {
                reload_page = true;
            }

            if (gotoURL === true && (response === 1 || response === "1")) {
                window.location.replace($(obj).data("success"));
            }
            else if (gotoURL === true && (response === 2 || response === "2")) {
                location.reload();
            }
            else if (gotoURL === true && (response[0] === 2 || response[0] === "2")) {
                window.location.replace(response[1]);
                return;
            }


            $(".alert_div").html("");
            $.each(response, function(index, value) {
                // console.log(value)
                if (value.success) {
                    setAlert(value.success, "success", 1);
                } else if (value.error) {
                    setAlert(value.error, "error");
                }
            });

            $(obj).find('.submit-btn').removeAttr("disabled");
            $(obj).find('.submit-btn').text(btn_text);

        },
    }).fail(function(result) {
        $(".alert_div").html("");

        $(obj).find('.submit-btn').removeAttr("disabled");
        $(obj).find('.submit-btn').text(btn_text);

        if(result.responseJSON){
            if (result.responseJSON.errors) {
                msg = "";
                $.each(result.responseJSON.errors, function(index, value) {
                    msg += value[0];
                    msg += "<br>";
                });
                setAlert(msg, "error");
            } else {
                setAlert("Something went wrong. Try again!", "error");
            }
        }
    });
}


function copy_url(url){

    $(".alert_div").html("");
    var temp = $("<input>");
    $("body").append(temp);
    temp.val(url).select();
    document.execCommand("copy");
    temp.remove();

    data = '<div class="alert alert-success text-left">'
    data += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    data += "Link copied successfully";
    data += '</div>';
    $(".alert_div").append(data);
}


function show_global_modal(title, body){
    $(".global-modal-title").html(title);
    $(".global-modal-body").html(body);
    $('.global-modal').modal('show');
}

function hide_global_modal(){
    $('.global-modal').modal('hide');
}



function setAlert(msg, type, tip = 0) {
    if (type == "error") {
        data = '<div class="alert alert-danger text-left">'
        data += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        data += msg;
        data += '</div>';
        $(".alert_div").append(data);
        $(window).scrollTop(0);
    } else if (type == "success" && tip === 0) {

        $(window).scrollTop(0);
        setTimeout(function() {
            location.reload();
        }, 1200);

        swal({
            title: "Success!",
            text: msg,
            type: "success",
            timer: 1000,
            showConfirmButton: false
        });
    } else if (type == "success" && tip === 1) {
        data = '<div class="alert alert-success text-left">'
        data += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        data += msg;
        data += '</div>';
        $(".alert_div").append(data);
        $(window).scrollTop(0);
    }

    // close_all_alerts();
}