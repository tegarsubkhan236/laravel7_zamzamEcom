<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // check if table users is empty
        if (DB::table('users')->get()->count() == 0) {

            DB::table('users')->insert([

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

            ]);
        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }
    }
}
