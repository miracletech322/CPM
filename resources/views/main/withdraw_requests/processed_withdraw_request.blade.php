@extends('layouts.main.base')

@section('title') Processed Withdraw Requests @endsection

@section('content')

<div class="container-fluid px-0">
    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <span class="text-uppercase tiny text-gray-600 Montserrat-font font-weight-semibold"><a href="{{url('withdraw-requests')}}">Withdraw Requests</a></span>
                    <h1 class="h2 mb-0 lh-sm">Processed Withdraw Requests</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="col-xxl-12 mb-4">
                <div class="pb-2 pt-3 mb-4 mb-xl-5">
                    @include("shared.alerts")
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="input-group input-group-xl bg-white border border-gray-300 rounded px-3 me-2 me-xl-4">
                                <button type="button" class="border-0 bg-transparent p-1"><img src="{{asset('temp/assets/svg/icons/search@14.svg')}}" alt="Search"></button>
                                <input class="form-control border-0 search_box" placeholder="Search records...">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12 mb-4">
                    <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
                        <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
                            <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">Processed Withdraw Requests</h5>
                        </div>
                        <div class="card-body px-0 p-md-4">
                            <div class="bd-example">
                                <div class="slim_scroll pb-5">
                                    <table id="processed_datatables" class="table">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Date Requested</th>
                                                <th>Cash Paid</th>
                                                <th>Withdrawal Method</th>
                                                <th>Action Performed By</th>
                                                <th>Action Performed</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@include($directory.'partials.js')
@endsection