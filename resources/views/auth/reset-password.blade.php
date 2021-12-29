@extends('layouts.auth.base')
@section('title')
Login
@endsection
@section("content")

@php
    $site_logo = "/template/img/logo.png";
    $settings = DB::table("settings")->first();
    if($settings){
        $site_logo = $settings->site_logo ? $settings->site_logo : $site_logo;
    }
@endphp


<div class="card card-flat">
    <div class="card-header text-center bg-dark"><a href="#"><img class="block-center rounded" height="40" src="{{url('/') . @$site_logo}}" alt="Image"></a></div>
    <div class="card-body">
        <p class="text-center py-2">RESET PASSWORD</p>
        @include('shared.alerts')
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="form-group">
                <div class="input-group with-focus">
                    <input class="form-control border-right-0" id="email" type="email" placeholder="Enter email" autocomplete="off" name="email" required>
                    <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-envelope"></em></span></div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group with-focus">
                    <input class="form-control border-right-0" id="password" name="password" type="password" placeholder="Password" required>
                    <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-lock"></em></span></div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group with-focus">
                    <input class="form-control border-right-0" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password" required>
                    <div class="input-group-append"><span class="input-group-text text-muted bg-transparent border-left-0"><em class="fa fa-lock"></em></span></div>
                </div>
            </div>

            <button class="btn btn-block btn-danger mt-3" type="submit">Reset Password</button>
        </form>
    </div>
</div><!-- END card-->
@endsection


@section('js')
@endsection
