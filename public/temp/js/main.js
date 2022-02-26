$(function() {

    // if ($('[data-daterangepicker]').length) {
    //     $('[data-daterangepicker]').daterangepicker({
    //         locale: {
    //             format: 'DD-MM-YYYY',
    //             firstDay:1
    //         },
    //     });
    // };

    if ($('.select2').length) {
        $(".select2").select2({
            placeholder: "Select from options"
        });
    }

    if ($('[data-toggle="tooltip"]').length) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    $('.ajax-form-success').on('submit', function(event) {
        event.preventDefault();
        url = $(this).prop("action");
        method = $(this).prop("method");
        $(".submit-btn").attr("disabled", true);
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
        $(".submit-btn").attr("disabled", true);
        form = new FormData(this);
        obj = this;
        submit_form(method, url, form, obj, false, false);
    });

    // $('.liter-mask').mask("#,##0", {reverse: true});
    
    // $('.license-mask').mask('AAA-ZZZZZZZZZZ', {
    //     translation: {
    //       'Z': {
    //         pattern: /[a-zA-Z0-9]/, optional: true
    //       }
    //     }
    // });

    $(".search_box").keyup(function(){
        $('input[type="search"]').val( $(".search_box").val() );
        $('input[type="search"]').trigger("keyup");
    });

    

});


$(document).ready(function($){
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
});


function delete_record(url , msg=""){
    swal({
        title: "Are you sure?",
        text: msg ? msg : "You won't be able to recover this record?",
        icon: "warning",
        dangerMode: true,
        buttons: true,
        confirmButtonText: "Yes",
        confirmButtonColor: "#ec6c62",
        confirmButtonClass: "btn-danger"

    }).then((result) => {        
        if(result == true || result == "true")
        {
            location.replace(url);
        }
    });
}

function show_msg(msg){
    swal({
        title: "Notes",
        text: msg,
    });
}

function goto_url(url, text){
    swal({
        title: "Are you sure?",
        text: text,
        icon: "warning",
        dangerMode: true,
        buttons: true,
        closeOnConfirm: false,
        confirmButtonText: "Yes",
        confirmButtonColor: "#ec6c62",
        confirmButtonClass: "btn-danger"
    }).then((result) => {
        if(result == true || result == "true")
        {
            location.replace(url);
        }
    });
}

function submit_form(method, url, form, obj = null, reloadOnSuccess = false, gotoURL = false) {

    $(obj).find('.submit-btn').attr("disabled", true);
    btn_text = $(obj).find('.submit-btn').text();
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

    });
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
