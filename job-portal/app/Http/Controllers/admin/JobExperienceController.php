<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobExperience;
class JobExperienceController extends Controller
{
    //

    public function index(){
        $job_experiences = JobExperience::get();
 
         return view('admin.job_experience',compact('job_experiences'));
     }// method ends
    
    public function add(){
        return view('admin.add_job_experience');
    }// method ends


    public function store(Request $request){

        $request->validate([
            'name' => 'required'
        ]);

        $obj = new JobExperience();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('job_expereince')->with('success', 'Data is saved successfully.');

    }// method ends






    public function delete($id){
        $job_category = JobExperience::where('id',$id)->delete();
        return redirect()->route('job_expereince')->with('success', 'Data is deleted successfully.');

    }
}
