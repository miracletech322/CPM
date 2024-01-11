@extends('layouts.main.base')

@section('title') {{@$title_plurar}} @endsection

@section('content')

<div class="container-fluid px-0">
    <div class="px-3 px-xxl-5 py-3 py-lg-4 border-bottom border-gray-200 after-header">
        <div class="container-fluid px-0">
            <div class="row align-items-center">
                <div class="col">
                    <span class="text-uppercase tiny text-gray-600 Montserrat-font font-weight-semibold"><a href="{{url('withdraw')}}">{{__("Withdraw")}}</a></span>
                    <h1 class="h2 mb-0 lh-sm">{{@$title_plurar}}</h1>
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
                                <input class="form-control border-0 search_box" placeholder="{{__('Search records...')}}">
                            </div>
                        </div>
                        <div class="col-12 col-md-auto mt-3 mt-md-0 d-grid">
                            <a href="{{url('crypto-wallet/create')}}" class="btn btn-xl btn-warning text-nowrap ms-xl-2">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 14 14">
                                    <rect data-name="Icons/Tabler/Add background" width="14" height="14" fill="none"></rect>
                                    <path d="M6.329,13.414l-.006-.091V7.677H.677A.677.677,0,0,1,.585,6.329l.092-.006H6.323V.677A.677.677,0,0,1,7.671.585l.006.092V6.323h5.646a.677.677,0,0,1,.091,1.348l-.091.006H7.677v5.646a.677.677,0,0,1-1.348.091Z" fill="#212529"></path>
                                </svg> {{__("Add Crypto Wallet")}}</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-12 mb-4">
                    <div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
                        <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
                            <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">{{@$title_plurar}}</h5>
                        </div>
                        <div class="card-body px-0 p-md-4">
                            <div class="bd-example">
                                <div class="slim_scroll pb-5">
                                    <table id="datatables" class="table">
                                        <thead>
                                            <tr>
                                                <th>{{__("Crypto Option")}}</th>
                                                <th>{{__("Wallet Address")}}</th>
                                                <th>{{__("Withdrawal Processing")}}</th>
                                                <th>{{__("Actions")}}</th>
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
