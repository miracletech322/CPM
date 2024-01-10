@extends('layouts.auth.base')
@section('title') {{__("Password Reset")}} @endsection

@section('content')

<div class="simple-login-form rounded-12 shadow-dark-80 bg-white">
    <h2 class="mb-3">{{__("Password Reset")}}</h2>
    @include('shared.alerts')
    <form method="POST" action="{{ url('forgot-password') }}" class="pt-3">
        @csrf
        <div class="mb-4 pb-md-2">
            <label class="form-label form-label-lg" for="email">{{__("Email")}}</label>
            <input id="email" type="email" class="form-control form-control-xl" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{__("Email")}}">
        </div>
        
        <div class="d-grid">
            <button type="submit" class="btn btn-xl btn-warning">{{__("Reset")}}</button>
        </div>
        <div class="my-3 my-sm-4 d-flex">
            <a class="small text-gray-600 ms-auto mt-1" href="{{ route('login') }}">{{__("Back to login?")}}</a>
        </div>
    </form>
</div>
@endsection


@section('js')
@endsection

