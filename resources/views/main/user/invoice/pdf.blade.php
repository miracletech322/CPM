<!DOCTYPE html>
<html lang="en" class="loading">
<head>
    <style>
        body {
            font-family: 'Open+Sans', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            font-weight: 300;
            line-height: 1.5em;
            color: rgba(97, 97, 97, 0.87);
            min-height: 100vh;
        }

        body {
            margin: 0;
            font-family: 'Montserrat', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #F4F5FA;
        }

        body {
            display: block;
            margin: 8px;
        }

        article,
        aside,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        main,
        nav,
        section {
            display: block;
        }


        .row {
            display: flex;
            width: 100% !important;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }


        .col-1,
        .col-2,
        .col-3,
        .col-4,
        .col-5,
        .col-6,
        .col-7,
        .col-8,
        .col-9,
        .col-10,
        .col-11,
        .col-12,
        .col,
        .col-auto,
        .col-sm-1,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm,
        .col-sm-auto,
        .col-md-1,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-md-10,
        .col-md-11,
        .col-md-12,
        .col-md,
        .col-md-auto,
        .col-lg-1,
        .col-lg-2,
        .col-lg-3,
        .col-lg-4,
        .col-lg-5,
        .col-lg-6,
        .col-lg-7,
        .col-lg-8,
        .col-lg-9,
        .col-lg-10,
        .col-lg-11,
        .col-lg-12,
        .col-lg,
        .col-lg-auto,
        .col-xl-1,
        .col-xl-2,
        .col-xl-3,
        .col-xl-4,
        .col-xl-5,
        .col-xl-6,
        .col-xl-7,
        .col-xl-8,
        .col-xl-9,
        .col-xl-10,
        .col-xl-11,
        .col-xl-12,
        .col-xl,
        .col-xl-auto {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-12 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 100%;
            -moz-box-flex: 0;
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }

        div {
            display: block;
        }

        .p-3 {
            padding: 1.5rem !important;
        }


        .text-left {
            text-align: left !important;
        }

        .col-6 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 50%;
            -moz-box-flex: 0;
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-1,
        .col-2,
        .col-3,
        .col-4,
        .col-5,
        .col-6,
        .col-7,
        .col-8,
        .col-9,
        .col-10,
        .col-11,
        .col-12,
        .col,
        .col-auto,
        .col-sm-1,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm,
        .col-sm-auto,
        .col-md-1,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-md-10,
        .col-md-11,
        .col-md-12,
        .col-md,
        .col-md-auto,
        .col-lg-1,
        .col-lg-2,
        .col-lg-3,
        .col-lg-4,
        .col-lg-5,
        .col-lg-6,
        .col-lg-7,
        .col-lg-8,
        .col-lg-9,
        .col-lg-10,
        .col-lg-11,
        .col-lg-12,
        .col-lg,
        .col-lg-auto,
        .col-xl-1,
        .col-xl-2,
        .col-xl-3,
        .col-xl-4,
        .col-xl-5,
        .col-xl-6,
        .col-xl-7,
        .col-xl-8,
        .col-xl-9,
        .col-xl-10,
        .col-xl-11,
        .col-xl-12,
        .col-xl,
        .col-xl-auto {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }


        .list-unstyled {
            padding-left: 0;
            list-style: none;
        }

        .pl-0,
        .px-0 {
            padding-left: 0 !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 0 !important;
        }

        .pl-0,
        .px-0 {
            padding-left: 0 !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 0 !important;
        }


        ol,
        ul,
        dl {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .col-6 {
            -webkit-box-flex: 0;
            -webkit-flex: 0 0 50%;
            -moz-box-flex: 0;
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-1,
        .col-2,
        .col-3,
        .col-4,
        .col-5,
        .col-6,
        .col-7,
        .col-8,
        .col-9,
        .col-10,
        .col-11,
        .col-12,
        .col,
        .col-auto,
        .col-sm-1,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm,
        .col-sm-auto,
        .col-md-1,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-md-10,
        .col-md-11,
        .col-md-12,
        .col-md,
        .col-md-auto,
        .col-lg-1,
        .col-lg-2,
        .col-lg-3,
        .col-lg-4,
        .col-lg-5,
        .col-lg-6,
        .col-lg-7,
        .col-lg-8,
        .col-lg-9,
        .col-lg-10,
        .col-lg-11,
        .col-lg-12,
        .col-lg,
        .col-lg-auto,
        .col-xl-1,
        .col-xl-2,
        .col-xl-3,
        .col-xl-4,
        .col-xl-5,
        .col-xl-6,
        .col-xl-7,
        .col-xl-8,
        .col-xl-9,
        .col-xl-10,
        .col-xl-11,
        .col-xl-12,
        .col-xl,
        .col-xl-auto {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .text-right {
            text-align: right !important;
        }

        .pl-0,
        .px-0 {
            padding-left: 0 !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 0 !important;
        }

        .pl-0,
        .px-0 {
            padding-left: 0 !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 0 !important;
        }

        .pt-2,
        .py-2 {
            padding-top: 0.75rem !important;
        }

        @media (min-width: 576px) {
            .col-sm-12 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 100%;
                -moz-box-flex: 0;
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }


        .table {
            width: 100%;
            margin-bottom: 1.5rem;
            background-color: transparent;
        }

        table {
            border-collapse: collapse;
        }


        table {
            display: table;
            border-collapse: separate;
            box-sizing: border-box;
            text-indent: initial;
            border-spacing: 2px;
            border-color: grey;
        }

        thead {
            display: table-header-group;
            vertical-align: middle;
            border-color: inherit;
        }

        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #DEE2E6;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #DEE2E6;
        }

        th {
            text-align: inherit;
        }

        tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }

        td {
            display: table-cell;
            vertical-align: inherit;
        }

        .lead {
            font-size: 1.25rem;
            font-weight: 300;
        }

        .text-left {
            text-align: left !important;
        }

        .pt-2,
        .py-2 {
            padding-top: 0.75rem !important;
        }

        .pt-2,
        .py-2 {
            padding-top: 0.75rem !important;
        }


        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }

        .col-1,
        .col-2,
        .col-3,
        .col-4,
        .col-5,
        .col-6,
        .col-7,
        .col-8,
        .col-9,
        .col-10,
        .col-11,
        .col-12,
        .col,
        .col-auto,
        .col-sm-1,
        .col-sm-2,
        .col-sm-3,
        .col-sm-4,
        .col-sm-5,
        .col-sm-6,
        .col-sm-7,
        .col-sm-8,
        .col-sm-9,
        .col-sm-10,
        .col-sm-11,
        .col-sm-12,
        .col-sm,
        .col-sm-auto,
        .col-md-1,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-md-10,
        .col-md-11,
        .col-md-12,
        .col-md,
        .col-md-auto,
        .col-lg-1,
        .col-lg-2,
        .col-lg-3,
        .col-lg-4,
        .col-lg-5,
        .col-lg-6,
        .col-lg-7,
        .col-lg-8,
        .col-lg-9,
        .col-lg-10,
        .col-lg-11,
        .col-lg-12,
        .col-lg,
        .col-lg-auto,
        .col-xl-1,
        .col-xl-2,
        .col-xl-3,
        .col-xl-4,
        .col-xl-5,
        .col-xl-6,
        .col-xl-7,
        .col-xl-8,
        .col-xl-9,
        .col-xl-10,
        .col-xl-11,
        .col-xl-12,
        .col-xl,
        .col-xl-auto {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
        }

        @media (min-width: 768px) {
            .col-md-6 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 50%;
                -moz-box-flex: 0;
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        @media (min-width: 576px) {
            .col-sm-12 {
                -webkit-box-flex: 0;
                -webkit-flex: 0 0 100%;
                -moz-box-flex: 0;
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

    </style>

</head>

<body style="background-color: #fff;">
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" id="printable">
                        <div class="card-block">
                            <section class="invoice-template">
                                <div id="invoice-template" class="card-block" style="margin-top: 40px !important;">
                                    <div id="invoice-company-details" class="row" style="width: 100% !important; display: block !important;">
                                        <div class="col-6 text-left" style="width: 40% !important; display: inline-block !important; text-align:left !important;">
                                            <img src="{{@$setting->site_logo ? ( url('/').@$setting->site_logo ) : (asset('frontend') . '/images/logo1.svg')}}" alt="cloudminepool-logo" class="mb-2" width="200">
                                            <h3 style="margin-top: 10px !important;">{{__("INVOICE")}} # INV{{@$data['invoice_letter'].@$record->id}}</h3>
                                        </div>
                                        <div class="col-6 text-right" style="width: 40% !important; display: inline-block !important; float:right !important;">
                                            <h2 style="margin-top: -13px !important;">{{@$data['status']}}</h2>
                                            <p><b>{{@$data["date_title"]}}: </b>{{to_date(@$record->created_at)}}</p>
                                        </div>
                                    </div>

                                    <hr style="border: 0.5px solid grey !important; margin-top: -10px !important;  margin-bottom: 20px !important;">


                                    <div id="invoice-customer-details" class="row pt-2" style="width: 100% !important; display: block !important; margin-top:30px !important;">

                                        <div class="col-6 text-left" style="margin-left: 20px !important; width: 40% !important; display: inline-block !important; text-align:left !important;">
                                            <div class="col-sm-12 text-left">
                                                <p class="text-muted"><b>{{__("Invoice For")}}</b></p>
                                                <p class="mt-n3" style="margin-top: -1rem !important;">{{ucfirst(Auth::user()->first_name)}}</p>
                                            </div>

                                            <div class="col-sm-12 text-left">
                                                <p class="text-muted"><b>{{__("Total")}} {{$data['total']}}</b></p>
                                                <p class="mt-n3" style="margin-top: -1rem !important;">${{$data['cash']}}</p>
                                            </div>
                                        </div>



                                        <div class="col-6 text-right" style="margin-left: 10px !important; width: 42% !important; display: inline-block !important; text-align:right !important;">
                                            <div class="col-sm-12 text-right">
                                                <p class="text-muted"><b>{{$data['by']}}</b></p>
                                                <p class="mt-n3" style="margin-top: -1rem !important;">{{@$setting->site_name ? @$setting->site_name : "CloudMinePool"}}</p>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <p class="text-muted"><b>{{$data['method']}}</b></p>
                                                <p class="mt-n3" style="margin-top: -1rem !important;">{{$data['method_text']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div id="invoice-items-details" class="pt-2">

                                    <div class="row">
                                        <div class="table-responsive col-sm-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>{{$data['method']}}</th>
                                                        <th>{{__("Amount Paid")}}</th>
                                                        @if($type == "deposit")
                                                        <th>{{__("Hashing")}}</th>
                                                        <th>{{__("Power Bought")}}</th>
                                                        @endif
                                                        <th>{{__("Payment Date")}}</th>
                                                        <th>{{__("Transaction ID")}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{$data['method_text']}}</td>
                                                        <td>${{$data['cash']}}</td>
                                                        @if($type == "deposit")
                                                        <td>{{$record->hashings->name}}</td>
                                                        <td>{{to_power_format($record->energy_bought)." ". $record->coin->unit}}</td>
                                                        @endif
                                                        <td>{{to_date(@$record->created_at)}}</td>
                                                        <td>{{@$data['transaction_id']}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div style="width: 100% !important;">
                                        <div class="col-6 text-left" style="margin-left: 20px !important; width: 40% !important; display: inline-block !important; text-align:left !important;">
                                        </div>
                                        <div class="col-6 text-left" style="margin-left: 20px !important; width: 40% !important; display: inline-block !important;">
                                        <div>
                                            <h3>Total {{$data["total"]}}</h3>
                                            <div class="table-responsive" style="margin-left: -12px !important;">
                                                <table class="table">
                                                    <tbody>
                                                        {!! $data['table_data'] !!}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width: 100% !important; text-align: center !important;">
                                        Cloudminepool Services OÜ (16389069)<br>
                                        Harju maakond, Tallinn, Kesklinna linnaosa, Narva mnt 5, 10117
                                    </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
