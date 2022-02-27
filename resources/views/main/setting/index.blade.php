@extends('layouts.main.base')

@section('title') Settings @endsection

@section('content')
<div class="container-fluid px-0">
    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="h2 mb-0 lh-sm">Settings</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-gray-200 after-header">
        <div class="container-fluid px-0 py-lg-3">
            <div class="col-xxl-12 mb-4">

                <div class="col-12">
                    @include("shared.alerts")
                </div>

                <div class="col-12 mb-3 mb-xl-5">
                    <a href="{{url('update-coin-prices')}}" class="btn btn-warning btn-lg">Update Coin Prices</a>
                </div>

                <form action="{{ url('settings'."/".@$record->id) }}" method="POST" class="ajax-form" class="form-horizontal">
                    @csrf()
                    @method('PUT')
                    @include($directory."partials.form")
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-warning submit-btn btn-lg">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')
@endsection
