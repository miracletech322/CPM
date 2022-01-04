<script>
    var setup = $(".miner-setup");
    var $bonus = $('.miner-select').find('.miner-select-item.active').data('bonus');
    var $item_price = $('.miner-select').find('.miner-select-item.active').data('price');
    var $profit_rate = $('.miner-select').find('.miner-select-item.active').data('profit');
    var $min_deposit = $('.miner-select').find('.miner-select-item.active').data('min');
    var $max_deposit = $('.miner-select').find('.miner-select-item.active').data('max');
    var $prefix = $('.miner-select').find('.miner-select-item.active').data('prefix');
    var $step = $('.miner-select').find('.miner-select-item.active').data('step');
    var $system = $('.miner-select').find('.miner-select-item.active').data('system');
    var instance;
    var $calc_min = $min_deposit / $item_price;
    var $calc_max = $max_deposit / $item_price;
    var $min = $calc_min.toFixed(2);
    var $max = $calc_max.toFixed(2);
    var $from = $calc_min.toFixed(2);

    var $hashing_difficulty = $('.miner-select').find('.miner-select-item.active').data('difficulty');
    var $hashing_reward_block = $('.miner-select').find('.miner-select-item.active').data('reward');
    var $hashRate = hashRate($from);
    var $n = 1;
    var $s = 86400;
    var $investition_input = $('#data-input-price');
    var $average_input = $('#data-input-ghs');
    var $prefix_power_input = $('.input-prefix');
    var $daily_income = $('.calculate-earnings__calculator-results').find('#daily');
    var $month_income = $('.calculate-earnings__calculator-results').find('#month');
    var $year_income = $('.calculate-earnings__calculator-results').find('#year');
    var gpuPower = $('.calculate-earnings__wrap').find('#gpu-power');
    var gpuLvl = $('.calculate-earnings__wrap').find('#gpuLvl');
    var bonus_html = $('.calculate-earnings__wrap').find('#bonus_html');
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
            var $income_calc = getProfit($average,30);

            var $month_calc = ($income_calc).toFixed(2);
            var $year_calc = ($month_calc * 12).toFixed(2);
            var $daily_calc = ($month_calc / 30).toFixed(2);
            $daily_income.html('$' + $daily_calc);
            $month_income.html('$' + $month_calc);
            $year_income.html('$' + $year_calc);
        },
        onChange: function (data) {
            console.log(data)
            var $average = data.from;
            var $money = $average * $item_price;
            $investition_input.val(Math.round($money));
            $average_input.val($average);
            // var $income_calc = ($money / 100) * $profit_rate;
            var $income_calc = getProfit($average,30);
            
            var $month_calc = ($income_calc).toFixed(2);
            var $year_calc = ($month_calc * 12).toFixed(2);
            var $daily_calc = ($month_calc / 30).toFixed(2);

            $daily_income.html('$' + $daily_calc);
            $month_income.html('$' + $month_calc);
            $year_income.html('$' + $year_calc);
        },
        onUpdate: function (data) {
            console.log('here i am onUpdate')
            var $average = data.from;
            var $money = $average * $item_price;
            var $income_calc = getProfit($average,30);

            var $month_calc = ($income_calc).toFixed(2);
            var $year_calc = ($month_calc * 12).toFixed(2);
            var $daily_calc = ($month_calc / 30).toFixed(2);
            $daily_income.html('$' + $daily_calc);
            $month_income.html('$' + $month_calc);
            $year_income.html('$' + $year_calc);
        }
    });

    function getProfit(p,n) {
        var hash = p * 1000000000000;
        return (hash*$hashing_reward_block*n*$s)/($hashing_difficulty*4294967296)
    }

    function hashRate(from) {
        return from * 1000000000000
    }
    

    instance = setup.data("ionRangeSlider");
    $('.miner-select').on('click', '.miner-select-item:not(.active)', function (event) {
        $(this).closest('.miner-select').find('.miner-select-item').removeClass('active');
        $(this).addClass('active');
        $bonus = $(this).data('bonus');
        $item_price = $(this).data('price');
        $profit_rate = $(this).data('profit');
        $min_deposit = $(this).data('min');
        $max_deposit = $(this).data('max');
        $prefix = $(this).data('prefix');
        $step = $(this).data('step');
        $system = $(this).data('system');
        if ($bonus > 0) {
            bonus_html.find('input').show();
            bonus_html.find('label').html('+' + $bonus + '% ' + variable4);
        } else {
            bonus_html.find('input').hide();
            bonus_html.find('label').html(variable5);
        }
        $calc_min = $min_deposit / $item_price;
        $calc_max = $max_deposit / $item_price;
        $min = $calc_min.toFixed(2);
        $max = $calc_max.toFixed(2);
        $from = $calc_min.toFixed(2);

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
            $average_input.val(val);
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
                var $income_calc = ($money / 100) * $profit_rate;
               
                var $daily_calc = ($income_calc / 30).toFixed(2);
                var $month_calc = ($daily_calc * 30).toFixed(2);
                var $year_calc = ($month_calc * 12).toFixed(2);
                $daily_income.html('$' + $daily_calc);
                $month_income.html('$' + $month_calc);
                $year_income.html('$' + $year_calc);
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
                var $income_calc = ($money / 100) * $profit_rate;
                
                var $daily_calc = ($income_calc / 30).toFixed(2);
                var $month_calc = ($daily_calc * 30).toFixed(2);
                var $year_calc = ($month_calc * 12).toFixed(2);
                $daily_income.html('$' + $daily_calc);
                $month_income.html('$' + $month_calc);
                $year_income.html('$' + $year_calc);
            }
        });
    });

</script>