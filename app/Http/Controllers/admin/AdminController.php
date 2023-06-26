<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        Session::put('page', 'dashboard');
        return view('admin.home.index');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'admin_email' => 'required|max:255',
                'admin_password' => 'required',
            ];
            $erroerMessages = [
                'admin_email.required' => 'Email is required.',
                'admin_email.admin_email' => 'Please give correct email format',
                'admin_password.required' => 'Password is required',
            ];
            $this->validate($request, $rules, $erroerMessages);
            $data = $request->all();
            if (Auth::guard('admin')->attempt(['email' => $data['admin_email'], 'password' => $data['admin_password'], 'status' => 1])) {
                return redirect('/admin/dashboard');
            } else {
                return back()->with('msg', 'Invalid username or password');
            }
        }
        return view('admin.login.index');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function checkCurrentPassword(Request $request)
    {
        $admin = $request->all();
        if (Hash::check($admin['current_password'], Auth::guard('admin')->user()->password)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function updatePassword(Request $request)
    {
        Session::put('page', 'update_password');
        if ($request->isMethod('POST')) {
            $validated = $request->validate([
                'current_password' => 'required',
                'confirm_password' => 'required',
                'new_password' => 'required',
            ]);

            $admin = $request->all();
            if (Hash::check($admin['current_password'], Auth::guard('admin')->user()->password)) {
                if ($admin['new_password'] == $admin['confirm_password']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update([
                        'password' => bcrypt($admin['new_password']),
                    ]);
//                    according to admin type vendor/admin/subadmin personal table password coloumn will be updated...
                    return back()->with('msg', 'Congrats! Password updated Successfully');
                } else {
                    return back()->with('msg', 'New Passsword and Confirm Password do not match');
                }
            } else {
                return back()->with('msg', 'Current Password is not Correct');
            }
        }
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return view('admin.setting.update_password', ['adminDetails' => $adminDetails]);
    }

    public function error(){
        return view('admin.error.error');
    }

    public function vendorDetails(string $id)
    {
        //we use eloquent orm relationship...
        Session::put('page','vendor-detail');
        $vendorDetail = Admin::with('vendorPersonalDetail', 'vendorShopDetail', 'vendorBankDetail')->where('vendor_id', $id)->first();
        return view('admin.vendor.detail.vendor-detail', ['vendorDetail' => $vendorDetail]);
    }
}
