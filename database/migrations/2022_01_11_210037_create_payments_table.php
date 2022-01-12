<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->id();
            $table->uuid("public_id");
            $table->bigInteger("user_id")->nullable();
            $table->bigInteger("request_id")->nullable()->comment="if deposit request";
            $table->integer("hashing_id")->nullable();
            $table->text("card_data")->nullable();
            $table->bigInteger("payment_tranfered_to")->nullable();
            $table->string("temp_id", 255)->nullable();
            $table->string("payment_method")->nullable()->comment="1=card,2=bank,3=coin";
            $table->string("payment_type")->nullable(); //Deposit (Will be a text)
            $table->string("customer_profile_id", 255)->nullable();
            $table->string("payment_profile_id", 255)->nullable();
            $table->string("transaction_id", 255)->nullable();
            $table->string("last4")->nullable();
            $table->string("amount_deposit")->nullable();
            $table->text("payment_notes")->nullable();
            $table->boolean("auto_payment")->default(0);
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
        Schema::dropIfExists('payments');
    }
}
