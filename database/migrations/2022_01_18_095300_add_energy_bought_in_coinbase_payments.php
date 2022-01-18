<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnergyBoughtInCoinbasePayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coinbase_payments', function (Blueprint $table) {
            $table->string("energy_bought")->nullable()->after("amount_deposit");
            $table->string("hashing_id")->nullable()->after("amount_deposit");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coinbase_payments', function (Blueprint $table) {
            //
        });
    }
}
