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
        Categories::create([
            'name' => 'PHP'
        ]);
        Categories::create([
            'name' => 'Mysql'
        ]);
        Categories::create([
            'name' => '个人随笔'
        ]);
    }
}

?>