<script>
    
    var oTable = '';
    var oLTable = '';

    $(function(){
        
        if ($('#datatables').length) {
            make_table();
            $('#datatables').on('draw.dt', function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        }

        if ($('#ledger_datatables').length) {
            make_ledger_table();
            $('#ledger_datatables').on('draw.dt', function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        }

    });

    function make_table(){

        url = "{{ url('user-listing') }}";

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
                // {data: 'id', name: 'id'},
                {data: 'fullname', name: 'fullname'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'wallets', name: 'wallets'},
                {data: 'role_name', name: 'role_name'},
                {data: 'added_on', name: 'created_at'},
                {data: 'action', name: 'action'},
            ],
            fnDrawCallback: function (oSettings) { oTable.page(oSettings.page) },
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
                [5,'desc']
            ],
        });

    }


    function make_ledger_table(){

        @if(@$user)
        url = "{{ url('user-ledger-listing') .'/'. "$user->id" }}";
        @endif

        var table = $('#ledger_datatables');
        oLTable = table.DataTable({
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
                {data: 'wallet_amount', name: 'wallet_amount'},
                {data: 'amount', name: 'amount'},
                {data: 'hashing', name: 'hashing'},
                {data: 'type', name: 'type'},
                {data: 'transaction_by', name: 'transaction_by'},
                {data: 'transaction_code', name: 'transaction_code'},
                {data: 'action_by', name: 'action_by'},
                {data: 'action_at', name: 'action_performmed_at'},
            ],
            fnDrawCallback: function (oSettings) { oLTable.page(oSettings.page) },
            "order": [
                [7,'desc']
            ],
        });

    }

</script>
