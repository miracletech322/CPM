@extends('layouts.main.base')

@section('title') {{ $title_singular }} | Withdraw @endsection

@section('css')
<style type="text/css">
</style>
@endsection

@section('content')

<div class="row mt-5">

    <div class="col-md-12 mb-2">
        <div class="d-flex">
            <h2 class="small-title me-2"><a href="{{url('miners')}}">Withdraw payment</a></h2>
        </div>
    </div>
    <div class="col-md-12">
        <form action="{{ url('process-withdraw') }}" class="ajax-form-success" data-success="{{url('withdraw')}}" method="POST" files="true" enctype="multipart/form-data">
            @csrf
            <div class="mb-5 text-center">
                @include($directory . "partials.withdraw_form")
                <input type="hidden" name="payment_method" id="payment_method" value="1" />
                <button type="submit" class="btn btn-theme submit-btn">{{@$form_button}}</button>
            </div>
        </form>
    </div>
</div>

@endsection


@section('js')
@include(@$directory."partials.js")
@endsection