<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productReecords = [
            [
                'section_id' => 1, 'category_id' => 1, 'subcat_id' => 1, 'brand_id' => 2, 'admin_type' => 'vendor', 'vendor_id' => 1,
                'admin_id'=>0,'sub_admin_id'=>0, 'name' => 'Casual T-shirt', 'code' => '123', 'color' => 'Red', 'price' => 540,
                'discount' => 10, 'weight' => 200, 'featured_image' => '', 'video' => '', 'short_description' => '',
                'long_description' => '','url' => '', 'meta_title' => '', 'meta_description' => '', 'meta_keywords' => '',
                'is_featured' => 'Yes', 'status' => 0,
            ],
            [
                'section_id' => 1, 'category_id' => 2, 'subcat_id' => 2, 'brand_id' => 2, 'vendor_id' => 1, 'admin_type' => 'vendor',
                'admin_id'=>0,'sub_admin_id'=>0, 'name' => 'Top', 'code' => '138', 'color' => 'Blue', 'price' => 580, 'discount' => 10,
                'weight' => 300, 'featured_image' => '', 'video' => '', 'short_description' => '', 'long_description' => '','url' => '',
                'meta_title' => '', 'meta_description' => '', 'meta_keywords' => '', 'is_featured' => 'Yes', 'status' => 0,
            ],
        ];
        Product::insert($productReecords);
    }
}
