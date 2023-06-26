<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable=['name','mobile','image','password','status'];

    public function vendorPersonalDetail(){
        return $this->belongsTo(Vendor::class,'vendor_id');
    }
    public function vendorShopDetail(){
        return $this->belongsTo(VendorsShopDetail::class,'vendor_id');
    }
    public function vendorBankDetail(){
        return $this->belongsTo(VendorsBankDetail::class,'vendor_id');
    }

    public static function updateDetails($request){
        $newData = $request->all();
        $admin=Admin::where('id', Auth::guard('admin')->user()->id)->first();
        if($request->hasFile('admin_image')){
            if(file_exists($admin->image)){
                unlink($admin->image);
            }
        }
        $admin->update([
            'name' => $newData['admin_name'],
            'mobile' => $newData['admin_mobile'],
            'image'=>$request->hasFile('admin_image') ? self::imageUrl($request) : $admin->image,
        ]);
    }

    public static function imageUrl($request){
        $file=$request->file('admin_image');
        $imageOriginalName=$file->getClientOriginalName();
        $directory='assets/admin/images/admin/';
        $file->move($directory,$imageOriginalName);
        $imagePath=$directory.$imageOriginalName;
        return $imagePath;
    }
}
