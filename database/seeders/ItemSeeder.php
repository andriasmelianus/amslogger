<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'BOLPEN BIRU',
                'name_for_vendor' => 'BALLPOINT BIRU',
                'unit_id' => 1,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'BOLPEN MERAH',
                'name_for_vendor' => 'BALLPOINT MERAH',
                'unit_id' => 1,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'KERTAS A4',
                'name_for_vendor' => 'KERTAS A4',
                'unit_id' => 6,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'KERTAS F4',
                'name_for_vendor' => 'KERTAS F4',
                'unit_id' => 6,
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
