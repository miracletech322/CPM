<div class="row">

    <div class= col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg" for="coin">Coin Display Name<i class="text-danger">*</i></label>
        <input value="{{@$record->coin_display_name}}" placeholder="Enter Display Name" class="form-control form-control-xl" name="coin_display_name" id="coin_display_name" type="text">
    </div>

    <div class="col-md-6 pb-3 mb-md-4">
        <label class="form-label form-label-lg" for="coin">Coin Name<i class="text-danger">*</i></label>
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
        <label class="form-label form-label-lg" for="coin">Unit<i class="text-danger">*</i></label>
        <input value="{{@$record->unit}}" placeholder="Enter Unit" class="form-control form-control-xl" name="unit" id="unit" type="text">
    </div>

    <div class="col-md-12 pb-3 mb-md-4">
        <label class="form-label form-label-lg w-100" for="coin">Formula<i class="text-danger">*</i> <small style='float:right'>(NOTE: Please do not add any extra spaces or line breaks)</small></label><br>
        
        {{-- <a style='text-decoration: none !important; text-black'><small><b>API Buttons: </b><small></a> --}}

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


        {{-- // HOW TO ADD p IN THE FORMULA --}}

        {{-- //BTC
        // $H = $p * 1000000000000; //Converting TaraHash to Hash
        // $D = $hashing_difficulty;
        // $B = $hashing_reward_block;
        // $S = 86400;
        // $upper = ($B * $H * $S);
        // $lower = ( $D * 4294967296 ); //4294967296 = 2^32
        // $coin_production = $upper / $lower;


        //ETH
        // $H = $p * 1000000; //Converting megaHash to Hash
        // $D = $hashing_difficulty;
        // $B = $hashing_reward_block;
        // $S = 86400;
        // $coin_production = (($H * $B) / $D) * $S;


        //KHASH
        // $H = $p * 1000; //Converting megaHash to Hash
        // $D = $hashing_difficulty;
        // $B = $hashing_reward_block;
        // $N = $network_hashrate;
        // $S = 86400;
        // $coin_production =   (($H * $B) / ($D * 3600) ) * $S; --}}


        <div class="col-lg-12 mb-3 mt-4">
            <div class="form-check form-switch mb-0 ms-auto">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input me-2" {{(@$record->is_active == 1 || blank(@$record->is_active)) ? "checked" : ""}} {{@$is_show == 1 ? "disabled" : ""}}>
                <span>Is Active?</span>
            </div>
        </div>
    </div>
    
</div>