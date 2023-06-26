<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{

    public function index()
    {
        Session::put('page', 'brands');
        return view('admin.catalogue-management.brand.index', ['brands' => Brand::all()]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'brand_name' => 'required',
                'section_id' => 'required',
            ];
            $customMessages = [
                'brand_name.required' => 'Brand name is required',
                'section_id.required' => 'Please select a section',
            ];
            $this->validate($request, $rules, $customMessages);
            Brand::crateOrUpdate($request);
            return back()->with('msg', 'Congrats! Brand added Successfully');
        }
        $title = ' Add Brand';
        return view('admin.catalogue-management.brand.create', ['title' => $title]);
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'brand_name' => 'required',
                'section_id' => 'required',
            ];
            $customMessages = [
                'brand_name.required' => 'Brand name is required',
                'section_id.required' => 'Please select a section',
            ];
            $this->validate($request, $rules, $customMessages);
            Brand::crateOrUpdate($request, $id);
            return back()->with('msg', 'Congrats! Brand Updated Successfully');
        }
        $title = 'Update Brand';
        return view('admin.catalogue-management.brand.edit', ['brand'=> Brand::find($id), 'title' => $title]);
    }

    public function statusUpdate($id){

            $brand = Brand::find($id);
            if ($brand->status == 1) {
                $brand->update(['status' => 0]);
            } else {
                $brand->update(['status' => 1]);
            }
            return back();
        }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return back();
    }

}
