<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryFromJson extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $json = File::get("serialize/load.json");
        $data = json_decode($json);

        foreach ($data as $obj) {
            Category::create(array(
                'category_name' => $obj->category_name,             
            ));
        }
    }
}
