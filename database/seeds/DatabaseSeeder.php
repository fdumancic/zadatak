<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'filip',
            'email' => 'filip@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(20),
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'ivan',
            'email' => 'ivan@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(20),
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'marko',
            'email' => 'marko@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(20),
            'created_at' => now(),
        ]);


    }
}
