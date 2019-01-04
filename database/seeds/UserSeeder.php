<?php

use Illuminate\Database\Seeder;
use User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => '123456',
        ]);
    }
}