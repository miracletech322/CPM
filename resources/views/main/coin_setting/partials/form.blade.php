@php
    $decoded_api_data = json_decode(@$record->data);
@endphp
@if(@$record)
    <div style='display: block; overflow-x: auto;' class='slim_scroll row mb-5'>
        <div class='col-md-12'>
            <table class='table table-bordered w-100'>
                <tr>
                    <th>Coin</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Algorithm</th>
                </tr>
                <tr>
                    <td>{{@$decoded_api_data->coin}}</td>
                    <td>{{@$decoded_api_data->name}}</td>
                    <td>{{@$decoded_api_data->type}}</td>
                    <td>{{@$decoded_api_data->algorithm}}</td>
                </tr>
            </table>
        </div>
        <div class='col-md-12'>
            <table class='table table-bordered w-100'>
                <tr>
                    <th>Network Hashrate</th>
                    <th>Difficulty</th>
                    <th>Reward</th>
                    <th>Reward Unit</th>
                </tr>
                <tr>
                    <td>{{@$decoded_api_data->network_hashrate}}</td>
                    <td>{{@$decoded_api_data->difficulty}}</td>
                    <td>{{@$decoded_api_data->reward}}</td>
                    <td>{{@$decoded_api_data->reward_unit}}</td>
                </tr>
            </table>
        </div>
        <div class='col-md-12'>
            <table class='table table-bordered w-100'>
                <tr>
                    <th>Reward Block</th>
                    <th>Price</th>
                    <th>Volume</th>
                </tr>
                <tr>
                    <td>{{@$decoded_api_data->reward_block}}</td>
                    <td>{{@$decoded_api_data->price}}</td>
                    <td>{{@$decoded_api_data->volume}}</td>
                </tr>
            </table>
        </div>
    </div>
@endif

<div class="row">

    <div class= col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg" for="coin">Coin Display Name<i class="text-danger">*</i></label>
        <input value="{{@$record->coin_display_name}}" placeholder="Enter Display Name" class="form-control form-control-xl" name="coin_display_name" id="coin_display_name" type="text">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg" for="coin">Coin Name (At API)<i class="text-danger">*</i></label>
        <input value="{{@$record->coin}}" placeholder="Enter Coin Name" class="form-control form-control-xl" name="coin" id="coin" type="text">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg" for="coin">Hashing<i class="text-danger">*</i></label>
        <select name="hashing" id='hashing' class='form-control form-select form-select-xl form-control-xl'>
            <option value="">Select Hashing Record</option>
            @foreach ($hashings as $hashing)
                <option value="{{$hashing->id}}" {{$hashing->id == @$record->hashing_id ? "selected" : ""}}>{{$hashing->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg" for="coin">Power Unit<i class="text-danger">*</i></label>
        <select id='unit' name='unit' class='form-control form-select form-control-xl'>
            <option value="KH/s" {{@$record->unit == "KH/s" ? "selected" : ""}}>KH/s</option>
            <option value="MH/s" {{@$record->unit == "MH/s" ? "selected" : ""}}>MH/s</option>
            <option value="TH/s" {{@$record->unit == "TH/s" ? "selected" : ""}}>TH/s</option>
        </select>
    </div>

    <div class="col-md-12 pb-3 mb-md-4">
        <label class="form-label form-label-lg w-100" for="coin">Formula For Income (Daily)<i class="text-danger">*</i> <small style='float:right'>(NOTE: Please do not add any extra spaces or line breaks)</small></label><br>
        
        {{-- <a style='text-decoration: none !important; text-black'><small><b>API Buttons: </b><small></a> --}}

        <a class='btn btn-sm btn-warning mb-3' style='cursor: pointer' onclick="$('#formula').val($('#formula').val()+'<total_hash>');">{{__("Total Hash Applied")}}</a>

        <a class='btn btn-sm btn-warning mb-3' style='cursor: pointer' onclick="$('#formula').val($('#formula').val()+'<network_hashrate>');">{{__("Network Hashrate")}}</a>

        <a class='btn btn-sm btn-warning mb-3' style='cursor: pointer' onclick="$('#formula').val($('#formula').val()+'<difficulty>');">{{__("Difficulty")}}</a>

        <a class='btn btn-sm btn-warning mb-3' style='cursor: pointer' onclick="$('#formula').val($('#formula').val()+'<reward>');">{{__("Reward")}}</a>

        <a class='btn btn-sm btn-warning mb-3' style='cursor: pointer' onclick="$('#formula').val($('#formula').val()+'<reward_block>');">{{__("Reward Block")}}</a>

        <a class='btn btn-sm btn-warning mb-3' style='cursor: pointer' onclick="$('#formula').val($('#formula').val()+'<price>');">{{__("Price")}}</a> 
        
        {{-- <br> --}}

        {{-- <a style='text-decoration: none !important; text-black'><small><b>Hashing Buttons: </b><small></a>

        <a class='btn btn-sm btn-warning mb-3' style='cursor: pointer' onclick="$('#formula').val($('#formula').val()+'<price_khs>');">{{__("Price of 1KH/s")}}</a>

        <a class='btn btn-sm btn-warning mb-3' style='cursor: pointer' onclick="$('#formula').val($('#formula').val()+'<cost_per_kwh>');">{{__("Cost per (KWh)")}}</a>

        <a class='btn btn-sm btn-warning mb-3' style='cursor: pointer' onclick="$('#formula').val($('#formula').val()+'<power_consumption>');">{{__("Power Consumption (w / 1KH-s)")}}</a> --}}

        <textarea placeholder="Enter Formula" class="form-control form-control-xl" name="formula" id="formula">{{@$record->formula}}</textarea>

        <div class="col-lg-12 mb-3 mt-4">
            <div class="form-check form-switch mb-0 ms-auto">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input me-2" {{(@$record->is_active == 1 || blank(@$record->is_active)) ? "checked" : ""}} {{@$is_show == 1 ? "disabled" : ""}}>
                <span>Is Active?</span>
            </div>
        </div>
    </div>
    
</div>