<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPowerFieldsInSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string("price_th")->after("swift_bic")->nullable();
            $table->string("cost_per_kwh")->after("swift_bic")->nullable();
            $table->string("power_consumption")->after("swift_bic")->nullable();
            $table->string("maintenance_fee")->after("swift_bic")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
}
