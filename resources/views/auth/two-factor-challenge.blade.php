@extends('layouts.auth.base')
@section('title') {{__("Authentication")}} @endsection

@section('content')



<div class="simple-login-form rounded-12 shadow-dark-80 bg-white">
    <h2 class="mb-3">{{__("Authentication")}}</h2>
    @include('shared.alerts')
    <div class="position-relative">
        <hr class="bg-gray-200 border-gray-200 opacity-100">
        <span class="position-absolute top-0 start-50 translate-middle text-gray-600 small bg-white px-2 px-xxl-4 text-nowrap">{{__("Please check your email for authentication code")}}</span>
    </div>
    <form action="{{ url('two-factor-challenge') }}" class="pt-3" data-success="{{url('miners')}}" method="POST" files="true" enctype="multipart/form-data">

        @csrf
        <div class="mb-4 pb-md-2">
            <label class="form-label form-label-lg" for="code">{{__("Code")}}</label>
            <input id="code" type="text" class="form-control form-control-xl" name="code" required autocomplete="code" autofocus placeholder="{{__("Enter 8 digit code")}}">

        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-xl btn-warning submit-btn">{{__("Confirm")}}</button>
        </div>
    </form>
</div>
@endsection
