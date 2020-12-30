<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateItemsOnHandFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        CREATE FUNCTION items_on_hand(p_item_id INT) RETURNS INT
        BEGIN
            DECLARE v_on_hand INT;
            
            SELECT IFNULL(SUM(quantity), 0) INTO v_on_hand
            FROM `logs`
            WHERE item_id = p_item_id
                AND declined_at IS NULL
                AND canceled_at IS NULL;
                
            RETURN v_on_hand;
        END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP FUNCTION IF EXISTS items_on_hand;");
    }
}
