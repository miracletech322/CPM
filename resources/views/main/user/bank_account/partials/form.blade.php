<div class="">
    <div class="row form-group mb-3">
        <div class="col-md-6 mb-3">
            <label class='float-left'>Account Holder Name <i class="text-danger">*</i></label>
            <input class="form-control" value="{{@$record->account_holder_name}}" name="account_holder_name" {{@$is_show == 1 ? "disabled" : ""}} placeholder="Enter Account Holder Name">
        </div>

        <div class="col-md-6 mb-3">
            <label class='float-left'>Account Number <i class="text-danger">*</i></label>
            <input class="form-control" value="{{@$record->account_number}}" name="account_number" {{@$is_show == 1 ? "disabled" : ""}} placeholder="Enter Account Number">
        </div>

        <div class="col-md-6 mb-3">
            <label class='float-left'>Country <i class="text-danger">*</i></label>
            @php
            $sel_country = @$record->country;
            @endphp
            <select name="country" class="form-control" id="country" {{@$is_show == 1 ? "disabled" : ""}}>
                <option value="">Select Country</option>
                @foreach (get_countries() as $country)
                <option value="{{@$country}}" {{@$sel_country == @$country ? "selected" : ''}}>{{@$country}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class='float-left'>Bank Currency <i class="text-danger">*</i></label>
            @php
            $sel_currency = @$record->bank_currency;
            @endphp
            <select name="bank_currency" class="form-control" id="bank_currency" {{@$is_show == 1 ? "disabled" : ""}}>
                <option value="">Select Bank Currrency</option>
                @foreach (get_currencies() as $key => $currency)
                <option value="{{@$key}}" {{@$sel_currency == @$key ? "selected" : ''}}>{{@$key}} ({{$currency}})</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class='float-left'>Bank Name <i class="text-danger">*</i></label>
            <input class="form-control" value="{{@$record->bank_name}}" {{@$is_show == 1 ? "disabled" : ""}} name="bank_name" placeholder="Enter Bank Name">
        </div>

        <div class="col-md-6 mb-3">
            <label class='float-left'>Branch Name <i class="text-danger">*</i></label>
            <input class="form-control" value="{{@$record->branch_name}}" {{@$is_show == 1 ? "disabled" : ""}} name="branch_name" placeholder="Enter Branch Name">
        </div>

        <div class="col-md-6 mb-3">
            <label class='float-left'>Swift Code / BIC <i class="text-danger">*</i></label>
            <input class="form-control" value="{{@$record->swift_bic}}" name="swift_bic" placeholder="Enter Swift Code / BIC" {{@$is_show == 1 ? "disabled" : ""}}>
        </div>

        <div class="col-md-6 mb-3">
            <label class='float-left'>IBAN Number </label>
            <input class="form-control" value="{{@$record->iban_number}}" name="iban_number" placeholder="Enter IBAN Number" {{@$is_show == 1 ? "disabled" : ""}}>
        </div>

    </div>
</div>