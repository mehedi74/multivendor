<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class VendorsShopDetail extends Model
{
    use HasFactory;

    protected $fillable = ['shop_name', 'shop_address', 'shop_country', 'shop_state', 'shop_city', 'shop_mobile', 'shop_website', 'shop_email',
        'address_proof', 'business_license_number', 'gst_number', 'pan_number', 'address_proof_image'];


    public static function imageUrl($request)
    {
        $file = $request->file('address_proof_image');
        $imageOrginalExtention = $file->getClientOriginalExtension();
        $imageName = rand(0, 5000) . '.' . time() . '.' . $imageOrginalExtention;
        $directory = "admin/images/vendorShopProof/";
        $file->move($directory, $imageName);
        $imagePath = $directory . $imageName;
        return $imagePath;
    }

    public static function updateShopDetail($request)
    {
        $shopDetail = VendorsShopDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first();
        if ($request->hasFile('address_proof_image')) {
            if (file_exists($shopDetail->address_proof_image)) {
                unlink($shopDetail->address_proof_image);
            }
        }
        $shopDetail->update([
            'shop_name' => $request->shop_name,
            'shop_address' => $request->shop_address,
            'shop_country' => $request->shop_country,
            'shop_state' => $request->shop_state,
            'shop_city' => $request->shop_city,
            'shop_mobile' => $request->shop_mobile,
            'shop_website' => $request->shop_website,
            'shop_email' => $request->shop_email,
            'address_proof' => $request->address_proof,
            'business_license_number' => $request->business_license_number,
            'gst_number' => $request->gst_number,
            'pan_number' => $request->pan_number,
            'address_proof_image' => $request->hasFile('address_proof_image') ? self::imageUrl($request) : $shopDetail->address_proof_image,
        ]);
    }
}
