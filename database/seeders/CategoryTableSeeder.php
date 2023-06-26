<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryRecords=[
            ['section_id'=>1,'name'=>'Men','image'=>'test.jpg','discount'=>0,'description'=>'','url'=>'men',
                'meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['section_id'=>1,'name'=>'Women','image'=>'test.jpg','discount'=>0,'description'=>'','url'=>'women',
                'meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['section_id'=>1,'name'=>'Kids','image'=>'test.jpg','discount'=>0,'description'=>'','url'=>'kids',
                'meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
        ];
        Category::insert($categoryRecords);
    }
}
