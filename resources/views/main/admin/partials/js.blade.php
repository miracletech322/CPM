<script>
    
    var oTable = '';
    $(function(){
        
        if ($('#datatables').length) {
            make_table();
            $('#datatables').on('draw.dt', function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        }

    });

    function make_table(){

        url = "{{ url('admin-listing') }}";

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
                {data: 'user_role', name: 'user_role'},
                {data: 'added_on', name: 'created_at'},
                {data: 'action', name: 'action'},
            ],
            fnDrawCallback: function (oSettings) { oTable.page(oSettings.page) },
            "columnDefs": [
                {
                    "searchable":false,
                    "targets":[5]
                },
                {
                    "orderable":false,
                    "targets":[5]
                }
            ],
            "order": [
                [4,'desc']
            ],
        });

    }

</script>
