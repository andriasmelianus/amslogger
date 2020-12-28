<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32);
            $table->string('vendor_name', 32)->nullable();
            $table->unsignedInteger('unit_id')->nullable()->index('fk_items_units_idx');
            $table->unsignedInteger('brands_id')->nullable()->index('fk_items_brands1_idx');
            $table->unsignedInteger('category_id')->nullable()->index('fk_items_categories1_idx');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('items');
    }
}