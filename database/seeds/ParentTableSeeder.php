<?php

use Illuminate\Database\Seeder;

class ParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_parents')->insert([
            'name' => 'news',
            'type' => 'news',
        ]);
    }
}
