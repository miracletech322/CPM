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
var $min = $system == 2 ? $calc_min.toFixed(2) : Math.round($calc_min);
var $max = $system == 2 ? $calc_max.toFixed(2) : Math.round($calc_max);
var $from = $system == 2 ? $calc_min.toFixed(2) : Math.round($calc_min);

var $sha_256_difficulty = $('#sha_256_difficulty').val();
var $sha_256_reward_block = $('#sha_256_reward_block').val();
var $hashRate = hashRate($from);
var $n = 1;
var $s = 86400;
var $investition_input = $('#data-input-price');
var $average_input = $('#data-input-ghs');
var $prefix_power_input = $('.input-prefix');
var $bonus_checkbox = $('#bonus-input-check');
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
        if ($bonus_checkbox.is(":checked")) {
            $income_calc = $income_calc * ($bonus / 100 + 1);
        }

        var $month_calc = ($income_calc).toFixed(2);
        var $year_calc = ($month_calc * 12).toFixed(2);
        var $daily_calc = ($month_calc / 30).toFixed(2);
        $daily_income.html('$' + $daily_calc);
        $month_income.html('$' + $month_calc);
        $year_income.html('$' + $year_calc);
        changeGpu(data.from_percent);
    },
    onChange: function (data) {
        console.log(data)
        var $average = data.from;
        var $money = $average * $item_price;
        $investition_input.val(Math.round($money));
        $average_input.val($average);
        // var $income_calc = ($money / 100) * $profit_rate;
        var $income_calc = getProfit($average,30);
        if ($bonus_checkbox.is(":checked")) {
            $income_calc = $income_calc * ($bonus / 100 + 1);
        }

        var $month_calc = ($income_calc).toFixed(2);
        var $year_calc = ($month_calc * 12).toFixed(2);
        var $daily_calc = ($month_calc / 30).toFixed(2);

        $daily_income.html('$' + $daily_calc);
        $month_income.html('$' + $month_calc);
        $year_income.html('$' + $year_calc);
        changeGpu(data.from_percent);
    },
    onUpdate: function (data) {
        console.log('here i am onUpdate')
        var $average = data.from;
        var $money = $average * $item_price;
        var $income_calc = getProfit($average,30);
        if ($bonus_checkbox.is(":checked")) {
            $income_calc = $income_calc * ($bonus / 100 + 1);
        }

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
    return (hash*$sha_256_reward_block*n*$s)/($sha_256_difficulty*4294967296)
}

function hashRate(from) {
    return from * 1000000000000
}
function changeGpu(ghsRange) {
    if (ghsRange <= 11.11) {
        if (gpuPower.data('lvl') != 1)
            gpuLvl.attr('data', '/pub/images/gpu/gpu-lvl-1-1.svg');
        gpuPower.data('lvl', '1');
        gpuLvl.removeClass('lvl3');
    }
    if (ghsRange > 11.11 && ghsRange <= 22.22) {
        if (gpuPower.data('lvl') != 2)
            gpuLvl.attr('data', '/pub/images/gpu/gpu-lvl-1-2.svg');
        gpuPower.data('lvl', '2');
        gpuLvl.removeClass('lvl3');
    }
    if (ghsRange > 22.22 && ghsRange <= 33.33) {
        if (gpuPower.data('lvl') != 3)
            gpuLvl.attr('data', '/pub/images/gpu/gpu-lvl-1-3.svg');
        gpuPower.data('lvl', '3');
        gpuLvl.removeClass('lvl3');
    }
    if (ghsRange > 33.33 && ghsRange <= 44.44) {
        if (gpuPower.data('lvl') != 4)
            gpuLvl.attr('data', '/pub/images/gpu/gpu-lvl-2-1.svg');
        gpuPower.data('lvl', '4');
        gpuLvl.removeClass('lvl3');
    }
    if (ghsRange > 44.44 && ghsRange <= 55.55) {
        if (gpuPower.data('lvl') != 5)
            gpuLvl.attr('data', '/pub/images/gpu/gpu-lvl-2-2.svg');
        gpuPower.data('lvl', '5');
        gpuLvl.removeClass('lvl3');
    }
    if (ghsRange > 55.55 && ghsRange <= 66.66) {
        if (gpuPower.data('lvl') != 6)
            gpuLvl.attr('data', '/pub/images/gpu/gpu-lvl-2-3.svg');
        gpuPower.data('lvl', '6');
        gpuLvl.removeClass('lvl3');
    }
    if (ghsRange > 66.66 && ghsRange <= 77.77) {
        if (gpuPower.data('lvl') != 7)
            gpuLvl.attr('data', '/pub/images/gpu/gpu-lvl-3-1.svg');
        gpuPower.data('lvl', '7');
        gpuLvl.add('lvl3');
    }
    if (ghsRange > 77.77 && ghsRange <= 88.88) {
        if (gpuPower.data('lvl') != 8)
            gpuLvl.attr('data', '/pub/images/gpu/gpu-lvl-3-2.svg');
        gpuPower.data('lvl', '8');
        gpuLvl.add('lvl3');
    }
    if (ghsRange > 88.88) {
        if (gpuPower.data('lvl') != 9)
            gpuLvl.attr('data', '/pub/images/gpu/gpu-lvl-3-3.svg');
        gpuPower.data('lvl', '9');
        gpuLvl.add('lvl3');
    }
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
    $min = $system == 2 ? $calc_min.toFixed(2) : Math.round($calc_min);
    $max = $system == 2 ? $calc_max.toFixed(2) : Math.round($calc_max);
    $from = $system == 2 ? $calc_min.toFixed(2) : Math.round($calc_min);
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
    changeGpu(5);
});
$bonus_checkbox.on("input", function () {
    instance.update();
});
$average_input.on("input", function () {
    var val = $(this).val();
    val = $system == 2 ? parseFloat(val).toFixed(2) : Math.round(val);
    console.log(val, $min, $max);
    if (val < $min) {
        val = $min;
    }
    instance.update({
        from: val, step: $step, onUpdate: function (data) {
            var $average = data.from;
            var $money = $average * $item_price;
            $investition_input.val(Math.round($money));
            var $income_calc = ($money / 100) * $profit_rate;
            if ($bonus_checkbox.is(":checked")) {
                $income_calc = $income_calc * ($bonus / 100 + 1);
            }
            var $daily_calc = ($income_calc / 30).toFixed(2);
            var $month_calc = ($daily_calc * 30).toFixed(2);
            var $year_calc = ($month_calc * 12).toFixed(2);
            $daily_income.html('$' + $daily_calc);
            $month_income.html('$' + $month_calc);
            $year_income.html('$' + $year_calc);
            changeGpu(data.from_percent);
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
            if ($bonus_checkbox.is(":checked")) {
                $income_calc = $income_calc * ($bonus / 100 + 1);
            }
            var $daily_calc = ($income_calc / 30).toFixed(2);
            var $month_calc = ($daily_calc * 30).toFixed(2);
            var $year_calc = ($month_calc * 12).toFixed(2);
            $daily_income.html('$' + $daily_calc);
            $month_income.html('$' + $month_calc);
            $year_income.html('$' + $year_calc);
            changeGpu(data.from_percent);
        }
    });
});