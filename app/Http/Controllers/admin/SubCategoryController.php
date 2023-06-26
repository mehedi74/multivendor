<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubCategoryController extends Controller
{
    public function index()
    {
        Session::put('page', 'subcategories');
        return view('admin.catalogue-management.sub-category.index', ['subCategories' => SubCategory::all()]);
    }
    public function selectCategory(Request $request){
        return response()->json(Category::where('section_id',$request->section_id)->get());
    }
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'subcat_name' => 'required',
                'section_id' => 'required',
                'category_id' => 'required',
                'subcat_image' => 'required',
            ];
            $customMessages = [
                'subcat_name.required' => 'Category name is required',
                'section_id.required' => 'Please select a section',
                'category_id.required' => 'Please select a category',
                'subcat_image.required' => 'Please give a image for sub category',
            ];
            $this->validate($request, $rules, $customMessages);
            SubCategory::crateOrUpdate($request);
            return back()->with('msg', 'Congrats! Sub-Category added Successfully');
        }
        $title = ' Add Sub Category';
        return view('admin.catalogue-management.sub-category.create', [
                'categories' => Category::all(),
                'title' => $title]
        );
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'subcat_name' => 'required',
                'section_id' => 'required',
                'category_id' => 'required',
            ];
            $customMessages = [
                'subcat_name.required' => 'Category name is required',
                'section_id.required' => 'Please select a section',
                'category_id.required' => 'Please select a section',
            ];
            $this->validate($request, $rules, $customMessages);
            SubCategory::crateOrUpdate($request, $id);
            return back()->with('msg', 'Congrats! Sub-Category Updated Successfully');
        }
        $title = 'Update Sub Category';
        return view('admin.catalogue-management.sub-category.edit', [
            'subCategory' => SubCategory::find($id),
            'categories' => Category::all(),
            'title' => $title
        ]);
    }

    public function updateStatus($id)
    {
        $subCategory = SubCategory::find($id);
        if ($subCategory->status == 1) {
            $subCategory->update(['status' => 0]);
        } else {
            $subCategory->update(['status' => 1]);
        }
        return back();
    }


    public function delete($id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return back();
    }

}
