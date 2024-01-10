<script>
    
    function set_payment_method(payment_method){
        $("#payment_method").val(payment_method);
    }

    var oTable = '';
    $(function(){
        
        if ($('#datatables').length) {
            make_table();
            $('#datatables').on('draw.dt', function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        }

    });

    function set_chargeby(){
        if(document.getElementById('customer_transaction').checked){
            $(".card-cpay").addClass("d-none");
        }else{
            $(".card-cpay").removeClass("d-none");
        }
    }

    function make_table(){

        url = "{{ url('miners-income-listing') }}";

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
                {data: 'power', name: 'power'},
                {data: 'income', name: 'income'},
                {data: 'coin_value', name: 'coin_value'},
                {data: 'date', name: 'action_performmed_at'},
            ],
            fnDrawCallback: function (oSettings) { oTable.page(oSettings.page) },
            "order": [
                [4,'desc']
            ],
        });

    }

</script>
