<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $brandRecords=[
           ['name'=>'RichMan','section_id'=>1],
           ['name'=>'Zara','section_id'=>1],

       ];
       Brand::insert($brandRecords);
    }
}
