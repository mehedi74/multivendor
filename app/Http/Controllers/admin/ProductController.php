<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        Session::put('page', 'products');
        return view('admin.catalogue-management.product.index', ['title' => 'Products', 'products' => Product::all()]);
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request,[
                'subCategory_id' =>'required',
                'brand_id' =>'required',
                'product_name' =>'required',
                'product_code' =>'required',
                'product_color' =>'required',
                'product_price' =>'required',
            ],[
                'subCategory_id.required' =>'please select a category.',
                'brand_id.required' =>'please select a brand.',
                'product_name.required' =>'product name is required',
                'product_code.required' =>'product code name is required',
                'product_color.required' =>'product color name is required',
                'product_price.required' =>'product price name is required',

            ]);
//            dd($request->all());
            $subcat=SubCategory::find($request->subCategory_id);
            $categoryId=$subcat->category->id;
            $sectionId=$subcat->section->id;
            Product::newProduct($request,$categoryId,$sectionId);
            return back()->with('msg','Product updated successfully');
        }
        $sectionsWithCatSubCat= Section::with('categories')->get()->toArray();
//        dd($sectionsWithCatSubCat);
        return view('admin.catalogue-management.product.create', [
            'sectionsWithCatSubCat' => $sectionsWithCatSubCat,
            'subCategories'=>SubCategory::all(),
            'brands' => Brand::all(),
        ]);
    }

    public function sectionCheck(Request $request){
        $sub=SubCategory::find($request->subCatId);
        //section_id==0 value should be passed ....
        return response()->json(Brand::where('section_id',$sub->section->id)->get());
    }

    public function statusUpdate($id)
    {
        $product = Product::find($id);
        if ($product->status == 1) {
            $product->update(['status' => 0]);
        } else {
            $product->update(['status' => 1]);
        }
        return back()->with('msg', 'Product status updated successfully');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back();
    }
}
