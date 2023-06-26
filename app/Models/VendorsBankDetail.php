<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class VendorsBankDetail extends Model
{
    use HasFactory;
    protected $fillable=['bank_name','account_holder_name','account_number','bank_ifsc_code'];

    public static function updateBankDetail($request){
        $vendorBankDetail=VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first();
        $vendorBankDetail->update([
            'bank_name'=>$request->bank_name,
            'account_holder_name'=>$request->ac_holder_name,
            'account_number'=>$request->account_number,
            'bank_ifsc_code'=>$request->bank_ifsc_code,
        ]);
    }
}
