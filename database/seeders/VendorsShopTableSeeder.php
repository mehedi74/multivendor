<?php

namespace Database\Seeders;

use App\Models\VendorsShopDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shopTableRecords=[
            [
                'vendor_id'=>2,'shop_name'=>'RakibElectronics','shop_address'=>'Dhanmondi 8/A','shop_city'=>'Dhaka',
                'shop_state'=>'Dhaka', 'shop_country'=>'Bangladesh', 'shop_mobile'=>'01755871232', 'shop_email'=>'shop2@gmail.com',
                'shop_website'=>'shop234.com', 'address_proof'=>'passport', 'address_proof_image'=>'test1.jpg', 'business_license_number'=>'74445',
                'gst_number'=>'44467', 'pan_number'=>'2344223',
            ]
        ];
        VendorsShopDetail::insert($shopTableRecords);
    }
}
