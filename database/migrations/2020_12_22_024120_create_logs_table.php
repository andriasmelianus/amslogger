<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transaction_id')->index('fk_logs_transactions1_idx');
            $table->unsignedInteger('item_id')->index('fk_usages_items1_idx');
            $table->integer('quantity')->comment('Positif berarti penambahan, negatif berarti pengurangan stok.');
            $table->decimal('price', 12)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('user_id_requester')->index('fk_usages_users1_idx');
            $table->unsignedInteger('user_id_approver')->nullable()->index('fk_usages_users2_idx');
            $table->timestamps();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('declined_at')->nullable();
            $table->text('declined_reason')->nullable();
            $table->timestamp('canceled_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
