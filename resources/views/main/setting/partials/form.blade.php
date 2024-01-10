<div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
    <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
        <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">Settings</h5>
    </div>
    <div class="card-body px-0 p-md-4">
        <div class="bd-example">

            <div class="row px-3">

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="site_name">Site Name <i class="text-danger">*</i></label>
                    <input value="{{@$record->site_name}}" placeholder="Enter Site Name" class="form-control form-control-xl" name="site_name" id="site_name" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="site_logo">Site Logo </label>
                    @if(!blank(@$record->site_logo))
                    <a class="ml-2" href="{{url('/').@$record->site_logo}}" target="_blank">(Show Logo)</a>
                    @endif
                    <input value="{{@$record->site_logo}}" class="form-control form-control-xl" name="site_logo" id="site_logo" type="file">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="site_name">VAT <i class="text-danger">*</i></label>
                    <input value="{{@$record->vat}}" placeholder="Enter VAT" class="form-control form-control-xl" name="vat" id="vat" type="number">
                </div>
            </div>
        </div>
    </div>
</div>



<div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
    <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
        <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">Account Settings</h5>
    </div>
    <div class="card-body px-0 p-md-4">
        <div class="bd-example">

            <div class="row px-3">

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="account_number">Account Number <i class="text-danger">*</i></label>
                    <input value="{{@$record->account_number}}" placeholder="Enter Account Number" class="form-control form-control-xl" name="account_number" id="account_number" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="swift_bic">Swift BIC <i class="text-danger">*</i></label>
                    <input value="{{@$record->swift_bic}}" placeholder="Enter Swift BIC" class="form-control form-control-xl" name="swift_bic" id="swift_bic" type="text">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
    <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
        <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">Calculator Settings (SHA-256)</h5>
    </div>
    <div class="card-body px-0 p-md-4">
        <div class="bd-example">

            <div class="row px-3">

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="sha_price_th">Price of 1TH/s ($)<i class="text-danger">*</i></label>
                    <input value="{{@$record->sha_price_th}}" placeholder="Enter Price" class="form-control form-control-xl" name="sha_price_th" id="sha_price_th" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="sha_cost_per_kwh">Cost per (KWh) <i class="text-danger">*</i></label>
                    <input value="{{@$record->sha_cost_per_kwh}}" placeholder="Enter Cost" class="form-control form-control-xl" name="sha_cost_per_kwh" id="sha_cost_per_kwh" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="sha_power_consumption">Power Consumption (w / 1TH-s) <i class="text-danger">*</i></label>
                    <input value="{{@$record->sha_power_consumption}}" placeholder="Enter Power Consumption" class="form-control form-control-xl" name="sha_power_consumption" id="sha_power_consumption" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="sha_maintenance_fee">Maintenance Fee (Percentage) <i class="text-danger">*</i></label>
                    <input value="{{@$record->sha_maintenance_fee}}" placeholder="Enter Maintenance Fee" class="form-control form-control-xl" name="sha_maintenance_fee" id="sha_maintenance_fee" type="text">
                </div>


                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="sha_min">Min Buyable (TH-s) <i class="text-danger">*</i></label>
                    <input value="{{@$record->sha_min}}" placeholder="Enter Min Buyable (TH-s)" class="form-control form-control-xl" name="sha_min" id="sha_min" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="sha_max">Max Buyable (TH-s) <i class="text-danger">*</i></label>
                    <input value="{{@$record->sha_max}}" placeholder="Enter Max Buyable (TH-s)" class="form-control form-control-xl" name="sha_max" id="sha_max" type="text">
                </div>
            </div>
        </div>
    </div>
</div>



