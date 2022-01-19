<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStripePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stripe_payments', function (Blueprint $table) {
            $table->id();
            $table->uuid("public_id");
            $table->bigInteger("user_id")->nullable();
            $table->integer("hashing_id")->nullable();
            $table->string("energy_bought")->nullable();
            $table->text("card_data")->nullable();
            $table->bigInteger("payment_tranfered_to")->nullable();
            $table->string("temp_id", 255)->nullable();
            $table->string("customer_profile_id", 255)->nullable();
            $table->string("payment_profile_id", 255)->nullable();
            $table->string("transaction_id", 255)->nullable();
            $table->string("last4")->nullable();
            $table->string("amount_deposit")->nullable();
            $table->text("payment_notes")->nullable();
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
        Schema::dropIfExists('stripe_payments');
    }
}
