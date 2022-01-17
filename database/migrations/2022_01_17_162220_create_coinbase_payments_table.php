<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinbasePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coinbase_payments', function (Blueprint $table) {
            $table->id();
            $table->uuid("public_id");
            $table->text("coinbase_id")->nullable();
            $table->string("coinbase_code")->nullable();
            $table->string("amount_deposit")->nullable();
            $table->boolean("is_resolved")->default(0);
            $table->text("timeline")->nullable();
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
        Schema::dropIfExists('coinbase_payments');
    }
}
