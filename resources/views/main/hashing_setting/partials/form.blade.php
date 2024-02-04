<div class="row">

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg" for="hashing_name">Hashing Name<i class="text-danger">*</i></label>
        <input value="{{@$record->name}}" placeholder="Enter Hashing Name" class="form-control form-control-xl" name="hashing_name" id="price_khs" type="text">
    </div>
    
    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg" for="price_khs">Price ($) For Mining 1 Unit <i class="text-danger">*</i></label>
        <input value="{{@$record->price_khs}}" placeholder="Enter Price" class="form-control form-control-xl" name="price_khs" id="price_khs" type="text">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg" for="cost_per_kwh">Cost per (KWh) <i class="text-danger">*</i></label>
        <input value="{{@$record->cost_per_kwh}}" placeholder="Enter Cost" class="form-control form-control-xl" name="cost_per_kwh" id="cost_per_kwh" type="text">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg" for="power_consumption">Power Consumption In Watt (For a day) <i class="text-danger">*</i></label>
        {{-- If its BTC then for 1TH if its ETH then for 1MH and so on --}}
        <input value="{{@$record->power_consumption}}" placeholder="Enter Power Consumption" class="form-control form-control-xl" name="power_consumption" id="power_consumption" type="text">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg" for="maintenance_fee">Maintenance Fee (Percentage) <i class="text-danger">*</i></label>
        <input value="{{@$record->maintenance_fee}}" placeholder="Enter Maintenance Fee" class="form-control form-control-xl" name="maintenance_fee" id="maintenance_fee" type="text">
    </div>


    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg" for="min_buyable">Min Buyable ($) <i class="text-danger">*</i></label>
        {{-- Minimum purcahsea a person can make in dollars --}}
        <input value="{{@$record->min_buyable}}" placeholder="Enter Min Buyable (TH-s)" class="form-control form-control-xl" name="min_buyable" id="min_buyable" type="text">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg" for="max_buyable">Max Buyable ($) <i class="text-danger">*</i></label>
        <input value="{{@$record->max_buyable}}" placeholder="Enter Max Buyable (TH-s)" class="form-control form-control-xl" name="max_buyable" id="max_buyable" type="text">
    </div>
</div>