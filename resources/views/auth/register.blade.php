@extends('layouts.auth.base')
@section('title') {{__("Register")}} @endsection

@section('content')




<div class="container">
    <div class="simple-login-form rounded-12 shadow-dark-80 bg-white">
        <h2 class="mb-3">{{__("Create Account")}}</h2>
        @include('shared.alerts')
        <form method="POST" action="{{ route('register') }}" class="pt-3">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4 pb-md-2">
                        <label class="form-label form-label-lg" for="first_name">{{__("First name")}}</label>
                        <input id="first_name" type="text" class="form-control form-control-xl" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="{{__("First name")}}">
                    </div>
                    <div class="col-md-6 mb-4 pb-md-2">
                        <label class="form-label form-label-lg" for="last_name">{{__("Last name")}}</label>
                        <input id="last_name" type="text" class="form-control form-control-xl" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="{{__("Last name")}}">
                    </div>
                </div>
                <div class="mb-4 pb-md-2">
                    <label class="form-label form-label-lg" for="email">{{__("Your email")}}</label>
                    <input id="email" type="email" class="form-control form-control-xl" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{__("Your Email")}}">

                </div>
                <div class="mb-4 pb-md-2">
                    <label class="form-label form-label-lg" for="password">{{__("Password")}}</label>
                    <input id="password" type="password" class="form-control form-control-xl" name="password" required autocomplete="new-password" placeholder="{{__("Password")}}">
                </div>

                <div class="mb-4 pb-md-2">
                    <label class="form-label form-label-lg" for="password-confirm">{{__("Confirm Password")}}</label>
                    <input id="password-confirm" type="password" class="form-control form-control-xl" name="password_confirmation" required autocomplete="new-password" placeholder="{{__("Confirm Password")}}">
                </div>


                <div class="d-grid">
                    <button type="submit" class="btn btn-xl btn-warning">{{__("Register")}}</button>
                </div>
                <div class="my-3 my-sm-4 d-flex pb-1">
                    <div class="form-check form-check-sm mb-0">
                        <input class="form-check-input" type="checkbox" id="cloudminepool_agreement" name="cloudminepool_agreement" {{ old('cloudminepool_agreement') ? 'checked' : '' }}>
                    </div>
                    <label class="form-check-label small text-gray-600" for="cloudminepool_agreement">
                        {{__("I agree to")}} <a href="{{url('terms')}}" target="_blank">{{__("terms and conditions")}}</a> {{__("of CloudMinePool")}}.
                    </label>
                </div>
                <div class="border-top border-gray-200 pt-3 pt-sm-4 text-center">
                    <span class="text-gray-700">{{__("Already have an account?")}} <a href="{{url('login')}}">{{__("Sign in")}}</a></span>
                </div>
            </form>
    </div>
</div>
@endsection



@section('js')
<script>
    $(function() {
        var searchParams = new URLSearchParams(window.location.search);
        var referral = localStorage.getItem('referral');
        if (searchParams.get("referral")) {
            referral = searchParams.get("referral")
            localStorage.setItem('referral', referral);
        }
        $('#referral').val(referral);
    });

</script>
@endsection
