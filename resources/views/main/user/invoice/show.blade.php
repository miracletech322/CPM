@extends('layouts.main.base')

@section('title')
Invoice | Details
@endsection

@section('content')

<div class="row mt-5">
    
    <div class="col-md-12 mb-2">
        <div class="d-flex">
            <h2 class="small-title me-2"><a href="{{url('invoice')}}">Invoices</a></h2>
            <div class="dropdown-as-select me-3 small-title">
                <i class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" aria-expanded="false">
                    <span class="small-title"></span>
                </i>
            </div>
            <h2 class="small-title">Details</h2>
        </div>
    </div>

    <div class="col-md-12 mb-2">
        <div class="card card-default">
            
            <div class="card-body">
                <h4 class="card-title"> {{ucfirst(Auth::user()->first_name)}}'s Invoice </h4>
            </div>
            
            <div class="card-body">
                <div class="float-right" style="margin-top: -5.5rem !important;">
                    <a class="btn btn-primary text-white cursor-pointer btn-sm" onclick="print();">Print</a>
                    <a class="btn btn-info text-white cursor-pointer btn-sm" href="{{url('invoice-pdf'.'/'.@$record->public_id)."?type=".$type}}">Download</a>
                </div>
            </div>
            
            <div class="card-body" id="printable">
                <div class="card-block">
                    <section class="invoice-template">
                        <div id="invoice-template" class="card-block">
                            <div id="invoice-company-details" class="row">
                                <div class="col-6 text-left">
                                    <img src="{{@$setting->site_logo ? ( url('/').@$setting->site_logo ) : (asset('frontend') . '/images/logo.svg')}}" alt="folex-logo" class="mb-2" width="200">
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

                                <div class="col-md-6 col-sm-12">
                                    <p class="lead">Total {{$data["total"]}}</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                {!! $data['table_data'] !!}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@include(@$directory."partials.js")
@endsection
