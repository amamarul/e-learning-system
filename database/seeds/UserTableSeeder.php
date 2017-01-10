<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user-'.str_random(2),
            'email' => 'user-'.str_random(2).'@gmail.com',
            'password' => bcrypt('secret'),
            'type' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Dennis',
            'email' => 'dennisageffen@hotmail.com',
            'password' => bcrypt('diesel123'),
            'type' => 'admin'
        ]);
    }
}
