<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->foreign('transaction_id', 'fk_logs_transactions1')->references('id')->on('transactions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('item_id', 'fk_usages_items1')->references('id')->on('items')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_id_requester', 'fk_usages_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_id_approver', 'fk_usages_users2')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->dropForeign('fk_logs_transactions1');
            $table->dropForeign('fk_usages_items1');
            $table->dropForeign('fk_usages_users1');
            $table->dropForeign('fk_usages_users2');
        });
    }
}
