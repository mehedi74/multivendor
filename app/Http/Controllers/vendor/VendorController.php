<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorsBankDetail;
use App\Models\VendorsShopDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VendorController extends Controller
{
    public function updateVendorDetails($slug, Request $request)
    {
        if ($slug == 'personal') {
            if ($request->isMethod('post')) {
                $rules = [
                    'vendor_name' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
                    'vendor_address' => 'required',
                    'vendor_city' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
                    'vendor_state' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
                    'vendor_country' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
                    'vendor_mobile' => 'required|numeric',
                    'vendor_pincode' => 'required',
                ];
                $customMessage = [
                    'vendor_name.required' => 'Vendor name is required',
                    'vendor_address.required' => 'Vendor address is required',
                    'vendor_city.required' => 'Vendor city is required',
                    'vendor_state.required' => 'Vendor state is required',
                    'vendor_country.required' => 'Vendor country is required',
                    'vendor_pincode.required' => 'Vendor pincode is required',
                    'vendor_mobile.required' => 'Vendor mobile is required',
                    'vendor_name.regex' => 'Name format is not correct.Please give text only (a-z)or(A-Z)',
                    'vendor_city.regex' => 'City format is not correct.Please give text only (a-z)or(A-Z)',
                    'vendor_state.regex' => 'State format is not correct.Please give text only (a-z)or(A-Z)',
                    'vendor_country.regex' => 'Country format is not correct.Please give text only (a-z)or(A-Z)',
                    'vendor_mobile.numeric' => 'Please enter number 0-9',
                ];
                $this->validate($request, $rules, $customMessage);
                Vendor::updateDeatil($request);
                return back()->with('msg', 'Profile Updated Successfully');
            }
            $vendorPersonalDetail = Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first();
            Session::put('page','personal');
            return view('admin.vendor.setting.update_vendor_details', ['vendorPersonalDetail' => $vendorPersonalDetail], ['slug' => $slug]);

        }elseif ($slug == 'shop') {
            if ($request->isMethod('post')) {
                $rules = [
                    'shop_name' => 'required',
                    'shop_address' => 'required',
                    'shop_country' => 'required',
                    'shop_state' => 'required',
                    'shop_city' => 'required',
                    'shop_mobile' => 'required|numeric',
                    'shop_website' => 'required',
                    'shop_email' => 'required',
                    'address_proof' => 'required',
                    'business_license_number' => 'required',
                    'gst_number' => 'required',
                    'pan_number' => 'required',
                ];
                $this->validate($request, $rules);
                VendorsShopDetail::updateShopDetail($request);
                return back()->with('msg', 'Shop Details Updated Successfully');
            }
            $vendorShopDetail = VendorsShopDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first();
            Session::put('page','shop');
            return view('admin.vendor.setting.update_vendor_details', ['vendorShopDetail' => $vendorShopDetail], ['slug' => $slug]);
        }elseif ($slug == 'bank') {
            if ($request->isMethod('post')) {
                $rules = [
                    'ac_holder_name' => 'required|regex:/^[a-zA-Z ]*$/',
                    'bank_name' => 'required|regex:/^[a-zA-Z ]*$/',
                    'account_number' => 'required|numeric',
                    'bank_ifsc_code' => 'required',
                ];
                //regular expression should be learn for form validation to create custom perfect message....
                $this->validate($request, $rules);
                VendorsBankDetail::updateBankDetail($request);
                return back()->with('msg', 'Bank Detail Updated successfully');
            }
            $vendorBankDetail = VendorsBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first();
            Session::put('page','bank');
            return view('admin.vendor.setting.update_vendor_details', ['vendorBankDetail' => $vendorBankDetail], ['slug' => $slug]);
        }
    }
}
