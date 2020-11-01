<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@zgraphic.com',
                'password' => Hash::make('12345'),
                'role' => 'admin',
            ],
            [
                'name' => 'zamzam',
                'email' => 'zamzam@zgraphic.com',
                'password' => Hash::make('12345'),
                'role' => 'owner',
            ],
            [
                'name' => 'dummy marketer',
                'email' => 'dummy_marketer@zgraphic.com',
                'password' => Hash::make('12345'),
                'role' => 'Marketer',
            ]
        );
    }
}
