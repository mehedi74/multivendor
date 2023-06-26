<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectionTableReords= [
            ['name'=>'Clothings','image'=>'test.jpg',],
            ['name'=>'Electronics','image'=>'test1.jpg',],
            ['name'=>'Housewear','image'=>'test2.jpg',]
            ];
        Section::insert($sectionTableReords);
    }
}
