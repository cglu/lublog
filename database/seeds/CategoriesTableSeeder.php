<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use lublog\Categories;

class CategoriesTableSeeder extends Seeder
{

    /*
     * (non-PHPdoc)
     * @see \Illuminate\Database\Seeder::run()
     */
    public function run()
    {
        
        // TODO Auto-generated method stub
        DB::table('categories')->delete();
        Categories::create([
            'name' => '未分类'
        ]);
    }
}

?>