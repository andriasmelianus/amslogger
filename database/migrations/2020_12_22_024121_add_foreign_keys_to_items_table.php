<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->foreign('brands_id', 'fk_items_brands1')->references('id')->on('brands')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('category_id', 'fk_items_categories1')->references('id')->on('categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('unit_id', 'fk_items_units')->references('id')->on('units')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('fk_items_brands1');
            $table->dropForeign('fk_items_categories1');
            $table->dropForeign('fk_items_units');
        });
    }
}
