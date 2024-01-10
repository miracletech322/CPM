@extends('layouts.main.base')

@section('title') {{__("Miners")}} @endsection

@section('content')
<div class="container-fluid px-0">

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <span class="text-uppercase tiny text-gray-600 Montserrat-font font-weight-semibold"><a href="{{url('miners')}}">{{__("Miners")}}</a></span>
                    <h1 class="h2 mb-0 lh-sm">{{__("Buy")}}</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="col-xxl-12 mb-4">
                <div class="mb-4">
                    <div class="row">
                        <div class="col-12">
                            @include("shared.alerts")
                        </div>
                        <form action="{{ url('pay/miners') }}" method="GET" files="true" enctype="multipart/form-data">
                            @csrf
                            @include($directory . "partials.calculator_form")
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('js')
@include(@$directory."partials.js")
@include('shared.calculator_js')
@endsection
