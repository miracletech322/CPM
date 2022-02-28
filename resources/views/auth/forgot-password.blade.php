@extends('layouts.auth.base')
@section('title') Password Reset @endsection

@section('content')

<div class="simple-login-form rounded-12 shadow-dark-80 bg-white">
    <h2 class="mb-3">Password Reset</h2>
    @include('shared.alerts')
    <form method="POST" action="{{ url('forgot-password') }}" class="pt-3">
        @csrf
        <div class="mb-4 pb-md-2">
            <label class="form-label form-label-lg" for="email">Email</label>
            <input id="email" type="email" class="form-control form-control-xl" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
        </div>
        
        <div class="d-grid">
            <button type="submit" class="btn btn-xl btn-warning">Reset</button>
        </div>
        <div class="my-3 my-sm-4 d-flex">
            <div class="form-check form-check-sm mb-0">
                <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label ml-2 form-check-label small text-gray-600" for="remember" style="color: black;">
                    {{ __('Remember Me') }}
                </label>

            </div>
            <a class="small text-gray-600 ms-auto mt-1" href="{{ route('login') }}">Back to login?</a>
        </div>
    </form>
</div>
@endsection


@section('js')
@endsection

