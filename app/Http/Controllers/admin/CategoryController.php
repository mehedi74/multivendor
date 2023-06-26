<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        Session::put('page','categories');
        return view('admin.catalogue-management.category.index',['categories'=>Category::all()]);
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $rules = [
                'cat_name' => 'required',
                'section_id' => 'required',
                'cat_image' => 'required',
            ];
            $customMessages = [
                'cat_name.required' => 'Category name is required',
                'section_id.required' => 'Please select a section',
                'cat_image.required' => 'Please give a image for category',
            ];
            $this->validate($request,$rules,$customMessages);
            Category::crateOrUodate($request);
            return back()->with('msg','Congrats! Category added Successfully');
        }
        $title=' Add Category';
        return view('admin.catalogue-management.category.create',['categories'=>Category::all(),'title'=>$title]);
    }

    public function edit(Request $request,$id){
        if($request->isMethod('post')){
            $rules = [
                'cat_name' => 'required',
                'section_id' => 'required',
            ];
            $customMessages = [
                'cat_name.required' => 'Category name is required',
                'section_id.required' => 'Please select a section',
            ];
            $this->validate($request,$rules,$customMessages);
            Category::crateOrUodate($request,$id);
            return back()->with('msg','Congrats! Category Updated Successfully');
        }
        $title='Update Category';
        return view('admin.catalogue-management.category.edit',['category'=>Category::find($id),'title'=>$title]);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back();
    }

    public function updateStatus($id)
    {
        $category = Category::find($id);
        if($category->status==1){
            $category->update(['status'=>0]);
        }else{
            $category->update(['status'=>1]);
        }
        return back();
    }
}
