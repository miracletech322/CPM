<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApiColumnsInCoinData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coin_data', function (Blueprint $table) {
            $table->string("price")->nullable()->after("data");
            $table->string("reward_block")->nullable()->after("data");
            $table->string("reward")->nullable()->after("data");
            $table->string("difficulty")->nullable()->after("data");
            $table->string("network_hashrate")->nullable()->after("data");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coin_data', function (Blueprint $table) {
            //
        });
    }
}
