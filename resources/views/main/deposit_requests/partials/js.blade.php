<script>
    
    var oTable = '';
    var oPTable = '';

    $(function(){
        
        if ($('#datatables').length) {
            make_table();
            $('#datatables').on('draw.dt', function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        }

        if($('#processed_datatables').length){
            make_prcessed_table();
            $('#processed_datatables').on('draw.dt', function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        }

    });

    function make_table(){

        url = "{{ url('deposit-requests-listing') }}";

        var table = $('#datatables');
        oTable = table.DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            iDisplayLength: 25,
            responsive: true,
            oLanguage: {
                sSearch: '<em class="fa fa-search"></em>',
                sLengthMenu: '_MENU_ records per page',
                info: 'Showing page _PAGE_ of _PAGES_',
                zeroRecords: 'Nothing found - sorry',
                infoEmpty: 'No records available',
                infoFiltered: '(filtered from _MAX_ total records)',
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
                {data: 'fullname', name: 'fullname'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'payment_method', name: 'payment_method'},
                {data: 'date_requested', name: 'date_requested'},
                {data: 'cash_paid', name: 'cash_paid'},
                {data: 'hashing', name: 'hashing'},
                {data: 'action', name: 'action'},
            ],
            fnDrawCallback: function (oSettings) { oTable.page(oSettings.page) },
            "columnDefs": [
                {
                    "searchable":false,
                    "targets":[7]
                },
                {
                    "orderable":false,
                    "targets":[7]
                }
            ],
            "order": [
                [4,'desc']
            ],
        });

    }

    function make_prcessed_table(){

        url = "{{ url('processed-deposit-listing') }}";

        var table = $('#processed_datatables');
        oPTable = table.DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            iDisplayLength: 25,
            responsive: true,
            oLanguage: {
                sSearch: '<em class="fa fa-search"></em>',
                sLengthMenu: '_MENU_ records per page',
                info: 'Showing page _PAGE_ of _PAGES_',
                zeroRecords: 'Nothing found - sorry',
                infoEmpty: 'No records available',
                infoFiltered: '(filtered from _MAX_ total records)',
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
                {data: 'fullname', name: 'fullname'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'payment_method', name: 'payment_method'},
                {data: 'date_requested', name: 'date_requested'},
                {data: 'cash_paid', name: 'cash_paid'},
                {data: 'hashing', name: 'hashing'},
                {data: 'action_performer', name: 'action_performer'},
                {data: 'action_performed', name: 'action_performed'},
            ],
            fnDrawCallback: function (oSettings) { oPTable.page(oSettings.page) },
            "order": [
                [4,'desc']
            ],
        });

    }

</script>
