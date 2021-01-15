<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVItemsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW v_items AS
        SELECT items.id,
            items.`name`,
            items.`name_for_vendor`,
            items.unit_id,
            units.`name` AS unit_name,
            items.brand_id,
            brands.`name` AS brand_name,
            items.category_id,
            categories.`name` AS category_name,
            items.`description`,
            items_on_hand(items.id) AS on_hand,
            items_last_price(items.id) AS price,
            items.created_at,
            items.updated_at
        FROM items
            LEFT OUTER JOIN units ON(items.unit_id = units.id)
            LEFT OUTER JOIN brands ON(items.brand_id = brands.id)
            LEFT OUTER JOIN categories ON(items.category_id = categories.id)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_items");
    }
}
