<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'npm' => '183307009',
            'email' => 'user@user.com',
            'password' => bcrypt('password')
        ]);
    }
}
