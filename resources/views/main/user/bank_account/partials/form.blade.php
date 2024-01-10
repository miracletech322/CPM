<div class="row">
    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">{{__("Account Holder Name")}} <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl " value="{{@$record->account_holder_name}}" name="account_holder_name" {{@$is_show == 1 ? "disabled" : ""}} placeholder="{{__("Enter Account Holder Name")}}">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">{{__("Account Number")}} <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl " value="{{@$record->account_number}}" name="account_number" {{@$is_show == 1 ? "disabled" : ""}} placeholder="{{__("Enter Account Number")}}">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">Country <i class="text-danger">*</i></label>
        @php
        $sel_country = @$record->country;
        @endphp
        <select name="country" class="form-control form-control-xl " id="country" {{@$is_show == 1 ? "disabled" : ""}}>
            <option value="">{{__("Select Country")}}</option>
            @foreach (get_countries() as $country)
            <option value="{{@$country}}" {{@$sel_country == @$country ? "selected" : ''}}>{{@$country}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">{{__("Bank Currency")}} <i class="text-danger">*</i></label>
        @php
        $sel_currency = @$record->bank_currency;
        @endphp
        <select name="bank_currency" class="form-control form-control-xl " id="bank_currency" {{@$is_show == 1 ? "disabled" : ""}}>
            <option value="">{{__("Select Bank Currrency")}}</option>
            @foreach (get_currencies() as $key => $currency)
            <option value="{{@$key}}" {{@$sel_currency == @$key ? "selected" : ''}}>{{@$key}} ({{$currency}})</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">{{__("Bank Name")}} <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl " value="{{@$record->bank_name}}" {{@$is_show == 1 ? "disabled" : ""}} name="bank_name" placeholder="{{__("Enter Bank Name")}}">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">{{__("Branch Name")}} <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl " value="{{@$record->branch_name}}" {{@$is_show == 1 ? "disabled" : ""}} name="branch_name" placeholder="{{__("Enter Branch Name")}}">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">{{__("Swift Code / BIC")}} <i class="text-danger">*</i></label>
        <input class="form-control form-control-xl " value="{{@$record->swift_bic}}" name="swift_bic" placeholder="{{__("Enter Swift Code / BIC")}}" {{@$is_show == 1 ? "disabled" : ""}}>
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg">{{__("IBAN Number")}} </label>
        <input class="form-control form-control-xl " value="{{@$record->iban_number}}" name="iban_number" placeholder="{{__("Enter IBAN Number")}}" {{@$is_show == 1 ? "disabled" : ""}}>
    </div>

</div>