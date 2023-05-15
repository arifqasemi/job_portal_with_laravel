<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;
class jobcategoryController extends Controller
{
    public function index(){
        $job_categories = JobCategory::get();
 
         return view('admin.job_category',compact('job_categories'));
     }// method ends
    
    public function add(){
        return view('admin.add_job_category');
    }// method ends


    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);

        $obj = new JobCategory();
        $obj->name = $request->name;
        $obj->icon = $request->icon;
        $obj->save();

        return redirect()->route('job_category')->with('success', 'Data is saved successfully.');

    }// method ends


    public function edit($id){
        $job_category = JobCategory::where('id',$id)->first();

        return view('admin.edit_job_category',compact('job_category'));
    }// method ends


    public function update(Request $request, $id)
    {
        $job_category = JobCategory::where('id',$id)->first();

        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);

        $job_category->name = $request->name;
        $job_category->icon = $request->icon;
        $job_category->update();

        return redirect()->route('job_category')->with('success', 'Data is updated successfully.');

    }// method end



    public function delete($id){
        $job_category = JobCategory::where('id',$id)->delete();
        return redirect()->route('job_category')->with('success', 'Data is deleted successfully.');

    }
}
