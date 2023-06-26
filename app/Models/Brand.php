<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['section_id','name','status','discount'];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public static function crateOrUpdate($request,$id=null){

        Brand::updateOrCreate(['id' => $id],[
            'name' => $request['brand_name'],
            'section_id' => $request['section_id'],
            'discount' => $request['brand_discount'],
            'status' => $request['brand_status'],
        ]);
    }
}
