<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Superman',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 1
     ]);
     
     App\User::create([
            'name' => 'Ema Setyawati, S.Si, Apt, ME',
            'email' => 'direktur@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 2
     ]);
     
     App\User::create([
            'name' => 'Neni Yuliza, S.Si, Apt',
            'email' => 'kasubdit@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 3
     ]);     
    }
}
