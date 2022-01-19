<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStripePaymentIdInLedgers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ledgers', function (Blueprint $table) {
            $table->bigInteger("stripe_payment_id")->nullable()->after("coinbase_payment_id");
        });

        Schema::table('deposit_requests', function (Blueprint $table) {
            $table->bigInteger("stripe_payment_id")->nullable()->after("coinbase_payment_id");
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->bigInteger("stripe_payment_id")->nullable()->after("coinbase_payment_id");
            $table->dropColumn("coinbase_code");
            $table->dropColumn("coinbase_id");
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
