@extends('layouts.auth.base')
@section('title')
Reset Password
@endsection
@section("content")

@php
    $site_logo = "/template/img/logo.png";
    $settings = DB::table("settings")->first();
    if($settings){
        $site_logo = $settings->site_logo ? $settings->site_logo : $site_logo;
    }
@endphp



<section class="sub-page-banner parallax" id="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="page-banner text-center">
                    <h1 class="sub-banner-title">Reset Password</h1>
                    {{-- <ul>
                        <li><a href="LOGIN">Home</a></li>
                        <li>Signin</li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: black;">{{ __('Reset Password') }}</div>

    
                <div class="card-body">
                    @include('shared.alerts')
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $_GET['email'] }}" required autocomplete="off" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@endsection
