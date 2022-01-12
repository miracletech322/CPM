<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->uuid("public_id");
            $table->bigInteger("user_id")->nullable();
            $table->bigInteger("payment_id")->nullable();
            $table->string("current_wallet_balance")->nullable()->comment="Wallet balance after action";
            $table->string("amount")->nullable();
            $table->integer("hashing_id")->nullable();
            $table->string("type")->nullable()->comment="1=withdraw, 2=deposit, 3=referral, 4=daily_income_cron";
            $table->string("payment_method")->nullable()->comment="1=coin, 2=bank, 3=card, 4=referral";
            $table->bigInteger("action_performmed_by")->nullable()->comment="For requests only";
            $table->datetime("action_performmed_at")->nullable()->comment="For requests only";
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ledgers');
    }
}
