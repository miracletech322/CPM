@extends('layouts.main.base')

@section('title') {{__("Miners")}} @endsection

@section('content')
<div class="container-fluid px-0">

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <span class="text-uppercase tiny text-gray-600 Montserrat-font font-weight-semibold"><a href="{{url('miners')}}">{{__("Miners")}}</a></span>
                    <h1 class="h2 mb-0 lh-sm">{{__("Pay")}}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="col-xxl-12 mb-4">
                <div class="mb-4 mb-xl-2">
                    <div class="mb-4">
                        <div class="mb-5 text-center">
                            <section class="calculate-earnings">
                                <div class="col-md-12">
                                    <section class="calculate-earnings container-fluid">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h2 class="calculate-earnings__title">{{__("Miner Payment")}}</h2>
                                                <h3 class="">({{$selected_hash}})</b></h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5 px-3 px-xxl-3 py-3">
                                                    <div class="calculate-earnings__calculator-data">
                                                        <div class="calculate-earnings__calculator-data-item">
                                                            <h4 class="calculate-earnings__calculator-data-title"><b>{{__("Investment in")}} $</b></h4>
                                                            <input type="text" style="box-shadow: 0 6px 20px rgb(0 0 0 / 5%); border: 1px solid #f2f2f2; border-radius: 5px;"  value="{{$cash}}" readonly class="calculate-earnings__calculator-data-input" id="data-input-price">
                                                        </div>

                                                        <div class="calculate-earnings__calculator-data-item" style="margin-right: 25px;">
                                                            <h4 class="calculate-earnings__calculator-data-title">
                                                                <b>{{__("Power")}} <span class="input-prefix"> {{$power_value_selected}}</span></b>
                                                            </h4>
                                                            <input type="text" style="box-shadow: 0 6px 20px rgb(0 0 0 / 5%); border: 1px solid #f2f2f2; border-radius: 5px;"  value="{{$p}}" readonly class="calculate-earnings__calculator-data-input" id="data-input-ghs">
                                                        </div>
                                                    </div>

                                                    <div class="calculate-earnings__calculator-results">
                                                        <div class="row" style="width: 100% !important;">
                                                            <div class="col-md-4 mb-1 pay_cal">
                                                                <div class="calculate-earnings__calculator-results-item">
                                                                    <h4 class="calculate-earnings__calculator-results-title">
                                                                        {{__("Income")}} <strong>{{__("per day")}}</strong>
                                                                    </h4>
                                                                    <p class="calculate-earnings__calculator-results-numbers" id="daily">${{to_cash_format_small($result["daily"])}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 mb-1 pay_cal">
                                                                <div class="calculate-earnings__calculator-results-item">
                                                                    <h4 class="calculate-earnings__calculator-results-title">
                                                                        {{__("Income")}} <strong>{{__("per month")}}</strong>
                                                                    </h4>
                                                                    <p class="calculate-earnings__calculator-results-numbers" id="month">${{to_cash_format_small($result["monthly"])}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 pay_cal">
                                                                <div class="calculate-earnings__calculator-results-item">
                                                                    <h4 class="calculate-earnings__calculator-results-title">
                                                                        {{__("Income")}} <strong>{{__("per year")}}</strong>
                                                                    </h4>
                                                                    <p class="calculate-earnings__calculator-results-numbers" id="year">${{to_cash_format_small($result["yearly"])}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <form action="{{ url('pay/miners') }}" class="ajax-form-success" data-success="{{url('miners')}}" method="POST" files="true" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-5 text-center">
                                        @include($directory . "partials.pay_form")
                                        <input type="hidden" name="payment_method" id="payment_method" value="1" />
                                        <input type="hidden" name="cash" id="cash" value="{{$cash}}" />
                                        <input type="hidden" name="hashing" id="hashing" value="{{$hashing}}" />
                                        <button type="submit" class="btn btn-warning submit-btn btn-lg">{{@$form_button}}</button>
                                    </div>
                                </form>
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
