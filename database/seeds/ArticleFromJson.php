<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticleFromJson extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->delete();
        $json = File::get("serialize/load.json");
        $data = json_decode($json);

        foreach ($data as $obj) {
            Article::create(array(
                'title' => $obj->title,
                'author_id' => $obj->author_id,
                'content' => $obj->content                
            ));
        }
    }
}
