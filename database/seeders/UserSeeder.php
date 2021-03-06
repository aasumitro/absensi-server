<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
               'role_id' => 1,
               'unique_id' => "60c5ec77-1a73-4b0f-b247-dc61994dbf63",
               'telegram_id' => '585153765',
               'name' => 'A. A. Sumitro',
               'username' => 'aasumitro',
               'email' => 'aasumitro@gmail.com',
               'phone' => '82271115593',
               'attend_token' => \Hash::make('secret'),
               'attend_token_expiry' => Carbon::now()->addDays(10),
               'integration_code' => \Hash::make('ASD123qwe456ZXC')
           ]
        ]);

        $user_id = DB::getPdo()->lastInsertId();

        DB::table('profiles')->insert([
           [
               'user_id' => $user_id,
               'department_id' => 2
           ]
        ]);
    }
}
