<?php

use App\User;
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
        User::create([

            'name' => 'fauzi',

            'email' => 'fauzi@zgraphic.id',

            'password' => bcrypt('12345678'),

            'role' => 'admin',
        ]);
    }
}
