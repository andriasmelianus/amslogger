<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['request', 'usage', 'stock-opname', 'purchase', 'return'])->default('usage');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->timestamp('handled_at')->nullable()->comment('Sudah disetujui/ditolak oleh atasan.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
