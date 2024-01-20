
@extends('emails.email_layout')


 @php
    $site_name = "CloudMinePool";
    $site_logo = '/frontend/images/logo1.svg';
    $settings = DB::table("settings")->first();
    if($settings){
        $site_name = $settings->site_name ? $settings->site_name : $site_name;
        $site_logo = @$settings->site_logo ? @$settings->site_logo : $site_logo;
    }
@endphp


@section('top_image')
    <img src="{{url("/").$site_logo}}" alt="{{@$site_name}}" height="50" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100%; border: none;">
@endsection


@section('header_name')
Hi {{@$email_data["to_name"]}},
@endsection


@section('text')
    <p>Your {{$site_name}} authentication code is: <b>{{ $email_data['code'] }}</b></p>
@endsection


@section('footer_name')
Regards,
<br>
{{$site_name}}
@endsection


@section('rights')
© {{date("Y")}} {{@$site_name}}. All rights reserved.
@endsection


