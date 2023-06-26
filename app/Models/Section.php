<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable=['name','image','status'];

    public function categories()
    {
        return $this->hasMany(Category::class, 'section_id')->with('subCategories');
    }
    public function brands(){
        return $this->hasMany(Brand::class,'section_id');
    }


    public static function createOrUpdate($request,$id=null){
        if($id){
            $oldSection=Section::find($id);
            if($request->hasFile('section_image')){
               if(file_exists($oldSection->image)){
                   unlink($oldSection->image);
               }
            }
        }
        Section::updateOrCreate(['id'=>$id],[
            'name'=>$request->section_name,
            'status'=>$request->section_status,
            'image'=>$request->hasFile('section_image') ? self::imageUrl($request) : $oldSection->image,
        ]);
    }

    public static function imageUrl($request){
        $file=$request->file('section_image');
        $imageOriginalExtention=$file->getClientOriginalExtension();
        $imageName=rand(30,50000).'.'.time().'.'.$imageOriginalExtention;
        $directoy="assets/admin/images/section/";
        $file->move($directoy,$imageName);
        $path=$directoy.$imageName;
        return $path;
    }
}
