<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyIndustry;
use App\Models\CompanyLocation;
use App\Models\Company;
use App\Models\Order;
use App\Models\Job;

class CompanyListsController extends Controller
{
    public function index(Request $request)
    {

        $company_industries = CompanyIndustry::orderBy('name','asc')->get();
        $company_locations = CompanyLocation::orderBy('name','asc')->get();

        $form_name = $request->name;
        $form_industry = $request->industry;
        $form_location = $request->location;
        $form_size = $request->size;
        $form_founded = $request->founded;

        $companies = Company::withCount('rJob')->with('rCompanyIndustry','rCompanyLocation')->orderBy('id','desc');

        if($request->name != null) {
            $companies = $companies->where('company_name','LIKE','%'.$request->name.'%');
        }

        if($request->industry != null) {
            $companies = $companies->where('company_industry_id',$request->industry);
        }

        if($request->location != null) {
            $companies = $companies->where('company_location_id',$request->location);
        }

       

      
        $companies = $companies->paginate(9);

        // $advertisement_data = Advertisement::where('id',1)->first();

        // $other_page_item = PageOtherItem::where('id',1)->first();

        return view('company.company_list', compact('companies','company_industries','company_locations','form_name','form_industry','form_location','form_founded'));
    }// mthod end


    public function company_detail($id)
    {
        $order_data = Order::where('company_id',$id)->where('currently_active',1)->first();
        if(date('Y-m-d') > $order_data->expire_date) {
            return redirect()->route('home');
        }

        $company_single = Company::withCount('rJob')->with('rCompanyIndustry','rCompanyLocation')->where('id',$id)->first();

       

        $jobs = Job::with('rJobCategory','rJobLocation','rJobType','rJobExperience')->where('company_id',$company_single->id)->get();


        return view('company.company_detail', compact('company_single','jobs'));
    }



    // public function filter_company(Request $request){
    //     print_r($request->all());
    // }
}
