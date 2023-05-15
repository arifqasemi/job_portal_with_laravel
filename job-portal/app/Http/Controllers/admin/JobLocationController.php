<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobLocation;

class JobLocationController extends Controller
{

    public function index(){
        $job_locations = JobLocation::get();
 
         return view('admin.job_location',compact('job_locations'));
     }// method ends
    
    public function add(){
        return view('admin.add_job_location');
    }// method ends


    public function store(Request $request){

        $request->validate([
            'name' => 'required'
        ]);

        $obj = new JobLocation();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('job_location')->with('success', 'Data is saved successfully.');

    }// method ends






    public function delete($id){
        $job_category = JobLocation::where('id',$id)->delete();
        return redirect()->route('job_location')->with('success', 'Data is deleted successfully.');

    }

}
