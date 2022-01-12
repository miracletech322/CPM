<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMinMaxEnergyInSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string("sha_min")->nullable()->after("sha_price_th");
            $table->string("sha_max")->nullable()->after("sha_price_th");
            $table->string("eth_min")->nullable()->after("sha_price_th");
            $table->string("eth_max")->nullable()->after("sha_price_th");
            $table->string("equi_min")->nullable()->after("sha_price_th");
            $table->string("equi_max")->nullable()->after("sha_price_th");
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
