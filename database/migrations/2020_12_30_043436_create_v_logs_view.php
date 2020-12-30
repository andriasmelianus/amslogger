<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVLogsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW v_logs AS
        SELECT 
            `logs`.id,
            transactions.`type`,
            `logs`.item_id,
            `logs`.quantity,
            `logs`.price,
            `logs`.`description`,
            `logs`.`user_id_requester`,
            `logs`.`user_id_approver`,
            `logs`.`created_at`,
            `logs`.`updated_at`,
            `logs`.`approved_at`,
            `logs`.`declined_at`,
            `logs`.`declined_reason`,
            `logs`.`canceled_at`
        FROM `logs`
            JOIN transactions ON(`logs`.transaction_id = transactions.id)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_logs");
    }
}
