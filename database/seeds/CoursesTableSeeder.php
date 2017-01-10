<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert(
            ['title' => 'Ticstoornissen',
                'category_id' => 1],
            ['title' => 'Compuls (TACTICS)',
                'category_id' => 1],
            ['title' => 'Dwangstoornissen',
                'category_id' => 1],
            ['title' => 'Autisme bij jongeren vanaf 14 jaar',
                'category_id' => 1]
        );
    }
}
