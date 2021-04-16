<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            ['id' => 1, 'name' => 'pcs'],
            ['id' => 2, 'name' => 'pak'],
            ['id' => 3, 'name' => 'roll'],
            ['id' => 4, 'name' => 'pad'],
            ['id' => 5, 'name' => 'botol'],
            ['id' => 6, 'name' => 'rim'],
            ['id' => 7, 'name' => 'buku'],
        ]);
    }
}
