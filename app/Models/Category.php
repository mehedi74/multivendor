<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'name', 'image', 'status', 'description', 'meta_title', 'url',
                            'meta_description', 'meta_keywords', 'discount'];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function subCategories(){
        return $this->hasMany(SubCategory::class,'category_id');
    }

    public function brands(){
        return $this->hasMany(Brand::class,'category_id');
    }


    public static function crateOrUodate($request, $id = null)
    {
        if($id){
           $oldCategory = Category::find($id);
           if($request->hasFile('cat_image')){
               if(file_exists($oldCategory->image)){
                   unlink($oldCategory->image);
               }
           }
        }

        Category::updateOrCreate(['id' => $id], [
            'name' => $request->cat_name,
            'section_id' => $request->section_id,
            'description' => $request->cat_description,
            'discount' => $request->cat_discount,
            'meta_title' => $request->cat_meta_title,
            'meta_description' => $request->cat_meta_description,
            'meta_keywords' => $request->cat_meta_keywords,
            'url' => $request->cat_url,
            'status' => $request->cat_status,
            'image'=>$request->hasFile('cat_image') ? self::imageUrl($request) : $oldCategory->image,
        ]);
    }

    public static function imageUrl($request){
        $file=$request->file('cat_image');
        $fileOriginalExtension=$file->getClientOriginalExtension();
        $imageName=rand(30,60000).'.'.time().'.'.$fileOriginalExtension;
        $directory="assets/admin/images/category/";
        $file->move($directory,$imageName);
        $path=$directory.$imageName;
        return $path;

    }
}
