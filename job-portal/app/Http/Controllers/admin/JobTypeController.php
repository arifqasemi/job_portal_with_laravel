<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobType;

class JobTypeController extends Controller
{
    //


    public function index(){
        $job_types = JobType::get();
 
         return view('admin.job_type',compact('job_types'));
     }// method ends
    
    public function add(){
        return view('admin.add_job_type');
    }// method ends


    public function store(Request $request){

        $request->validate([
            'name' => 'required'
        ]);

        $obj = new JobType();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('job_location')->with('success', 'Data is saved successfully.');

    }// method ends






    public function delete($id){
        $job_category = JobType::where('id',$id)->delete();
        return redirect()->route('job_location')->with('success', 'Data is deleted successfully.');

    }
}
