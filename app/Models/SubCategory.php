<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'category_id', 'name', 'image', 'status', 'description', 'meta_title', 'url',
                            'meta_description', 'meta_keywords', 'discount'];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function brands(){
        $this->hasMany(Brand::class,'subcat_id');
    }


    public static function crateOrUpdate($request, $id = null)
    {
        if ($id) {
            $oldSubCategory = SubCategory::find($id);
            if ($request->hasFile('cat_image')) {
                if (file_exists($oldSubCategory->image)) {
                    unlink($oldSubCategory->image);
                }
            }
        }

        SubCategory::updateOrCreate(['id' => $id], [
            'name' => $request->subcat_name,
            'section_id' => $request->section_id,
            'category_id' => $request->category_id,
            'description' => $request->subcat_description,
            'discount' => $request->subcat_discount,
            'meta_title' => $request->subcat_meta_title,
            'meta_description' => $request->subcat_meta_description,
            'meta_keywords' => $request->subcat_meta_keywords,
            'url' => $request->subcat_url,
            'status' => $request->subcat_status,
            'image' => $request->hasFile('subcat_image') ? self::imageUrl($request) : $oldSubCategory->image,
        ]);
    }

    public static function imageUrl($request)
    {
        $file = $request->file('subcat_image');
        $fileOriginalExtension = $file->getClientOriginalExtension();
        $imageName = rand(30, 60000) . '.' . time() . '.' . $fileOriginalExtension;
        $directory = "assets/admin/images/sub-category/";
        $file->move($directory, $imageName);
        $path = $directory . $imageName;
        return $path;
    }
}
