<div class="">

    <div class="row form-group">
        <b>Site Settings</b>
    </div>
    <div class="row form-group mb-5">
        <div class="col-md-6">
            <label for="site_name">Site Name <i class="text-danger">*</i></label>
            <input value="{{@$record->site_name}}" placeholder="Enter Site Name" class="form-control" name="site_name" id="site_name" type="text">
        </div>

        <div class="col-md-6">
            <label for="site_logo">Site Logo <i class="text-danger">*</i></label>
             @if(!blank(@$record->site_logo))
                <a class="ml-2" href="{{url('/').@$record->site_logo}}" target="_blank">(Show Logo)</a>
            @endif
            <input value="{{@$record->site_logo}}" class="form-control" name="site_logo" id="site_logo" type="file">
        </div>
    </div>

    <div class="row form-group">
        <b>Account Settings</b>
    </div>
    <div class="row form-group mb-5">
        <div class="col-md-6">
            <label for="account_number">Account Number <i class="text-danger">*</i></label>
            <input value="{{@$record->account_number}}" placeholder="Enter Account Number" class="form-control" name="account_number" id="account_number" type="text">
        </div>

        <div class="col-md-6">
            <label for="swift_bic">Swift BIC <i class="text-danger">*</i></label>
            <input value="{{@$record->swift_bic}}" placeholder="Enter Swift BIC" class="form-control" name="swift_bic" id="swift_bic" type="text">
        </div>
    </div>


    <div class="row form-group">
        <b>Calculator Settings (SHA-256)</b>
    </div>
    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label for="sha_price_th">Price of 1TH/s ($)<i class="text-danger">*</i></label>
            <input value="{{@$record->sha_price_th}}" placeholder="Enter Price" class="form-control" name="sha_price_th" id="sha_price_th" type="text">
        </div>

        <div class="col-md-6">
            <label for="sha_cost_per_kwh">Cost per (KWh) <i class="text-danger">*</i></label>
            <input value="{{@$record->sha_cost_per_kwh}}" placeholder="Enter Cost" class="form-control" name="sha_cost_per_kwh" id="sha_cost_per_kwh" type="text">
        </div>
    </div>

    <div class="row form-group mb-5">
        <div class="col-md-6">
            <label for="sha_power_consumption">Power Consumption (w / 1TH-s) <i class="text-danger">*</i></label>
            <input value="{{@$record->sha_power_consumption}}" placeholder="Enter Power Consumption" class="form-control" name="sha_power_consumption" id="sha_power_consumption" type="text">
        </div>

        <div class="col-md-6">
            <label for="sha_maintenance_fee">Maintenance Fee (Percentage) <i class="text-danger">*</i></label>
            <input value="{{@$record->sha_maintenance_fee}}" placeholder="Enter Maintenance Fee" class="form-control" name="sha_maintenance_fee" id="sha_maintenance_fee" type="text">
        </div>
    </div>


    <div class="row form-group mb-5">
        <div class="col-md-6">
            <label for="sha_min">Min Buyable (TH-s) <i class="text-danger">*</i></label>
            <input value="{{@$record->sha_min}}" placeholder="Enter Min Buyable (TH-s)" class="form-control" name="sha_min" id="sha_min" type="text">
        </div>

        <div class="col-md-6">
            <label for="sha_max">Max Buyable (TH-s) <i class="text-danger">*</i></label>
            <input value="{{@$record->sha_max}}" placeholder="Enter Max Buyable (TH-s)" class="form-control" name="sha_max" id="sha_max" type="text">
        </div>
    </div>
    

    <div class="row form-group">
        <b>Calculator Settings (Ethash)</b>
    </div>
    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label for="eth_price_mh">Price of 1MH/s ($)<i class="text-danger">*</i></label>
            <input value="{{@$record->eth_price_mh}}" placeholder="Enter Price" class="form-control" name="eth_price_mh" id="eth_price_mh" type="text">
        </div>

        <div class="col-md-6">
            <label for="eth_cost_per_kwh">Cost per (KWh) <i class="text-danger">*</i></label>
            <input value="{{@$record->eth_cost_per_kwh}}" placeholder="Enter Cost" class="form-control" name="eth_cost_per_kwh" id="eth_cost_per_kwh" type="text">
        </div>
    </div>

    <div class="row form-group mb-5">
        <div class="col-md-6">
            <label for="eth_power_consumption">Power Consumption (w / 1MH-s) <i class="text-danger">*</i></label>
            <input value="{{@$record->eth_power_consumption}}" placeholder="Enter Power Consumption" class="form-control" name="eth_power_consumption" id="eth_power_consumption" type="text">
        </div>

        <div class="col-md-6">
            <label for="eth_maintenance_fee">Maintenance Fee (Percentage) <i class="text-danger">*</i></label>
            <input value="{{@$record->eth_maintenance_fee}}" placeholder="Enter Maintenance Fee" class="form-control" name="eth_maintenance_fee" id="eth_maintenance_fee" type="text">
        </div>
    </div>


    <div class="row form-group mb-5">
        <div class="col-md-6">
            <label for="eth_min">Min Buyable (MH-s) <i class="text-danger">*</i></label>
            <input value="{{@$record->eth_min}}" placeholder="Enter Min Buyable (MH-s)" class="form-control" name="eth_min" id="eth_min" type="text">
        </div>

        <div class="col-md-6">
            <label for="eth_max">Max Buyable (MH-s) <i class="text-danger">*</i></label>
            <input value="{{@$record->eth_max}}" placeholder="Enter Max Buyable (MH-s)" class="form-control" name="eth_max" id="eth_max" type="text">
        </div>
    </div>

    <div class="row form-group">
        <b>Calculator Settings (Equihash)</b>
    </div>
    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label for="equi_price_kh">Price of 1KH/s ($)<i class="text-danger">*</i></label>
            <input value="{{@$record->equi_price_kh}}" placeholder="Enter Price" class="form-control" name="equi_price_kh" id="equi_price_kh" type="text">
        </div>

        <div class="col-md-6">
            <label for="equi_cost_per_kwh">Cost per (KWh) <i class="text-danger">*</i></label>
            <input value="{{@$record->equi_cost_per_kwh}}" placeholder="Enter Cost" class="form-control" name="equi_cost_per_kwh" id="equi_cost_per_kwh" type="text">
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label for="equi_power_consumption">Power Consumption (w / 1KH-s) <i class="text-danger">*</i></label>
            <input value="{{@$record->equi_power_consumption}}" placeholder="Enter Power Consumption" class="form-control" name="equi_power_consumption" id="equi_power_consumption" type="text">
        </div>

        <div class="col-md-6">
            <label for="equi_maintenance_fee">Maintenance Fee (Percentage) <i class="text-danger">*</i></label>
            <input value="{{@$record->equi_maintenance_fee}}" placeholder="Enter Maintenance Fee" class="form-control" name="equi_maintenance_fee" id="equi_maintenance_fee" type="text">
        </div>
    </div>


    <div class="row form-group mb-5">
        <div class="col-md-6">
            <label for="equi_min">Min Buyable (KH-s) <i class="text-danger">*</i></label>
            <input value="{{@$record->equi_min}}" placeholder="Enter Min Buyable (KH-s)" class="form-control" name="equi_min" id="equi_min" type="text">
        </div>

        <div class="col-md-6">
            <label for="equi_max">Max Buyable (KH-s) <i class="text-danger">*</i></label>
            <input value="{{@$record->equi_max}}" placeholder="Enter Max Buyable (KH-s)" class="form-control" name="equi_max" id="equi_max" type="text">
        </div>
    </div>
    





   

</div>
