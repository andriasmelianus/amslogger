<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            ['name' => 'Joyko'],
            ['name' => 'Standard'],
            ['name' => 'Kenko'],
            ['name' => 'Nachi'],
            ['name' => 'MAX'],
            ['name' => 'Bantex'],
            ['name' => 'Etona'],
            ['name' => 'Epson'],
            ['name' => 'Kyocera'],
            ['name' => 'Samsung'],
            ['name' => 'Logitech'],
            ['name' => 'LG'],
        ]);
    }
}
