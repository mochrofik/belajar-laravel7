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
        // $this->call(UserSeeder::class);

        DB::table('users')->insert([
            'first_name'=> 'Moch',
            'profil'=> '',
            'last_name'=> 'Rofi',
            'email'=> 'rofik@gmail.com',
            'password'=> Hash::make('123456'),
        ]);
    }
}
