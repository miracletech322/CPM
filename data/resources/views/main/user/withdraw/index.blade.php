@extends('layouts.main.base')

@section('content')
<style type="text/css">
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border-top: none;
    }

    .tab button.active {
        background-color: #ccc;
    }

</style>
<div class="container">

    <div class="row">
        <div class="col-12 col-xxl-auto mb-5">
            <h2 class="small-title"></h2>
            <h1 class="mb-0 pb-0 display-4 text-center" id="title">Withdraw funds</h1>
            <br>
            <br>

            <div class="page-title-container">
                <div class="row mb-n5">
                    <div class="col-xl-4">
                        <div class="mb-5">
                            <h2 class="small-title">Method</h2>
                            <div class="card">
                                <div class="card-body">
                                    <button class="btn btn-outline-primary w-100 tablinks active" onclick="openCity(event, 'bitcoin')"><i class="fab fa-btc"></i> BITCOIN</button>
                                    <br><br>
                                    <button class="btn btn-outline-primary w-100 tablinks" onclick="openCity(event, 'card')"><i class="fas fa-money-check"></i> CARD</button>
                                    <br><br>
                                    <button class="btn btn-outline-primary w-100 tablinks" onclick="openCity(event, 'bank')"><i class="fas fa-university"></i> Transfer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="mb-5 tabcontent" id="bitcoin" style="display: block;">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Bitcoin address *</label>
                                            <input type="text" class="form-control" value="" placeholder="1BvBMSEYstWetqTFn5Au4m4GFg7xJaNVN2">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Withdrawal amount: *</label>
                                            <input type="number" class="form-control" value="" placeholder="0.00100000">
                                        </div>
                                        <button class="btn btn-icon btn-icon-start btn-outline-primary">
                                            <i class="fab fa-btc"></i>
                                            <span>Withdraw funds</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5 tabcontent" id="card">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Receiver name *</label>
                                            <input type="text" class="form-control" value="" placeholder="John Smith">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Card number *</label>
                                            <input type="text" class="form-control" value="" placeholder="5050 3212 2345 1342">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Withdrawal amount: *</label>
                                            <input type="text" class="form-control" value="" placeholder="0.00100000">
                                        </div>
                                        <p class="text-center">The payment will be made in the currency of your bank account at the current Bitcoin exchange rate.</p>
                                        <button class="btn btn-icon btn-icon-start btn-outline-primary">
                                            <i class="fas fa-money-check"></i>
                                            <span> Withdraw funds</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mb-5 tabcontent" id="bank">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Receiver name *</label>
                                            <input type="text" class="form-control" value="" placeholder="John Smith">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Country *</label>
                                            <input type="text" class="form-control" value="" placeholder="United Kingdom">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">IBAN *</label>
                                            <input type="text" class="form-control" value="" placeholder="GB 26 MIDL 400515 12314312">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Withdrawal amount: *</label>
                                            <input type="text" class="form-control" value="" placeholder="0.00100000">
                                        </div>
                                        <p class="text-center">The payment will be made in the currency of your bank account at the current Bitcoin exchange rate.</p>
                                        <button class="btn btn-icon btn-icon-start btn-outline-primary">
                                            <i class="fas fa-university"></i>
                                            <span>Withdraw funds</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br><br><br><br>
        <div class="row">
            <div class="col-12 col-xxl-auto mb-5">
                <h2 class="small-title"></h2>
                <h1 class="mb-0 pb-0 display-4 text-center" id="title">Withdrawal history</h1>
                <br>
                <br>

                <div class="card h-100-card sw-xxl-40">
                    <div class="card-body row g-0 text-center">
                        <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Address</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan=4>There is no data</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

    </script>
    @endsection
