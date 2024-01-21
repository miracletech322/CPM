<script>
    
    var oTable = '';
    $(function(){
        
        if ($('#datatables').length) {
            make_table();
            $('#datatables').on('draw.dt', function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        }

        @if(@$is_show)
            $(".form-control").attr("disabled", true)
            $(".form-select").attr("disabled", true)
            $(":checkbox").attr("disabled", true)
            $(".fa-trash").parent().addClass("d-none");
            $(".add_new_product").addClass("d-none");
        @endif

    });

    function make_table(){

        url = "{{ url('coin-settings') }}";

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
                {data: 'coin', name: 'coin'},
                {data: 'hashings.name', name: 'hashings.name'},
                {data: 'unit', name: 'unit'},
                {data: 'is_active', name: 'is_active', render:(function(data, ind, obj){
                    return obj.is_active == 1 ? "<span class='text-success'><b>Active</b></span>" : "<span class='text-danger'><b>Inactive</b></span>";
                })},
                {data: 'action', name: 'action'}
            ],
            fnDrawCallback: function (oSettings) { oTable.page(oSettings.page) },
            "columnDefs": [
                {
                    "searchable": false,
                    "targets":[4]
                },
                {
                    "orderable": false,
                    "targets":[4]
                }
            ],
            "order": [
                [0,'asc']
            ],
        });

    }

</script>
