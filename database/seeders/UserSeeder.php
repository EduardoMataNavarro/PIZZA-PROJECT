<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Eduardo',
            'email' => 'eduardo@tester.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'testinf',
            'email' => 'client@tester.com',
            'password' => bcrypt('client'),
            'role_id' => 2,
        ]);
    }
}
