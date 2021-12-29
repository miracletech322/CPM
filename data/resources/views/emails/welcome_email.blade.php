
@extends('emails.email_layout')


 @php
    $site_name = "JoinCPR";
    $site_logo = "";
    $settings = DB::table("settings")->first();
    if($settings){
        $site_name = $settings->site_name;
        $site_logo = $settings->site_logo;
    }
@endphp


@section('top_image')
    <img src="{{env("APP_URL").$site_logo }}" alt="{{@$site_name}}" height="50" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100%; border: none;">
@endsection


@section('header_name')
Hi {{@$email_data["to_name"]}},
@endsection


@section('text')
    <p>
        Welcome to JoinCPR. Please find information about your new portal below. If you have any questions, please feel free to reach us via email at <i>support@joincpr.com</i>  by phone at <i>(888) 966-5934</i> or submitting a ticket at <a href='https://support.joincpr.com'>https://support.joincpr.com</a>
        <br><br>
        <b>Company Dashboard:</b> <a href="{!! @$email_data["subdomain"] !!}">{{@$email_data["subdomain"]}}</a> or <a href="https://dashboard.joincpr.com/login">https://dashboard.joincpr.com/login</a>
        <br>
        <b>Email:</b> {{@$email_data["to"]}}
    </p>
@endsection


@section('footer_name')
Regards,
<br>
{{$site_name}}
@endsection


@section('rights')
© {{date("Y")}} {{@$site_name}}. All rights reserved.
@endsection


