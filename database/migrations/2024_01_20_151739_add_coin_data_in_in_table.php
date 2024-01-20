<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoinDataInInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $tables_arr = [
            "coinbase_payments",
            "deposit_requests",
            "ledgers",
            "payments",
            "stripe_payments",
            "withdraw_requests"
        ];

        foreach ($tables_arr as $key => $item) {
            Schema::table($item, function (Blueprint $table) {
                $table->bigInteger("coin_data_id")->after("hashing_id")->nullable();
            });

            DB::table($item)->update([
                "coin_data_id" => DB::Raw("hashing_id")
            ]);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('in', function (Blueprint $table) {
            //
        });
    }
}
