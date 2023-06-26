<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBankDetail;
use App\Models\VendorsShopDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SuperAdminController extends Controller
{
    public function updateDetails(Request $request)
    {
        Session::put('page','update_deatils');
        if ($request->isMethod('post')) {
            $rules = [
                'admin_name' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
                'admin_mobile' => 'required|numeric',
            ];
            $customMessage = [
                'admin_name.required' => 'Admin Name is Required',
                'admin_name.regex' => 'Name format is not correct.Please give text only (a-z)or(A-Z)',
                'admin_mobile.required' => 'Mobile is Required',
                'admin_name.numeric' => 'Please enter number 0-9',
            ];
            $this->validate($request, $rules, $customMessage);
            Admin::updateDetails($request);
            return back()->with('msg', 'Congrats! Details updated Successfully');
        }
        $adminDetails = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        return view('admin.super-admin.setting.update_details', ['adminDetails' => $adminDetails]);
    }


    public function adminManagement($slug)
    {
        //if we want to show all admins in same page according their type...
        $title = ucfirst($slug);
        if ($slug == 'all') {
            $admins = Admin::all();
            Session::put('page','all');
            return view('admin.super-admin.admin-management.admin-by-type', ['admins' => $admins, 'title' => $title,'slug'=>$slug]);
        } else {
            Session::put('page',$slug);
            $admins = Admin::where('type', $slug)->get();
            return view('admin.super-admin.admin-management.admin-by-type', ['admins' => $admins, 'title' => $title,'slug'=>$slug]);
        }
    }

    public function updateAdminStatus(string $id)
    {
        $admin = Admin::find($id);
        if ($admin->status == 1) {
            $admin->update(['status' => 0]);
        } else {
            $admin->update(['status' => 1]);
        }
        return back()->with('msg', 'Congrats! Status Updated Successfully');
    }

    public function deleteAdmin($id)
    {
        $admin = Admin::find($id);
        if ($admin->type == 'vendor') {
            $vendor=Vendor::where('id',$admin->vendor_id)->first();
            $vendor->delete();
            $vendorShopDetail=VendorsShopDetail::where('vendor_id',$admin->vendor_id)->first();
            $vendorShopDetail->delete();
            $vendorBankDetail=VendorsBankDetail::where('vendor_id',$admin->vendor_id)->first();
            $vendorBankDetail->delete();
            $admin->delete();
        }
//        elseif(($admin->type == 'admin') ){
//
//        }elseif(($admin->type == 'subadmin') ){
//
//        }
        return back();
    }
}
