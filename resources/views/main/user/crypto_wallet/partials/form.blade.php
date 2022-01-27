<div class="">
    <div class="row form-group mb-3 {{@$is_show == 1 ? "d-none" : ""}}">
        <small class="text-info">Please ensure that you have provide correct address and you have access of that.</small>
        <small class="text-danger">Caution: You will lose your funds when applying for withdrawl if your wallet address is wrong or you don't have access.</small>
    </div>
    <div class="row form-group mb-3">
        <div class="col-md-6 mb-3">
            <label class='float-left'>Crypto Option <i class="text-danger">*</i></label>
            <select name="crypto_option" class="form-control" id="crypto_option" {{@$is_show == 1 ? "disabled" : ""}}>
                <option value="">Select Crypto Option</option>
                @foreach ($crypto_options as $option)
                <option value="{{@$option->id}}" {{@$option->id == @$record->crypto_option_id ? "selected" : ''}}>{{@$option->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class='float-left'>Wallet Address <i class="text-danger">*</i></label>
            <input class="form-control" value="{{@$record->wallet_address}}" name="wallet_address" {{@$is_show == 1 ? "disabled" : ""}} placeholder="Enter Wallet Address">
        </div>

    </div>
</div>
