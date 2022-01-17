<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoinbaseStatusInLedgers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ledgers', function (Blueprint $table) {
            $table->string("coinbase_timeline_status")->nullable()->after("payment_method");
            $table->bigInteger("coinbase_payment_id")->nullable()->after("payment_method");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ledgers', function (Blueprint $table) {
            //
        });
    }
}
