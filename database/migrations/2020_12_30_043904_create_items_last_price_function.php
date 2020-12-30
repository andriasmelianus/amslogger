<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateItemsLastPriceFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE FUNCTION items_last_price(p_item_id INT) RETURNS INT
        BEGIN
            DECLARE v_last_price INT;
            
            SELECT IFNULL(price, 0) INTO v_last_price
            FROM `logs`
            WHERE item_id = p_item_id
                AND updated_at = (
                    SELECT max(updated_at) 
                    FROM `v_logs` 
                    WHERE item_id = p_item_id
                        AND type = 'purchase'
                );
            
            RETURN v_last_price;
        END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP FUNCTION IF EXISTS items_last_price");
    }
}
