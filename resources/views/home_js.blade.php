<script>
    var $prefix = $('.miner-select').find('.miner-select-item.active').data('prefix');
    var $step = $('.miner-select').find('.miner-select-item.active').data('step');
    

    var $item_price = $('.miner-select').find('.miner-select-item.active').data('price');
    var $min_deposit = $('.miner-select').find('.miner-select-item.active').data('min');
    var $max_deposit = $('.miner-select').find('.miner-select-item.active').data('max');


    var $system = $('.miner-select').find('.miner-select-item.active').data('system');
    var $calc_min = $min_deposit / $item_price;
    var $calc_max = $max_deposit / $item_price;

    // var $min = $system == 2 ? $calc_min.toFixed(2) : Math.round($calc_min);
    // var $max = $system == 2 ? $calc_max.toFixed(2) : Math.round($calc_max);
    // var $from = $system == 2 ? $calc_min.toFixed(2) : Math.round($calc_min);

    var $min = $calc_min.toFixed(2);
    var $max = $calc_max.toFixed(2);
    var $from = $calc_min.toFixed(2);

    var setup = $(".miner-setup");
    var $profit_rate = $('.miner-select').find('.miner-select-item.active').data('profit');
  
    var instance;

    var $n = 1;
    var $s = 86400;
    var $investition_input = $('#data-input-price');
    var $average_input = $('#data-input-ghs');
    var $prefix_power_input = $('.input-prefix');
    var $daily_income = $('.calculate-earnings__calculator-results').find('#daily');
    var $month_income = $('.calculate-earnings__calculator-results').find('#month');
    var $year_income = $('.calculate-earnings__calculator-results').find('#year');
    var gpuLvl = $('.calculate-earnings__wrap').find('#gpuLvl');
    
    var price_th = '{{$pageData["price_th"]}}';
    var cost_per_kwh = '{{$pageData["cost_per_kwh"]}}';
    var power_consumption = '{{$pageData["power_consumption"]}}';

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
            setProfit(data.from);
        },
        onChange: function (data) {
            console.log(data)
            var $average = data.from;
            var $money = $average * $item_price;
            $investition_input.val(Math.round($money));
            $average_input.val($average);
            setProfit(data.from);
        },
        onUpdate: function (data) {
            console.log('here i am onUpdate')
            var $average = data.from;
            var $money = $average * $item_price;
            $average_input.val($average);
            setProfit(data.from);
        }
    });

    function setProfit(data) {

        var price_of_1th = price_th;
        var power_consumption_kw = power_consumption / 1000;
        var price_1th_per_hour = price_of_1th * power_consumption_kw;
        var price_1th_per_day = price_1th_per_hour * 24;
        var price_total_per_day = data * price_1th_per_day;

        alert(price_of_1th);

        var $daily_calc = (price_total_per_day).toFixed(2);
        var $month_calc = ($daily_calc * 30).toFixed(2);
        var $year_calc = ($daily_calc * 365).toFixed(2);

        $daily_income.html('$' + $daily_calc);
        $month_income.html('$' + $month_calc);
        $year_income.html('$' + $year_calc);
    }


    instance = setup.data("ionRangeSlider");

    $('.miner-select').on('click', '.miner-select-item:not(.active)', function (event) {
        
        $(this).closest('.miner-select').find('.miner-select-item').removeClass('active');
        $(this).addClass('active');
        $item_price = $(this).data('price');
        $profit_rate = $(this).data('profit');
        $min_deposit = $(this).data('min');
        $max_deposit = $(this).data('max');
        $prefix = $(this).data('prefix');
        $step = $(this).data('step');
        $system = $(this).data('system');

        $calc_min = $min_deposit / $item_price;
        $calc_max = $max_deposit / $item_price;

        //$min = $system == 2 ? $calc_min.toFixed(2) : Math.round($calc_min);
        //$max = $system == 2 ? $calc_min.toFixed(2) : Math.round($calc_min);
        //$from = $system == 2 ? $calc_min.toFixed(2) : Math.round($calc_min);

        var $min = $calc_min.toFixed(2);
        var $max = $calc_max.toFixed(2);
        var $from = $calc_min.toFixed(2);


        instance.update({
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


    $average_input.on("change", function () {

        var val = $(this).val();
        val = $system == 2 ? parseFloat(val).toFixed(2) : Math.round(val);
        console.log(val, $min, $max);
        var intRegex = /^\d+$/;
        var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;

        if (!intRegex.test(val) || !floatRegex.test(val)) {
            val = $min;
        }
        if (val < $min) {
            val = $min;
        }

        $average_input.val(val);
        instance.update({
            from: val, step: $step, onUpdate: function (data) {
                var $average = data.from;
                var $money = $average * $item_price;
                $investition_input.val(Math.round($money));
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
        instance.update({
            from: $calc, onUpdate: function (data) {
                var $average = data.from;
                var $money = $average * $item_price;
                $average_input.val($average);
            }
        });


    });





</script>