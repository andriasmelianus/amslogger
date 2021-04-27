<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVRunningLogsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW v_running_logs AS
            SELECT
                t.id,
                t.submitted_at,
                t.`type`,
                u.`name` AS `PENGGUNA`,
                i.`name` AS `BARANG`,
                CONCAT(ABS(l.quantity), ' ', un.`name`) AS `JUMLAH`,
                l.`description` AS `CATATAN`
            FROM `logs` l
                INNER JOIN transactions t ON(l.transaction_id = t.id)
                INNER JOIN users u ON(u.id = t.user_id)
                INNER JOIN items i ON(i.id = l.item_id)
                INNER JOIN units un ON(un.id = i.unit_id)
            ORDER BY submitted_at DESC;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS v_running_logs");
    }
}
