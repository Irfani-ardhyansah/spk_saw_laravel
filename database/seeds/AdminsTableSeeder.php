<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(
            [
                'name' => 'super_admin',
                'email' => 'super_admin@admin.com',
                'password' => bcrypt('password'),
                'role'  =>  '0'
            ], [
                'name'  =>  'admin',
                'email' =>  'admin@admin.com',
                'password'  =>  bcrypt('password'),
                'role'  =>  '1'
            ], [
                'name'  =>  'pimpinan',
                'email' =>  'pimpinan@admin.com',
                'password'  =>  bcrypt('password'),
                'role'  =>  '2'
            ]
        );
    }
}
