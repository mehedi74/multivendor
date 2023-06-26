<?php

namespace Database\Seeders;


use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategoryRecords=[
            ['section_id'=>1,'category_id'=>1,'name'=>'T-shirt','image'=>'test.jpg','discount'=>0,'description'=>'','url'=>'t-shirt',
                'meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['section_id'=>1,'category_id'=>2,'name'=>'Top','image'=>'test.jpg','discount'=>0,'description'=>'','url'=>'top',
                'meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['section_id'=>1,'category_id'=>3,'name'=>'Frok','image'=>'test.jpg','discount'=>0,'description'=>'','url'=>'frok',
                'meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],
        ];
        SubCategory::insert($subCategoryRecords);
    }
}
