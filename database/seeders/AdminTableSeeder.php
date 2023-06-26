<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminReecords= [
            [
                'name'=>'Rakib',
                'type'=>'vendor',
                'vendor_id'=>2,
                'admin_id'=>0,
                'subadmin_id'=>0,
                'mobile'=>'0172833434',
                'email'=>'rakib@gmail.com',
                'password'=>'$2a$12$v6tND2VDe0kW9E242ZCBFesFlhPyf1MkeGQLQGSIZfdEKePaeCQNa',
                'image'=>'',
                'status'=>0,
            ],
        ];
        Admin::insert($adminReecords);
    }
}
