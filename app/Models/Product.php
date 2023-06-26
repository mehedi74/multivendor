<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Image;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['section_id', 'category_id', 'subcat_id', 'brand_id', 'vendor_id', 'admin_type', 'name', 'code',
        'color', 'price', 'discount', 'weight', 'featured_image', 'video', 'short_description', 'long_description', 'meta_title',
        'meta_description', 'meta_keywords', 'is_featured', 'status'];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcat_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function vendorShopDetail()
    {
        return $this->belongsTo(VendorsShopDetail::class, 'vendor_id');
    }

    public static function newProduct($request, $categoryId, $sectionId)
    {
        $product = new Product();
        $product->section_id = $sectionId;
        $product->category_id = $categoryId;
        $product->subcat_id = $request->subCategory_id;
        $product->brand_id = $request->brand_id;
        if(Auth::guard('admin')->user()->type == 'superadmin') {
            $product->admin_type = 'superadmin';
        }elseif (Auth::guard('admin')->user()->type == 'vendor') {
            $product->admin_type = 'vendor';
            $product->vendor_id = Auth::guard('admin')->user()->vendor_id;

        }elseif (Auth::guard('admin')->user()->type == 'subadmin') {
            $product->admin_type = 'subadmin';
            $product->sub_admin_id = Auth::guard('admin')->user()->subadmin_id;
        }elseif (Auth::guard('admin')->user()->type == 'admin') {
            $product->admin_type = 'admin';
            $product->admin_id = Auth::guard('admin')->user()->admin_id;
        }
        $product->name = $request->product_name;
        $product->code = $request->product_code;
        $product->color = $request->product_color;
        $product->price = $request->product_price;
        $product->discount = $request->product_discount;
        $product->weight = $request->product_price;
        $product->short_description = $request->product_short_description;
        $product->long_description = $request->product_long_description;
        $product->url = $request->product_url;
        $product->meta_title = $request->product_meta_title;
        $product->meta_description = $request->product_meta_description;
        $product->meta_keywords = $request->product_meta_keywords;
        $product->is_featured = $request->is_featured;
        $product->status = $request->product_status;
        $product->featured_image = self::imageUrl($request);
        $product->video = self::vedioUrl($request);
        $product->save();
    }

    public static function imageUrl($request){
        $file=$request->file('product_image');
        $getExtentison=$file->getClientOriginalExtension();
        $imageName=rand(40,50000).'.'.$getExtentison;
        $samllImageDirectory="assets/admin/images/product/small/".$imageName;
        $mediumImageDirectory="assets/admin/images/product/medium/".$imageName;
        $largeImageDirectory="assets/admin/images/product/large/".$imageName;
//        if use php only...
//        $file->move($samllImageDirectory,$imageName);
        Image::make($file)->resize(1000,1000)->save($largeImageDirectory);
        Image::make($file)->resize(500,500)->save($mediumImageDirectory);
        Image::make($file)->resize(250,250)->save($samllImageDirectory);

        return $imageName;

    }


}
