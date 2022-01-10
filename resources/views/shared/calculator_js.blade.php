<script>

    var setup = $(".miner-setup");
    var $item_price = $('.miner-select').find('.miner-select-item.active').data('price');
    var $min_deposit = $('.miner-select').find('.miner-select-item.active').data('min');
    var $max_deposit = $('.miner-select').find('.miner-select-item.active').data('max');
    var $prefix = $('.miner-select').find('.miner-select-item.active').data('prefix');
    var $step = $('.miner-select').find('.miner-select-item.active').data('step');
    var $system = $('.miner-select').find('.miner-select-item.active').data('system');
    var calculator;
    var $calc_min = $min_deposit / $item_price;
    var $calc_max = $max_deposit / $item_price;
    var $min = $calc_min.toFixed(2);
    var $max = $calc_max.toFixed(2);
    var $from = $calc_min.toFixed(2);

    var $hashing_difficulty = $('.miner-select').find('.miner-select-item.active').data('difficulty');
    var $hashing_reward_block = $('.miner-select').find('.miner-select-item.active').data('reward');
    var $network_hashrate = $('.miner-select').find('.miner-select-item.active').data('network');
    var $coin_price = $('.miner-select').find('.miner-select-item.active').data('coin');

    var $n = 1;
    var $s = 86400;
    var $investition_input = $('#data-input-price');
    var $average_input = $('#data-input-ghs');
    var $average_input_home = $('#data-input-ghs-home');

    var $prefix_power_input = $('.input-prefix');

    var $daily_income = $('.calculate-earnings__calculator-results').find('#daily');
    var $month_income = $('.calculate-earnings__calculator-results').find('#month');
    var $year_income = $('.calculate-earnings__calculator-results').find('#year');

    var $daily_income_home = $('.calculate-earnings__calculator-results').find('#daily_home');
    var $month_income_home = $('.calculate-earnings__calculator-results').find('#month_home');
    var $year_income_home = $('.calculate-earnings__calculator-results').find('#year_home');

    var gpuPower = $('.calculate-earnings__wrap').find('#gpu-power');
    var gpuLvl = $('.calculate-earnings__wrap').find('#gpuLvl');

    var power_consumption_cost =  0;
    var power_consumption_cost_home = 0;


    setup.ionRangeSlider({
        min: $min,
        max: $max,
        from: $from,
        skin: "round",
        hide_min_max: true,
        postfix: $prefix,
        step: $step,
        onStart: function (data) {
            console.log('here i am onStart')
            var $average = data.from;
            var $money = $average * $item_price;
            $investition_input.val(Math.round($money));
            $average_input.val($average);
            getProfit($average);
        },
        onChange: function (data) {
            console.log(data)
            var $average = data.from;
            var $money = $average * $item_price;
            $investition_input.val(Math.round($money));
            $average_input.val($average);
            getProfit($average);
        },
        onUpdate: function (data) {
            console.log('here i am onUpdate')
            var $average = data.from;
            var $money = $average * $item_price;
            $average_input.val($average);
            getProfit($average);
        }
    });

    function getProfit(p) {

        if($system === 1 || $system === "1")
            getProfitSHA(p)
        else if($system === 2 || $system === "2")
            getProfitEthash(p)
        else
            getProfitEquihash(p);
    }

    function setResult(result , result_home){

        var $daily_calc = (result).toFixed(2);
        var $month_calc = ($daily_calc * 30).toFixed(2);
        var $year_calc = ($daily_calc * 365).toFixed(2);

        $daily_income.html('$' + $daily_calc);
        $month_income.html('$' + $month_calc);
        $year_income.html('$' + $year_calc);

        var $daily_calc_home = (result_home).toFixed(2);
        var $month_calc_home = ($daily_calc_home * 30).toFixed(2);
        var $year_calc_home = ($daily_calc_home * 365).toFixed(2);
        
        $daily_income_home.html('$' + $daily_calc_home);
        $month_income_home.html('$' + $month_calc_home);
        $year_income_home.html('$' + $year_calc_home); 

    }

    function getProfitSHA(p){

        var H = p * 1000000000000; //Converting TaraHash to Hash
        var D = $hashing_difficulty;
        var B = $hashing_reward_block;
        var S = 86400;

        var upper = (B * H * S);
        var lower = ( D * 4294967296 ); //4294967296 = 2^32
        var btc_production = upper / lower;

        power_consumption_cost =  ( $('.miner-select').find('.miner-select-item.active').data('cost') * ( $('.miner-select').find('.miner-select-item.active').data('consumption') / 1000 )) * 24 * p;

        power_consumption_cost_home =  ( $('#data-input-ghs-home').val() * ( $('.miner-select').find('.miner-select-item.active').data('consumption') / 1000 )) * 24 * p;

        var result = ( $coin_price / (1 / btc_production) ) - power_consumption_cost;
        var result_home = ( $coin_price / (1 / btc_production) ) - power_consumption_cost_home;
        setResult(result, result_home);
    }


    function getProfitEthash(p){

        var H = p * 1000000; //Converting megaHash to Hash
        var D = $hashing_difficulty;
        var B = $hashing_reward_block;
        var S = 86400;

        var eth_production = ((H * B) / D) * S;

        power_consumption_cost =  ( $('.miner-select').find('.miner-select-item.active').data('cost') * ( $('.miner-select').find('.miner-select-item.active').data('consumption') / 1000 )) * 24 * p;

        power_consumption_cost_home =  ( $('#data-input-ghs-home').val() * ( $('.miner-select').find('.miner-select-item.active').data('consumption') / 1000 )) * 24 * p;

        var result = ( $coin_price / (1 / eth_production) ) - power_consumption_cost;
        var result_home = ( $coin_price / (1 / eth_production) ) - power_consumption_cost_home;
        setResult(result, result_home);
    }

    function getProfitEquihash(p){

        var H = p * 1000; //Converting megaHash to Hash
        var D = $hashing_difficulty;
        var B = $hashing_reward_block;
        var N = $network_hashrate
        var S = 86400;

        var equi_production =   ((H * B) / (D * 3600) ) * S;
        //var equi_production = (N / (H * B) ) / S;
        //var equi_production = (H / N) / (150 * S * B)    //150 = 2.5mins = block time
        //var equi_production = (H * B * S) / (D * 4294967296)
        //var equi_production = H / (D / (150 * 8192)) / (150 * S * B)

        console.log("result= "+ equi_production);
        power_consumption_cost =  ( $('.miner-select').find('.miner-select-item.active').data('cost') * ( $('.miner-select').find('.miner-select-item.active').data('consumption') / 1000 )) * 24 * p;

        power_consumption_cost_home =  ( $('#data-input-ghs-home').val() * ( $('.miner-select').find('.miner-select-item.active').data('consumption') / 1000 )) * 24 * p;

        var result = ( $coin_price / (1 / equi_production) ) - power_consumption_cost;
        var result_home = ( $coin_price / (1 / equi_production) ) - power_consumption_cost_home;
        setResult(result, result_home);
    }


    calculator = setup.data("ionRangeSlider");
    $('.miner-select').on('click', '.miner-select-item:not(.active)', function (event) {
        $(this).closest('.miner-select').find('.miner-select-item').removeClass('active');
        $(this).addClass('active');
        $item_price = $(this).data('price');
        $min_deposit = $(this).data('min');
        $max_deposit = $(this).data('max');
        $prefix = $(this).data('prefix');
        $step = $(this).data('step');
        $system = $(this).data('system');
       
        $calc_min = $min_deposit / $item_price;
        $calc_max = $max_deposit / $item_price;
        $min = $calc_min.toFixed(2);
        $max = $calc_max.toFixed(2);
        $from = $calc_min.toFixed(2);

        console.log("miner-select-no-click");
        $hashing_difficulty = $(this).data('difficulty');
        $hashing_reward_block = $(this).data('reward');
        $network_hashrate = $(this).data('network');
        $coin_price = $(this).data('coin');

        calculator.update({
            min: $min,
            max: $max,
            from: $from,
            skin: "round",
            hide_min_max: true,
            postfix: $prefix,
            step: $step
        });
        $investition_input.val($min_deposit);
        $average_input.val($min);
        $prefix_power_input.html($prefix);
    });


    $average_input_home.on("change", function () {

        var val = $(this).val();
        val = Math.round(val);

        var intRegex = /^\d+$/;
        var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;
        if ( (!intRegex.test(val)) && (!floatRegex.test(val)) )  {
            val = 0.2;
        }
      
        $average_input_home.val(val);
        calculator.update({
            from: $average_input.val(), step: $step, onUpdate: function (data) {
                var $average = data.from
                getProfit($average);
            }
        });
    });


    $average_input.on("change", function () {
        var val = $(this).val();
        val = Math.round(val);
        console.log(val, $min, $max);

        var intRegex = /^\d+$/;
        var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;
        if (!intRegex.test(val) || !floatRegex.test(val)) {
            val = $min;
            $average_input.val(val);
        }

        if (val < $min) {
            val = $min;
        }

        $average_input.val(val);
        calculator.update({
            from: val, step: $step, onUpdate: function (data) {
                var $average = data.from;
                var $money = $average * $item_price;
                $investition_input.val(Math.round($money));
                getProfit($average);
            }
        });
    });


    $investition_input.on("change", function () {
        var val = $(this).val();
        var intRegex = /^\d+$/;
        var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;
        if (!intRegex.test(val) || !floatRegex.test(val)) {
            $investition_input.val($min_deposit);
        }
        if (val > $max_deposit) {
            $investition_input.val($max_deposit);
        }
        if (val < $min_deposit) {
            $investition_input.val($min_deposit);
        }
        $calc = val / $item_price;
        calculator.update({
            from: $calc, onUpdate: function (data) {
                var $average = data.from;
                var $money = $average * $item_price;
                $average_input.val($average);
                getProfit($average);
            }
        });
    });

</script>