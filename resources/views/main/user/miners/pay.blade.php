@extends('layouts.main.base')

@section('title') {{ $title_singular }} | Pay @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')

<div class="row mt-5">

    <div class="col-md-12 mb-2">
        <div class="d-flex">
            <h2 class="small-title me-2"><a href="{{url('miners')}}">Miners</a></h2>
            <div class="dropdown-as-select me-3 small-title">
                <i class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" aria-expanded="false">
                    <span class="small-title"></span>
                </i>
            </div>
            <h2 class="small-title">Pay</h2>
        </div>
    </div>

    <div class="col-md-12">
        <section class="calculate-earnings container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="calculate-earnings__title">Miner Payment</h2>
                    <h3 class="">({{$selected_hash}})</b></h3>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-md-12 ">

                        <div class="calculate-earnings__calculator-data">
                            <div class="calculate-earnings__calculator-data-item">
                                <h4 class="calculate-earnings__calculator-data-title">Investment in $</h4>
                                <input type="text" value="{{$cash}}" readonly class="calculate-earnings__calculator-data-input" id="data-input-price">
                            </div>

                            <div class="calculate-earnings__calculator-data-item">
                                <h4 class="calculate-earnings__calculator-data-title">
                                    Power <span class="input-prefix"> {{$power_value_selected}}</span>
                                </h4>
                                <input type="text" value="{{$p}}" readonly class="calculate-earnings__calculator-data-input" id="data-input-ghs">
                            </div>
                        </div>

                        <div class="calculate-earnings__calculator-results">
                            <div class="calculate-earnings__calculator-results-item">
                                <h4 class="calculate-earnings__calculator-results-title">
                                    Income <strong>per day</strong>
                                </h4>
                                <p class="calculate-earnings__calculator-results-numbers" id="daily">${{to_cash_format_small($result["daily"])}}</p>
                            </div>
                            <div class="calculate-earnings__calculator-results-item">
                                <h4 class="calculate-earnings__calculator-results-title">
                                    Income <strong>per month</strong>
                                </h4>
                                <p class="calculate-earnings__calculator-results-numbers" id="month">${{to_cash_format_small($result["monthly"])}}</p>
                            </div>
                            <div class="calculate-earnings__calculator-results-item">
                                <h4 class="calculate-earnings__calculator-results-title">
                                    Income <strong>per year</strong>
                                </h4>
                                <p class="calculate-earnings__calculator-results-numbers" id="year">${{to_cash_format_small($result["yearly"])}}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>


    <div class="col-md-12">
        <form action="{{ url('pay/miners') }}" class="ajax-form-success" data-success="{{url('miners')}}" method="POST" files="true" enctype="multipart/form-data">
            @csrf
            <div class="mb-5 text-center">
                @include($directory . "partials.pay_form")
                <input type="hidden" name="payment_method" id="payment_method" value="1" />
                <input type="hidden" name="cash" id="cash" value="{{$cash}}" />
                <input type="hidden" name="hashing" id="hashing" value="{{$hashing}}" />
                <button type="submit" class="btn btn-theme submit-btn">{{@$form_button}}</button>
            </div>
        </form>
    </div>
</div>

@endsection


@section('js')
@include(@$directory."partials.js")

@endsection
