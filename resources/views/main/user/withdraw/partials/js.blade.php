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

    function option_changed(_val, _class, _url){
        $("."+_class).html("");
        $.get((_url+"/"+_val), function(response){
            $("."+_class).html(response);
        });
    }

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
