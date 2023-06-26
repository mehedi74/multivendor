<?php

namespace Database\Seeders;

use App\Models\VendorsBankDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorBankTableRecords=[
            [
                'vendor_id'=>2,'bank_name'=>'Sonali  Islami Bank Limited','account_holder_name'=>'Mr.Rakib','account_number'=>'520445078848',
                'bank_ifsc_code'=>'DhakaT',
            ]
        ];
        VendorsBankDetail::insert($vendorBankTableRecords);
    }
}
