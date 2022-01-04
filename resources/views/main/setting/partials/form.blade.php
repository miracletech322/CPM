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
        <b>Calculator Settings</b>
    </div>
    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label for="price_th">Price of 1TH/s ($)<i class="text-danger">*</i></label>
            <input value="{{@$record->price_th}}" placeholder="Enter Price of 1TH/s" class="form-control" name="price_th" id="price_th" type="text">
        </div>

        <div class="col-md-6">
            <label for="cost_per_kwh">Cost per KWh <i class="text-danger">*</i></label>
            <input value="{{@$record->cost_per_kwh}}" placeholder="Enter Cost Per KWh" class="form-control" name="cost_per_kwh" id="cost_per_kwh" type="text">
        </div>
    </div>

    <div class="row form-group mb-3">
        <div class="col-md-6">
            <label for="power_consumption">Power Consumption (w) <i class="text-danger">*</i></label>
            <input value="{{@$record->power_consumption}}" placeholder="Enter Power Consumption" class="form-control" name="power_consumption" id="power_consumption" type="text">
        </div>

        <div class="col-md-6">
            <label for="maintenance_fee">Maintenance Fee (Percentage) <i class="text-danger">*</i></label>
            <input value="{{@$record->maintenance_fee}}" placeholder="Enter Maintenance Fee" class="form-control" name="maintenance_fee" id="maintenance_fee" type="text">
        </div>
    </div>
   

</div>
