@extends('layouts.auth.base')
@section('title') Authentication @endsection

@section('content')
<section class="sub-page-banner parallax" id="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="page-banner text-center">
                    <h1 class="sub-banner-title">Authentication</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: black;">Please check your email for authentication code</div>

                <div class="card-body">
                    @include('shared.alerts')

                    <form action="{{ url('two-factor-challenge') }}" class="ajax-form-success" data-success="{{url('miners')}}" method="POST" files="true" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="code" style="color: black;">Code</label>
                            <div class="col-md-6">
                                <input class="form-control code" id="code" type="text" placeholder="Enter 8 digit code" required name="code" autofocus="autofocus" autocomplete="one-time-code">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-link submit-btn">
                                    {{ __('Confirm') }}
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
