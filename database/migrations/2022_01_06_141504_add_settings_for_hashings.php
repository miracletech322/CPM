<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSettingsForHashings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('settings', function (Blueprint $table) {

            $table->dropColumn("price_th");
            $table->dropColumn("cost_per_kwh");
            $table->dropColumn("power_consumption");
            $table->dropColumn("maintenance_fee");

            $table->string("sha_price_th")->after("swift_bic")->nullable();
            $table->string("sha_cost_per_kwh")->after("swift_bic")->nullable();
            $table->string("sha_power_consumption")->after("swift_bic")->nullable();
            $table->string("sha_maintenance_fee")->after("swift_bic")->nullable();

            $table->string("eth_price_mh")->after("swift_bic")->nullable();
            $table->string("eth_cost_per_kwh")->after("swift_bic")->nullable();
            $table->string("eth_power_consumption")->after("swift_bic")->nullable();
            $table->string("eth_maintenance_fee")->after("swift_bic")->nullable();

            $table->string("equi_price_kh")->after("swift_bic")->nullable();
            $table->string("equi_cost_per_kwh")->after("swift_bic")->nullable();
            $table->string("equi_power_consumption")->after("swift_bic")->nullable();
            $table->string("equi_maintenance_fee")->after("swift_bic")->nullable();
        
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
