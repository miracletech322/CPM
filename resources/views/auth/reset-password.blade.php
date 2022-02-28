@extends('layouts.auth.base')
@section('title')
Reset Password
@endsection
@section("content")



<div class="container">
    <div class="simple-login-form rounded-12 shadow-dark-80 bg-white">
        <h2 class="mb-3">Reset Password</h2>
        @include('shared.alerts')
        <form method="POST" action="{{ route('password.update') }}" class="pt-3">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="mb-4 pb-md-2">
                <label class="form-label form-label-lg" for="email">Your email</label>
                <input id="email" type="email" class="form-control form-control-xl" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email">

            </div>
            <div class="mb-4 pb-md-2">
                <label class="form-label form-label-lg" for="password">Password</label>
                <input id="password" type="password" class="form-control form-control-xl" name="password" required autocomplete="new-password" placeholder="Password">
            </div>

            <div class="mb-4 pb-md-2">
                <label class="form-label form-label-lg" for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control form-control-xl" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-xl btn-warning">Reset Password</button>
            </div>
            <div class="border-top border-gray-200 pt-3 pt-sm-4 text-center">
                <a class="small text-gray-600 ms-auto mt-1" href="{{ route('login') }}">Back to login?</a>
            </div>
        </form>
    </div>
</div>
@endsection



@section('js')
@endsection