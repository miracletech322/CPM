<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSettinColumnsExtras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn("sha_price_th");
            $table->dropColumn("sha_cost_per_kwh");
            $table->dropColumn("sha_power_consumption");
            $table->dropColumn("sha_maintenance_fee");
            $table->dropColumn("eth_price_mh");
            $table->dropColumn("eth_cost_per_kwh");
            $table->dropColumn("eth_power_consumption");
            $table->dropColumn("eth_maintenance_fee");
            $table->dropColumn("equi_price_kh");
            $table->dropColumn("equi_cost_per_kwh");
            $table->dropColumn("equi_power_consumption");
            $table->dropColumn("equi_maintenance_fee");
            $table->dropColumn("sha_min");
            $table->dropColumn("sha_max");
            $table->dropColumn("eth_min");
            $table->dropColumn("eth_max");
            $table->dropColumn("equi_min");
            $table->dropColumn("equi_max");
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
