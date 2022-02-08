@extends('layouts.auth.base')
@section('title')
Password Reset
@endsection

@php
    $site_logo = "/template/img/logo.png";
    $settings = DB::table("settings")->first();
    if($settings){
        $site_logo = $settings->site_logo ? $settings->site_logo : $site_logo;
    }
@endphp

@section('content')
<section class="sub-page-banner parallax" id="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="page-banner text-center">
                    <h1 class="sub-banner-title">Password Reset</h1>
                    <p class="text-center">Fill with your mail to receive instructions on how to reset your password.</p>
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
                <div class="card-header" style="color: black;">
                    {{ __('Password Reset') }}
                </div>

                <div class="card-body">
                    @include('shared.alerts')
                    <form method="POST" action="{{ url('forgot-password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="color: black;">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-link">
                                    {{ __('Reset') }}
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

