
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
    @if(!blank($email_data["business_logo"]))
        <img src="{{env("APP_URL").$email_data["business_logo"] }}" alt="{{$email_data["business_name"]}}" height="50" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100%; border: none;">
    @else
        <h2>{{$email_data["business_name"]}}</h2>
    @endif
@endsection


@section('header_name')
Hi {{@$email_data["to_name"]}},
@endsection


@section('text')
    <p>
        A new student has enrolled in the {{$email_data["class"]}} on {{$email_data["date"]}}. Please find all the details below.
        <br>
        <br>
        <b>Student Name:</b> {{$email_data["student_name"]}}<br>
        <b>Class:</b> {{$email_data["class"]}}<br>
        <b>Location:</b> {{$email_data["location"]}}<br>
        @if(isset($email_data["dates"]))
        <b>Date(s):</b> <br>{!! $email_data["dates"] !!}
        @else
        <b>Date:</b> {{$email_data["date"]}}<br>
        <b>Time:</b> {{$email_data["time"]}}<br>
        @endif
    </p>
@endsection


@section('footer_name')
Regards,
<br>
{{@$email_data["business_name"]}}
@endsection


@section('rights')
© {{date("Y")}} {{@$site_name}}. All rights reserved.
@endsection


