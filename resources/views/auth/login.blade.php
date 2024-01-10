@extends('layouts.auth.base')
@section('title') {{__("Sign In")}} @endsection

@section('content')

<div class="simple-login-form rounded-12 shadow-dark-80 bg-white">
    <h2 class="mb-3">{{__("Sign in")}}</h2>
    @include('shared.alerts')
    <div class="position-relative">
        <hr class="bg-gray-200 border-gray-200 opacity-100">
        <span class="position-absolute top-0 start-50 translate-middle text-gray-600 small bg-white px-2 px-xxl-4 text-nowrap">{{__("Don't have an account?")}} <a href="{{url('register')}}" class="text-info-template">{{__("Register Now!")}}</a></span>
    </div>
    <form method="POST" action="{{ route('login') }}" class="pt-3">
        @csrf
        <div class="mb-4 pb-md-2">
            <label class="form-label form-label-lg" for="email">{{__("Email")}}</label>
            <input id="email" type="email" class="form-control form-control-xl" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{__("Email")}}">

        </div>
        <div class="mb-4 pb-md-2">
            <label class="form-label form-label-lg" for="password">{{__("Password")}}</label>
            <input id="password" type="password" class="form-control form-control-xl" name="password" required autocomplete="current-password" placeholder="{{__("Password")}}">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-xl btn-warning">{{__("Sign In")}}</button>
        </div>
        <div class="my-3 my-sm-4 d-flex">
            <div class="form-check form-check-sm mb-0">
                <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label ml-2 form-check-label small text-gray-600" for="remember" style="color: black;">
                    {{ __('Remember Me') }}
                </label>

            </div>
            <a class="small text-gray-600 ms-auto mt-1" href="{{ route('password.request') }}">{{__("Forgot password?")}}</a>
        </div>
    </form>
</div>

@endsection