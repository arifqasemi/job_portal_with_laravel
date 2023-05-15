<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyLocation;
class CompanyLocationController extends Controller
{
     public function index(){
        $company_locations = CompanyLocation::get();
 
         return view('company.company_location',compact('company_locations'));
     }// method ends
    
    public function add(){
        return view('company.add_company_location');
    }// method ends


    public function store(Request $request){

        $request->validate([
            'name' => 'required'
        ]);

        $obj = new CompanyLocation();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('company_location')->with('success', 'Data is saved successfully.');

    }// method ends






    public function delete($id){
        $job_category = CompanyLocation::where('id',$id)->delete();
        return redirect()->route('company_location')->with('success', 'Data is deleted successfully.');

    }
}
