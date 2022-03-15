@extends('layouts.main.base')
@section('title') Invoice Detail @endsection
@section('content')
<div class="container-fluid px-0">
    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <span class="text-uppercase tiny text-gray-600 Montserrat-font font-weight-semibold"><a href="{{url('invoice')}}">Invoices</a></span>
                    <h1 class="h2 mb-0 lh-sm">Invoice Detail</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="col-xxl-12 mb-4">

                <div class="col-12 mb-5 py-3 py-lg-3">
                    <a class="btn btn-lg btn-warning cursor-pointer" onclick="print();">Print</a>
                    <a class="btn btn-lg btn-warning" href="{{url('invoice-pdf'.'/'.@$record->public_id)."?type=".$type}}">Download</a>
                </div>

                <div class="col-xxl-12 mb-4">

                    <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
                        <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
                            <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">{{ucfirst(Auth::user()->first_name)}}'s Invoice</h5>
                        </div>

                        <div class="card-body px-0 p-md-4">
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <div class="card card-default">

                                        <div class="card-body" id="printable">
                                            <div class="card-block">
                                                <section class="invoice-template">
                                                    <div id="invoice-template" class="card-block">
                                                        <div id="invoice-company-details" class="row">
                                                            <div class="col-6 text-left">
                                                                <img src="{{@$setting->site_logo ? ( url('/').@$setting->site_logo ) : (asset('frontend') . '/images/logo1.svg')}}" alt="folex-logo" class="mb-2" width="200">
                                                            </div>
                                                            <div class="col-6 text-right">
                                                                <h4>{{@$data['status']}}</h4>
                                                            </div>
                                                        </div>
                                                        <div id="invoice-company-details" class="row">
                                                            <div class="col-6 text-left mt-3">
                                                                <h4>INVOICE # INV{{@$data['invoice_letter'].@$record->id}}</h4>
                                                            </div>
                                                            <div class="col-6 text-right">
                                                                <p><b>{{@$data["date_title"]}}</b> {{to_date(@$record->created_at)}}</p>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div id="invoice-customer-details" class="row pt-2">

                                                            <div class="col-6 text-left">
                                                                <div class="col-sm-12 text-left">
                                                                    <p><b>Invoice For</b></p>
                                                                    <p class="mt-n3">{{ucfirst(Auth::user()->first_name)}}</p>
                                                                </div>

                                                                <div class="col-sm-12 text-left">
                                                                    <p><b>Total {{$data['total']}}</b></p>
                                                                    <p class="mt-n3">${{$data['cash']}}</p>
                                                                </div>
                                                            </div>


                                                            <div class="col-6 text-right">
                                                                <div class="col-sm-12 text-right">
                                                                    <p><b>{{$data['by']}}</b></p>
                                                                    <p class="mt-n3">{{@$setting->site_name ? @$setting->site_name : "Folex Mining"}}</p>
                                                                </div>
                                                                <div class="col-sm-12 text-right">
                                                                    <p><b>{{$data['method']}}</b></p>
                                                                    <p class="mt-n3">{{$data['method_text']}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div id="invoice-items-details" class="pt-2">
                                                        <div class="row">
                                                            <div class="table-responsive col-sm-12">
                                                                <table class="table">
                                                                    <thead class="primary-color">
                                                                        <tr>
                                                                            <th>{{$data['method']}}</th>
                                                                            <th>Amount Paid</th>
                                                                            @if($type == "deposit")
                                                                            <th>Hashing</th>
                                                                            <th>Power Bought</th>
                                                                            @endif
                                                                            <th>Payment Date</th>
                                                                            <th>Transaction ID</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>{{$data['method_text']}}</td>
                                                                            <td>${{$data['cash']}}</td>
                                                                            @if($type == "deposit")
                                                                            <td>{{$record->hashings->name}}</td>
                                                                            <td>{{to_power_format($record->energy_bought)." ". get_power_name($record->hashing_id)}}</td>
                                                                            @endif
                                                                            <td>{{to_date(@$record->created_at)}}</td>
                                                                            <td>{{@$data['transaction_id']}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                            </div>
                                                            <div class="col-md-6 col-sm-12 text-right">
                                                                <p class="lead">Total {{$data["total"]}}</p>
                                                                <div class="table-responsive float-right">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            {!! $data['table_data'] !!}
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-5">
                                                            <div class="col-sm-12 text-center">
                                                                Folex Services OÜ (16389069)<br>
                                                                Harju maakond, Tallinn, Kesklinna linnaosa, Narva mnt 5, 10117
                                                            </div>
                                                        </div>

                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
@include(@$directory."partials.js")
@endsection
