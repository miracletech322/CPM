@extends('layouts.main.base')

@section('title') {{__("Miners")}} @endsection

@section('css')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

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
                                                                <b>{{__("Power")}} <span class="input-prefix"> {{$coin_data->unit}}</span></b>
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

                                <form action="{{ url('pay/miners') }}" class="ajax-form-success ajax-form-payment" data-success="{{url('miners')}}" method="POST" files="true" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-5 text-center">
                                        @include($directory . "partials.pay_form")
                                        <input type="hidden" name="payment_method" id="payment_method" value="1" />
                                        <input type="hidden" name="cash" id="cash" value="{{$cash}}" />
                                        <input type="hidden" name="hashing" id="hashing" value="{{$hashing}}" />

                                        {{-- For Card  --}}
                                        <input name='objId' id='objId' type='hidden'>
                                        <input name='isIntent' id='isIntent' type='hidden'>
                                        <button type="button" id='pay-button' class="btn btn-warning submit-btn btn-lg">{{@$form_button}}</button>
                                        <button type="submit" class="d-none">{{@$form_button}}</button>
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
<script>

    

    $(function(){
        setupStripeElement();
        $('#pay-button').on('click', function(){
            var obj = $(".ajax-form-payment");
            submit_payment_form(obj);
        });
    });

    var stripe;
    var card;
    function setupStripeElement(){
        stripe = Stripe('{{env("STRIPE_KEY")}}');
        var elements = stripe.elements();

        var style = {
            base: {
                color: '#32325d',
                fontFamily: 'Arial, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                color: '#aab7c4',
                },
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a',
            },
        };

        card = elements.create('card', {style: style});
        card.mount('#card-element');
    }

    function generateIntent(){
        var url = "{{url('stripe-intent')}}";
        $.get(url, function(clientSecret){

            stripe.confirmCardSetup(clientSecret, {
                    payment_method: {
                        card: card,
                        billing_details: {
                            // Additional billing details, if needed
                        },
                    },
                })
                .then(function(result) {

                    if (result.error) {
                        setAlert('{{__("Something went wrong. Try again!")}}', "error");
                        $('.submit-btn').removeAttr("disabled");
                    } else {

                        var url = "{{url('check-stripe-customer')}}";
                        $.get(url, function(response){
                            var setupIntentId = result.setupIntent.id;
                            var id_tip = 1;
                            if(response == 1){
                                setupIntentId = result.setupIntent.payment_method;
                                id_tip = 0;
                            }
                            sendObjIdToServer(setupIntentId, id_tip);
                        });
                    }
                });
        
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            setAlert('{{__("Something went wrong. Try again!")}}', "error");
            $('.submit-btn').removeAttr("disabled");
        });
    }

    function sendObjIdToServer(objID, isIntent) {
        $("#objId").val(objID)
        $("#isIntent").val(isIntent)
        $('.ajax-form-payment').submit();
    }

    function submit_payment_form(obj){
        obj.find('.submit-btn').attr("disabled", true);
        var type = $('input[name="payment_method"]').val();

        if(type == 1 && !$('#customer_transaction').is(':checked') ){ //Card
            generateIntent();
        }else{
            $('.ajax-form-payment').submit();
        }
    }
</script>
@include(@$directory."partials.js")
@endsection
