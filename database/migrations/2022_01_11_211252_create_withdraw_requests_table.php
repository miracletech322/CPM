<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_requests', function (Blueprint $table) {
            $table->id();
            $table->uuid("public_id");
            $table->bigInteger("user_id")->nullable();
            $table->boolean("is_resolved")->default(0);
            $table->boolean("is_accepted")->nullable();
            $table->bigInteger("action_performed_by")->nullable();
            $table->datetime("action_performed_at")->nullable();
            $table->string("amount_withdraw")->nullable();
            $table->integer("hashing_id")->nullable();
            $table->longText("additional_details")->nullable();
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
        Schema::dropIfExists('withdraw_requests');
    }
}
