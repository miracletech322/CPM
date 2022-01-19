<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropExtraColumnsFromPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn("temp_id");
            $table->dropColumn("card_data");
            $table->dropColumn("payment_tranfered_to");
            $table->dropColumn("customer_profile_id");
            $table->dropColumn("payment_profile_id");
            $table->dropColumn("transaction_id");
            $table->dropColumn("last4");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
}
