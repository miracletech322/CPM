<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdddBankColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("bank_card_number")->after("role_id")->nullable();
            $table->string("bank_full_name")->after("role_id")->nullable();
            $table->string("bank_account_number")->after("role_id")->nullable();
            $table->string("bank_swift_bic")->after("role_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
