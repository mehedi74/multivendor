<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VerndorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorRecords=[
            ['name'=>'Rakib', 'address'=>'Cp-123', 'city'=>'Dhaka', 'state'=>'Dhanmondi','image'=>'test.jpg',
                'country'=>'Bangladesh', 'pincode'=>'1009', 'mobile'=>'0172833434', 'email'=>'rakib@gmail.com',
                'password'=>'$2a$12$v6tND2VDe0kW9E242ZCBFesFlhPyf1MkeGQLQGSIZfdEKePaeCQNa', 'status'=> 1],
        ];
        Vendor::insert($vendorRecords);
    }
}
