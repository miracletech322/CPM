<div class="row {{@$is_show == 1 ? "d-none" : ""}}">
    <div class="col-md-12 pb-3 mb-md-4">
        <small class="text-info"><b>Please ensure that you have provide correct address and you have access of that.</b></small><br>
        <small class="text-danger"><b>Caution: You will lose your funds when applying for withdrawl if your wallet address is wrong or you don't have access.</b></small>
    </div>
</div>

<div class="row">
    <div class="col-md-6 pb-3 mb-md-4">
        <label  class="form-label form-label-lg">Crypto Option <i class="text-danger">*</i></label>
        <select name="crypto_option" class="form-control form-control-xl" id="crypto_option" {{@$is_show == 1 ? "disabled" : ""}}>
            <option value="">Select Crypto Option</option>
            @foreach ($crypto_options as $option)
            <option value="{{@$option->id}}" {{@$option->id == @$record->crypto_option_id ? "selected" : ''}}>{{@$option->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label  class="form-label form-label-lg">Wallet Address <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl" value="{{@$record->wallet_address}}" name="wallet_address" {{@$is_show == 1 ? "disabled" : ""}} placeholder="Enter Wallet Address">
    </div>
</div>
