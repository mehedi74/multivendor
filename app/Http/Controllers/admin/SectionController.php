<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{

    public function index()
    {
        Session::put('page', 'sections');
        return view('admin.catalogue-management.section.index');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'section_name' => 'required',
                'section_image' => 'required',
            ];
            $customMessage = [
                'section_name.required' => 'Unique Name is Required',
                'section_image.required' => 'Please Select an Image for the section',
            ];
            $this->validate($request, $rules, $customMessage);
            Section::createOrUpdate($request);
            return back()->with('msg', 'Section added Successfully');
        }
        $title = 'Add Section';
        return view('admin.catalogue-management.section.create', ['title' => $title]);
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $rules = [
                'section_name' => 'required',
            ];
            $customMessage = [
                'section_name.required' => 'Unique Name is Required',
            ];
            $this->validate($request, $rules, $customMessage);
            Section::createOrUpdate($request, $id);
            return back()->with('msg', 'Section Updated Successfully');
        }
        $title = 'Update Section';
        return view('admin.catalogue-management.section.edit', [
            'section' => Section::find($id),
            'title' => $title,
        ]);

    }

    public function delete(string $id)
    {
        $section = Section::find($id);
        $section->delete();
        return back()->with('msg', 'Section Deleted Successfully');
    }

    public function updateStatus($id)
    {
        $section = Section::find($id);
        if($section->status==1){
            $section->update(['status'=>0]);
        }else{
            $section->update(['status'=>1]);
        }
        return back();
    }
}
