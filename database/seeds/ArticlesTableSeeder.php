<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Create 50 fake articles records
        for($i = 0; $i < 50; $i++) {
            Article::create([
                'title' => $faker->sentence,
                'content' => $faker->text,
                'author_id' => $faker->randomNumber(2)
            ]);
        }
    }
}
