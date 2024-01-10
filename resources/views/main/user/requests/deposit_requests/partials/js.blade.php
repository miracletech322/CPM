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

        url = "{{ url('user-drequests-listing') }}";

        var table = $('#datatables');
        oTable = table.DataTable({
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
                {data: 'hashing', name: 'hashing'},
                {data: 'power_bought', name: 'power_bought'},
                {data: 'cash_paid', name: 'cash_paid'},
                {data: 'payment_method', name: 'payment_method'},
                {data: 'status', name: 'status'},
                {data: 'date_requested', name: 'created_at'},
            ],
            fnDrawCallback: function (oSettings) { oTable.page(oSettings.page) },
            "order": [
                [5,'desc']
            ],
        });

    }

   

</script>