<div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
    <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
        <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">Calculator Settings (Ethash)</h5>
    </div>
    <div class="card-body px-0 p-md-4">
        <div class="bd-example">

            <div class="row px-3">

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="eth_price_mh">Price of 1MH/s ($)<i class="text-danger">*</i></label>
                    <input value="{{@$record->eth_price_mh}}" placeholder="Enter Price" class="form-control form-control-xl" name="eth_price_mh" id="eth_price_mh" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="eth_cost_per_kwh">Cost per (KWh) <i class="text-danger">*</i></label>
                    <input value="{{@$record->eth_cost_per_kwh}}" placeholder="Enter Cost" class="form-control form-control-xl" name="eth_cost_per_kwh" id="eth_cost_per_kwh" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="eth_power_consumption">Power Consumption (w / 1MH-s) <i class="text-danger">*</i></label>
                    <input value="{{@$record->eth_power_consumption}}" placeholder="Enter Power Consumption" class="form-control form-control-xl" name="eth_power_consumption" id="eth_power_consumption" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="eth_maintenance_fee">Maintenance Fee (Percentage) <i class="text-danger">*</i></label>
                    <input value="{{@$record->eth_maintenance_fee}}" placeholder="Enter Maintenance Fee" class="form-control form-control-xl" name="eth_maintenance_fee" id="eth_maintenance_fee" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="eth_min">Min Buyable (MH-s) <i class="text-danger">*</i></label>
                    <input value="{{@$record->eth_min}}" placeholder="Enter Min Buyable (MH-s)" class="form-control form-control-xl" name="eth_min" id="eth_min" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="eth_max">Max Buyable (MH-s) <i class="text-danger">*</i></label>
                    <input value="{{@$record->eth_max}}" placeholder="Enter Max Buyable (MH-s)" class="form-control form-control-xl" name="eth_max" id="eth_max" type="text">
                </div>
            </div>
        </div>
    </div>
</div>




<div class="card rounded-12 shadow-dark-80 border border-gray-50 mb-3 mb-xl-5">
    <div class="d-flex align-items-center px-3 px-md-4 py-3 border-bottom border-gray-200">
        <h5 class="card-header-title my-2 ps-md-3 font-weight-semibold">Calculator Settings (KHeavyHash)</h5>
    </div>
    <div class="card-body px-0 p-md-4">
        <div class="bd-example">

            <div class="row px-3">

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="equi_price_kh">Price of 1KH/s ($)<i class="text-danger">*</i></label>
                    <input value="{{@$record->equi_price_kh}}" placeholder="Enter Price" class="form-control form-control-xl" name="equi_price_kh" id="equi_price_kh" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="equi_cost_per_kwh">Cost per (KWh) <i class="text-danger">*</i></label>
                    <input value="{{@$record->equi_cost_per_kwh}}" placeholder="Enter Cost" class="form-control form-control-xl" name="equi_cost_per_kwh" id="equi_cost_per_kwh" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="equi_power_consumption">Power Consumption (w / 1KH-s) <i class="text-danger">*</i></label>
                    <input value="{{@$record->equi_power_consumption}}" placeholder="Enter Power Consumption" class="form-control form-control-xl" name="equi_power_consumption" id="equi_power_consumption" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="equi_maintenance_fee">Maintenance Fee (Percentage) <i class="text-danger">*</i></label>
                    <input value="{{@$record->equi_maintenance_fee}}" placeholder="Enter Maintenance Fee" class="form-control form-control-xl" name="equi_maintenance_fee" id="equi_maintenance_fee" type="text">
                </div>


                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="equi_min">Min Buyable (KH-s) <i class="text-danger">*</i></label>
                    <input value="{{@$record->equi_min}}" placeholder="Enter Min Buyable (KH-s)" class="form-control form-control-xl" name="equi_min" id="equi_min" type="text">
                </div>

                <div class="col-md-6 pb-3 mb-md-4">
                    <label class="form-label form-label-lg" for="equi_max">Max Buyable (KH-s) <i class="text-danger">*</i></label>
                    <input value="{{@$record->equi_max}}" placeholder="Enter Max Buyable (KH-s)" class="form-control form-control-xl" name="equi_max" id="equi_max" type="text">
                </div>

            </div>
        </div>
    </div>
</div>