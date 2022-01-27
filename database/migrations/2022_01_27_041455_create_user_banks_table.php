<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_banks', function (Blueprint $table) {
            $table->id();
            $table->uuid("public_id");
            $table->bigInteger("user_id")->nullable();
            $table->text("account_holder_name")->nullable();
            $table->text("account_number")->nullable();
            $table->string("country")->nullable();
            $table->string("bank_currency")->nullable();
            $table->text("bank_name")->nullable();
            $table->text("branch_name")->nullable();
            $table->text("swift_bic")->nullable();
            $table->text("iban_number")->nullable();
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
        Schema::dropIfExists('user_banks');
    }
}
