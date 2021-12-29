@extends('layouts.main.base')

@section('content')
<div class="container">
    <div class="page-title-container">
        <div class="row">
            <div class="col-12 col-md-7">
                <a class="muted-link pb-2 d-inline-block hidden" href="#">
                    <span class="align-middle lh-1 text-small">&nbsp;</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">Welcome, {{Auth()->user()->name}}!</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="mb-5">
                <div class="row g-2">
                    <div class="col-6 col-md-4 col-lg-4">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="dollar" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-large lh-1-25">Your balance</div>
                                <div class="text-primary cta-4">0.00000000</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-4">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="cart" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-large lh-1-25">Number of miners</div>
                                <div class="text-primary cta-4">0 M</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-4">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <i data-acorn-icon="server" class="text-primary"></i>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-large lh-1-25">Your power</div>
                                <div class="text-primary cta-4">0 GH/S</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xxl-auto mb-5">
            <h2 class="small-title"></h2>
            <h1 class="mb-0 pb-0 display-4 text-center" id="title">Your miners</h1>
            <br>
            <br>

            <div class="card h-100-card sw-xxl-40">
                <div class="card-body row g-0 text-center">
                    <div class="col-12 d-flex flex-column justify-content-between align-items-center">
                        <div>
                            <div class="cta-3 "></div>
                            <div class="mb-3 cta-3 text-primary">You have no miners</div>
                        </div>
                        <a href="#" class="btn btn-icon btn-icon-start btn-outline-primary stretched-link">
                            <i data-acorn-icon="plus"></i>
                            <span>Add Miner</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
    <div class="row">
        <div class="col-xl-12 mb-5">
            <div class="d-flex">
                <div class="dropdown-as-select me-3" data-setactive="false" data-childselector="span">
                    <a class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <span class="small-title"></span>
                    </a>
                    <div class="dropdown-menu font-standard">
                        <div class="nav flex-column" role="tablist">
                            <a class="active dropdown-item text-medium" href="#" aria-selected="true" role="tab">Today's</a>
                            <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Day 2</a>
                            <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Day 3</a>
                            <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Day 4</a>
                        </div>
                    </div>
                </div>
                <h2 class="small-title">Income for the last 7 days</h2>
            </div>
            <div class="card sh-45 h-xl-100-card">
                <div class="card-body h-100">
                    <div class="h-100">
                        <h4 class="text-center">There is no data</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
@endsection
