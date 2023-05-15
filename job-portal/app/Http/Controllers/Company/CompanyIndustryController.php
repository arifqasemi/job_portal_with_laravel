<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyIndustry;
class CompanyIndustryController extends Controller
{
    public function index(){
        $company_industries = CompanyIndustry::get();
 
         return view('company.company_industry',compact('company_industries'));
     }// method ends
    
    public function add(){
        return view('company.add_company_industry');
    }// method ends


    public function store(Request $request){

        $request->validate([
            'name' => 'required'
        ]);

        $obj = new CompanyIndustry();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('company_industry')->with('success', 'Data is saved successfully.');

    }// method ends






    public function delete($id){
        $job_category = CompanyIndustry::where('id',$id)->delete();
        return redirect()->route('company_location')->with('success', 'Data is deleted successfully.');

    }
}
