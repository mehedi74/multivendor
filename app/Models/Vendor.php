<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable=['name','address','city','state','mobile','country','pincode','image'];

    public static function updateDeatil($request){

        $vendorPersonalDetail=Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first();
        $vendorPersonalDetail->name=$request->vendor_name;
        $vendorPersonalDetail->address=$request->vendor_address;
        $vendorPersonalDetail->city=$request->vendor_city;
        $vendorPersonalDetail->state=$request->vendor_state;
        $vendorPersonalDetail->mobile=$request->vendor_mobile;
        $vendorPersonalDetail->country=$request->vendor_country;
        $vendorPersonalDetail->pincode=$request->vendor_pincode;
        if($request->hasFile('vendor_image')){
            if(file_exists($vendorPersonalDetail->image)){
                unlink($vendorPersonalDetail->image);
            }
            $vendorPersonalDetail->image=self::imageUrl($request);
        }else{
            $oldImage= $vendorPersonalDetail->image;
            $vendorPersonalDetail->image=$oldImage;
        }
        $vendorPersonalDetail->save();

        $vendorPersonalDetail=Vendor::find(Auth::guard('admin')->user()->vendor_id);
        Admin::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update([
            'name'=>$vendorPersonalDetail->name,
            'mobile'=>$vendorPersonalDetail->mobile,
            'image'=>$vendorPersonalDetail->image,
            //status will be 0 when we giving approval to admin.but now doing withoutout approval;
        ]);

    }

    public static function imageUrl($request){
        $file=$request->file('vendor_image');
        $imageoriginalExtention=$file->getClientOriginalExtension();
        $imageName=rand(10,50000).'.'.time().'.'.$imageoriginalExtention;
        $directory="admin/images/vendor/";
        $file->move($directory,$imageName);
        $imagePath=$directory.$imageName;
        return $imagePath;
    }
}
