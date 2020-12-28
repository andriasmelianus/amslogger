<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('item_id')->index('fk_requests_items1_idx');
            $table->integer('quantity')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('user_id')->index('fk_requests_users1_idx');
            $table->timestamps();
            $table->timestamp('handled_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
