<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            ['title' => 'Angst- en stemmingsstoornissen'],
            ['title' => 'Autisme Spectru, Stoornissen (ASS)'],
            ['title' => 'Medicatie'],
            ['title' => 'ADHD en gedragstoornissen'],
            ['title' => 'Vroegsignalering psychgiatrische problemen'],
            ['title' => 'Psychiatrie en licht verstandelijke beperking'],
            ['title' => 'Innovatieve behandelvormen'],
            ['title' => 'Kinder- en jeugdpsychiatrie algemeen'],
            ['title' => 'Psychiatrie bij jonge kinderen (0-6 jaar)'],
            ['title' => 'Veiligheid']
        ];

        foreach ($insert as $item) {
            DB::table('categories')->insert(
                $item
            );
        }
    }
}
