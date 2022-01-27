<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableColumnsInWithdrawRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('withdraw_requests', function (Blueprint $table) {
            $table->integer("payment_method")->nullable()->after("hashing_id")->comment="1=card,2=bank,3=coin";
            $table->bigInteger("payment_via_id")->nullable()->after("hashing_id")->comment="if 2 then user banks else user crypto";
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("bank_account_number");
            $table->dropColumn("bank_full_name");
            $table->dropColumn("bank_swift_bic");
            $table->dropColumn("bank_card_number");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('withdraw_requests', function (Blueprint $table) {
            //
        });
    }
}
