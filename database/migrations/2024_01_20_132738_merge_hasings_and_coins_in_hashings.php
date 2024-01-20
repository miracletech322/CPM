<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MergeHasingsAndCoinsInHashings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hashings', function (Blueprint $table) {
            $table->double("max_buyable")->nullable()->after("name")->comment="KH-s";
            $table->double("min_buyable")->nullable()->after("name")->comment="KH-s";
            $table->double("maintenance_fee")->nullable()->after("name")->comment="Percentage";
            $table->double("power_consumption")->nullable()->after("name")->comment="w / 1KH-s";
            $table->double("cost_per_kwh")->nullable()->after("name")->comment="KWh";
            $table->double("price_khs")->nullable()->after("name")->comment="1KH/s in $";
            $table->boolean("is_active")->default(1)->after("name");
        });


        Schema::table('coin_data', function (Blueprint $table) {
            $table->string("unit")->nullable()->after("hashing_id");
            $table->longText("formula")->nullable()->after("hashing_id");
            $table->boolean("is_active")->default(1)->after("hashing_id");
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hashings', function (Blueprint $table) {
            //
        });
    }
}
