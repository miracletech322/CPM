@php
    $site_name = "SuperHumanTools";
    $site_logo = "/template/img/logo.png";
    $settings = DB::table("settings")->first();
    if($settings){
        $site_name = $settings->site_name;
        $site_logo = $settings->site_logo ? $settings->site_logo : $site_logo;
    }
@endphp


@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => url("/")])
{{-- {{ config('app.name') }} --}}
<div>
    <img src="{{ url('/').@$site_logo }}" alt="" height="50">
</div>
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ @$settings->site_name }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
