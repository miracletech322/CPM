@php
$site_data["site_name"] = "CloudMinePool";
$site_data["site_logo"] = asset('frontend') . '/images/logo1.svg';
$settings = DB::table("settings")->first();
if($settings){
    $site_data["site_name"] = @$settings->site_name;
    $site_data["site_logo"] = @$settings->site_logo ? (url('/').@$settings->site_logo) : $site_data["site_logo"];
}
@endphp


@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => url("/")])
{{-- {{ config('app.name') }} --}}
<div>
    <img src="{{ $site_data["site_logo"] }}" alt="" height="50">
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
© {{ date('Y') }} {{ $site_data["site_name"] }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
