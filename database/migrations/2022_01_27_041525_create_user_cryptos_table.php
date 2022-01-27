<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCryptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cryptos', function (Blueprint $table) {
            $table->id();
            $table->uuid("public_id");
            $table->bigInteger("user_id")->nullable();
            $table->integer("crypto_option_id")->nullable();
            $table->text("wallet_address")->nullable();
            $table->boolean("is_active")->default(0)->comment="Recent Selected = active when multiple";
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_cryptos');
    }
}
