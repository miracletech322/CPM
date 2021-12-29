@php
    $settings = DB::table("settings")->first();
@endphp

@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => url("/")])
{{-- {{ config('app.name') }} --}}
<div>
    <img src="{{ url('/').@$settings->site_logo }}" alt="" height="50">
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
