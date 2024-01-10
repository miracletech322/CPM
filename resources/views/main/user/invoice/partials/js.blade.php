<script>
    
    var dTable = '';
    var wTable = '';

    $(function(){
        
        if ($('#datatables-deposit').length) {
            make_deposit_table();
            $('#datatables-deposit').on('draw.dt', function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        }

        if ($('#datatables-withdrawl').length) {
            make_withdrawl_table();
            $('#datatables-withdrawl').on('draw.dt', function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
            
            $(".search_box_withdrawl").keyup(function(){
                $('#pills-withdrawl input[type="search"]').val( $(".search_box_withdrawl").val() );
                $('#pills-withdrawl input[type="search"]').trigger("keyup");
            });

            $(".search_box_deposit").keyup(function(){
                $('#pills-deposit input[type="search"]').val( $(".search_box_deposit").val() );
                $('#pills-deposit input[type="search"]').trigger("keyup");
            });
        }
        

    });

    function make_deposit_table(){

        url = "{{ url('invoice-deposit-listing') }}";

        var table = $('#datatables-deposit');
        dTable = table.DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            iDisplayLength: 25,
            responsive: true,
            oLanguage: {
                sSearch: '<em class="fa fa-search"></em>',
                sLengthMenu: '_MENU_ {{__("records per page")}}',
                info: '{{__("Showing page")}} _PAGE_ {{__("of")}} _PAGES_',
                zeroRecords: '{{__("Nothing found - sorry")}}',
                infoEmpty: '{{__("No records available")}}',
                infoFiltered: '({{__("filtered from")}} _MAX_ {{__("total records")}})',
                oPaginate: {
                    sNext: '<em class="fa fa-caret-right"></em>',
                    sPrevious: '<em class="fa fa-caret-left"></em>'
                }
            },
            ajax: {
                "url": url,
                "type": "GET",
            },
            columns: [
                {data: 'transaction_date', name: 'created_at'},
                {data: 'transaction_id', name: 'transaction_id'},
                {data: 'payment_method', name: 'payment_method'},
                {data: 'total_paid', name: 'total_paid'},
                {data: 'hashing', name: 'hashing'},
                {data: 'power_bought', name: 'power_bought'},
                {data: 'action', name: 'action'}
            ],
            fnDrawCallback: function (oSettings) { dTable.page(oSettings.page) },
            "columnDefs": [
                {
                    "searchable":false,
                    "targets":[6]
                },
                {
                    "orderable":false,
                    "targets":[6]
                }
            ],
            "order": [
                [0,'desc']
            ],
        });

    }

    function print(){
        
        var divToPrint = document.getElementById('printable');
        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        header = `  <meta charset="UTF-8">
                    <meta name="description" content="">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                    <link rel="preconnect" href="{{asset('backend')}}/https://fonts.gstatic.com/">
                    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&amp;display=swap" rel="stylesheet">
                    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&amp;display=swap" rel="stylesheet">

                    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/style.css">
                    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/cal/adstyle_backend.css">
                    <link rel="stylesheet" href="{{asset('backend')}}/font/CS-Interface/style.css">

                    <link rel="stylesheet" href="{{asset('template/css/bootstrap.css')}}" id="bscss">
                    <link rel="stylesheet" href="{{asset('backend')}}/css/vendor/bootstrap.min.css">
                    <link rel="stylesheet" href="{{asset('backend')}}/css/vendor/OverlayScrollbars.min.css">
                    <link rel="stylesheet" href="{{asset('backend')}}/css/styles.css">
                    <link rel="stylesheet" href="{{asset('backend')}}/css/main.css">
                    <link rel="stylesheet" href="{{asset('backend')}}/css/vendor/font-awesome.min.css">
                    <link rel="stylesheet" href="{{asset('css/main.css')}}" rel="stylesheet" />
                    `;

        newWin.document.write('<html><head>'+header+'</head><body onload="window.print()"><div class=""><div class="row"><div class="col-md-12"><div class="card p-3 mt-5">' + divToPrint.innerHTML + '</div></div></div></div></body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();}, 3000);

    }

    function make_withdrawl_table(){

        url = "{{ url('invoice-withdrawl-listing') }}";

        var table = $('#datatables-withdrawl');
        wTable = table.DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            iDisplayLength: 25,
            responsive: true,
            oLanguage: {
                sSearch: '<em class="fa fa-search"></em>',
                sLengthMenu: '_MENU_ {{__("records per page")}}',
                info: '{{__("Showing page")}} _PAGE_ {{__("of")}} _PAGES_',
                zeroRecords: '{{__("Nothing found - sorry")}}',
                infoEmpty: '{{__("No records available")}}',
                infoFiltered: '({{__("filtered from")}} _MAX_ {{__("total records")}})',
                oPaginate: {
                    sNext: '<em class="fa fa-caret-right"></em>',
                    sPrevious: '<em class="fa fa-caret-left"></em>'
                }
            },
            ajax: {
                "url": url,
                "type": "GET",
            },
            columns: [
                {data: 'transaction_date', name: 'created_at'},
                {data: 'transaction_id', name: 'transaction_id'},
                {data: 'payment_method', name: 'payment_method'},
                {data: 'total_paid', name: 'total_paid'},
                {data: 'action', name: 'action'}
            ],
            fnDrawCallback: function (oSettings) { wTable.page(oSettings.page) },
            "columnDefs": [
                {
                    "searchable":false,
                    "targets":[4]
                },
                {
                    "orderable":false,
                    "targets":[4]
                }
            ],
            "order": [
                [0,'desc']
            ],
        });

    }

</script>
