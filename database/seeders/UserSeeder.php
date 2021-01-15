<?php

namespace Database\Seeders;

use App\Constants\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Andrias Melianus S',
                'email' => 'andriasmelianus@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_GOD
            ], [
                'name' => 'Yenni Woro',
                'email' => 'kaops_surabaya@victoriabank.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_APPROVER
            ], [
                'name' => 'Erli Nornawati',
                'email' => 'erli.nornawati@victoriabank.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_APPROVER
            ], [
                'name' => 'Tjendanadi Suparji',
                'email' => 'tjendanadi@victoriabank.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_APPROVER
            ], [
                'name' => 'Customer Service 1',
                'email' => 'cs_sub1@victoriabank.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_REQUESTER
            ], [
                'name' => 'Customer Service 2',
                'email' => 'cs_sub2@victoriabank.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_REQUESTER
            ], [
                'name' => 'Teller 1',
                'email' => 'teller_surabaya@victoriabank.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_REQUESTER
            ], [
                'name' => 'Teller 2',
                'email' => 'teller2_surabaya@victoriabank.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_REQUESTER
            ], [
                'name' => 'Back Office 1',
                'email' => 'bo_surabaya@victoriabank.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_REQUESTER
            ], [
                'name' => 'Back Office 2',
                'email' => 'bo2_surabaya@victoriabank.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_REQUESTER
            ], [
                'name' => 'Firdiah',
                'email' => 'firdiah@victoriabank.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_REQUESTER
            ], [
                'name' => 'Rangga Setiawan',
                'email' => 'rangga.setiawan@victoriabank.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_REQUESTER
            ], [
                'name' => 'Arlis',
                'email' => 'arlis@victoriabank.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_REQUESTER
            ], [
                'name' => 'Dhyka Bagus',
                'email' => 'dhyka@victoriabank.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_REQUESTER
            ], [
                'name' => 'Edy Eko Yunanto',
                'email' => 'edy.eko@victoriabank.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_REQUESTER
            ], [
                'name' => 'Eni Nurdiana',
                'email' => 'eni.nurdiana@victoriabank.co.id',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role' => User::TYPE_REQUESTER
            ],
        ]);
    }
}
