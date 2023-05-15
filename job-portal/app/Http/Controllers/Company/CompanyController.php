<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\company;
use Hash;
use Auth;
use App\Models\Order;
use App\Models\Candidate;

use App\Models\Package;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\JobType;
use App\Models\Job;
use App\Models\CandidateEducation;
use App\Models\CandidateSkill;
use App\Models\CandidateExperience;
use App\Models\CandidateAward;
use App\Models\CandidateResume;
use App\Models\JobExperience;
use App\Models\CandidateApplication;

use App\Models\CompanyLocation;
use App\Models\CompanyIndustry;
use App\Mail\Websitemail;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function index(){

        return view('company.dashboard');
       }// method end


     
    public function make_payment(){
        $current_plan = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();
        $packages = Package::get();        

        return view('company.payment',compact('current_plan','packages'));
       }// method end


  public function company_order(){

    $orders = Order::with('rPackage')->orderBy('id', 'desc')->where('company_id',Auth::guard('company')->user()->id)->get();
        return view('company.orders', compact('orders'));
  }/// method end



  public function edit()
  {
      $company_locations = CompanyLocation::orderBy('name', 'asc')->get();
      $company_industries = CompanyIndustry::orderBy('name', 'asc')->get();
      // $company_sizes = CompanySize::get();
      return view('company.edit_company_profile', compact('company_locations','company_industries'));
  }

  public function update(Request $request)
  {
      $obj = Company::where('id',Auth::guard('company')->user()->id)->first();
      $id = $obj->id;
      
      $request->validate([
          'company_name' => 'required',
          'person_name' => 'required',
          'username' => ['required','alpha_dash',Rule::unique('companies')->ignore($id)],
          'email' => ['required','email',Rule::unique('companies')->ignore($id)],
      ]);

      if($request->hasFile('logo')) {
          $request->validate([
              'logo' => 'image|mimes:jpg,jpeg,png,gif'
          ]);

          if(Auth::guard('company')->user()->logo != '') {
              unlink(public_path('uploads/'.$obj->logo));
          }            

          $ext = $request->file('logo')->extension();
          $final_name = 'company_logo_'.time().'.'.$ext;

          $request->file('logo')->move(public_path('front/uploads/'),$final_name);

          $obj->logo = $final_name;
      }

      $obj->company_name = $request->company_name;
      $obj->person_name = $request->person_name;
      $obj->username = $request->username;
      $obj->email = $request->email;
      $obj->phone = $request->phone;
      $obj->address = $request->address;
      $obj->company_location_id = $request->company_location_id;
      $obj->company_industry_id = $request->company_industry_id;
      $obj->company_size_id = $request->company_size_id;
      $obj->founded_on = $request->founded_on;
      $obj->website = $request->website;
      $obj->description = $request->description;
      $obj->oh_mon = $request->oh_mon;
      $obj->oh_tue = $request->oh_tue;
      $obj->oh_wed = $request->oh_wed;
      $obj->oh_thu = $request->oh_thu;
      $obj->oh_fri = $request->oh_fri;
      $obj->oh_sat = $request->oh_sat;
      $obj->oh_sun = $request->oh_sun;
      $obj->map_code = $request->map_code;
      $obj->facebook = $request->facebook;
      $obj->twitter = $request->twitter;
      $obj->linkedin = $request->linkedin;
      $obj->instagram = $request->instagram;
      $obj->update();

      return redirect()->back()->with('success', 'Profile is updated successfully.');

  }// method end


  public function add_job()
  {
      // Check if a person buy a package
      $order_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();
      if(!$order_data) {
          return redirect()->back()->with('error', 'You must have to buy a package first to access this page');
      }
      if(date('Y-m-d') > $order_data->expire_date) {
          return redirect()->back()->with('error', 'Your package is expired!');
      }

      // Check if a person has access to this page under the current package
      $package_data = Package::where('id',$order_data->package_id)->first();
      if($package_data->total_allowed_jobs == 0) {
          return redirect()->back()->with('error', 'Your current package does not allow to access the job section');
      }

      // How many jobs this company posted
      $total_jobs_posted = Job::where('company_id',Auth::guard('company')->user()->id)->count();
      if($package_data->total_allowed_jobs == $total_jobs_posted) {
          return redirect()->back()->with('error', 'You already have posted the maximum number of allowed jobs');
      }

      $job_categories = JobCategory::orderBy('name','asc')->get();
      $job_locations = JobLocation::orderBy('name','asc')->get();
      $job_types = JobType::orderBy('name','asc')->get();
      $job_experiences = JobExperience::orderBy('id','asc')->get();
      return view('company.add_job', compact('job_categories','job_locations','job_types','job_experiences'));
  }/// method end



  public function store(Request $request)
  {
      $request->validate([
          'title' => 'required',
          'description' => 'required',
          'deadline' => 'required',
          'vacancy' => 'required'
      ]);

      $order_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();
      $package_data = Package::where('id',$order_data->package_id)->first();

      $total_featured_jobs = Job::where('company_id',Auth::guard('company')->user()->id)->where('is_featured',1)->count();
      if($total_featured_jobs == $package_data->total_allowed_featured_jobs) {
          if($request->is_featured == 1) {
              return redirect()->back()->with('error', 'You already have added the total number of featured jobs');
          }
      }

      $obj = new Job();
      $obj->company_id = Auth::guard('company')->user()->id;
      $obj->title = $request->title;
      $obj->description = $request->description;
      $obj->responsibility = $request->responsibility;
      $obj->skill = $request->skill;
      $obj->education = $request->education;
      $obj->benefit = $request->benefit;
      $obj->deadline = $request->deadline;
      $obj->vacancy = $request->vacancy;
      $obj->job_category_id = $request->job_category_id;
      $obj->job_location_id = $request->job_location_id;
      $obj->job_type_id = $request->job_type_id;
      $obj->job_experience_id = $request->job_experience_id;
      $obj->job_gender_id = $request->job_gender_id;
      $obj->job_salary_range_id = $request->job_salary_range_id;
      $obj->map_code = $request->map_code;
      $obj->is_featured = $request->is_featured;
      $obj->is_urgent = $request->is_urgent;
      $obj->save();

      return redirect()->back()->with('success', 'Job is posted successfully!');
  }/// method end



  public function jobs()
  {
      $jobs = Job::with('rJobLocation')->where('company_id',Auth::guard('company')->user()->id)->get();
      return view('company.jobs', compact('jobs'));
  }// metho end



  public function edit_job($id)
  {
      $jobs_single = Job::where('id',$id)->first();
      $job_categories = JobCategory::orderBy('name','asc')->get();
      $job_locations = JobLocation::orderBy('name','asc')->get();
      $job_types = JobType::orderBy('name','asc')->get();
      $job_experiences = JobExperience::orderBy('id','asc')->get();
      
      return view('company.edit_job', compact('jobs_single','job_categories','job_locations','job_types','job_experiences'));
  }

  public function update_job(Request $request,$id)
  {
      $obj = Job::where('id',$id)->first();

      $request->validate([
          'title' => 'required',
          'description' => 'required',
          'deadline' => 'required',
          'vacancy' => 'required'
      ]);

      $obj->title = $request->title;
      $obj->description = $request->description;
      $obj->responsibility = $request->responsibility;
      $obj->skill = $request->skill;
      $obj->education = $request->education;
      $obj->benefit = $request->benefit;
      $obj->deadline = $request->deadline;
      $obj->vacancy = $request->vacancy;
      $obj->job_category_id = $request->job_category_id;
      $obj->job_location_id = $request->job_location_id;
      $obj->job_type_id = $request->job_type_id;
      $obj->job_experience_id = $request->job_experience_id;
      $obj->job_gender_id = $request->job_gender_id;
      $obj->job_salary_range_id = $request->job_salary_range_id;
      $obj->map_code = $request->map_code;
      $obj->is_featured = $request->is_featured;
      $obj->is_urgent = $request->is_urgent;
      $obj->update();

      return redirect()->back()->with('success', 'Job is updated successfully!');
  }

  public function delete_job($id)
  {
      Job::where('id',$id)->delete();
      // CandidateApplication::where('job_id',$id)->delete();
      // CandidateBookmark::where('job_id',$id)->delete();

      return redirect()->route('company_jobs')->with('success', 'Job is deleted successfully.');
  }// method end



  


  public function candidate_application()
  {
      $jobs = Job::with('rJobCategory','rJobLocation','rJobType','rJobExperience')->where('company_id',Auth::guard('company')->user()->id)->get();
      return view('company.applications', compact('jobs'));
  }

  public function applicants($id)
  {
      $applicants = CandidateApplication::with('rCandidate')->where('job_id',$id)->get();
      $job_single = Job::where('id',$id)->first();

      return view('company.applicants', compact('applicants','job_single'));
  }

  public function applicant_resume($id)
  {
      $candidate_single = Candidate::where('id',$id)->first();
      $candidate_educations = CandidateEducation::where('candidate_id',$id)->get();
      $candidate_experiences = CandidateExperience::where('candidate_id',$id)->get();
      $candidate_skills = CandidateSkill::where('candidate_id',$id)->get();
      $candidate_awards = CandidateAward::where('candidate_id',$id)->get();
      $candidate_resumes = CandidateResume::where('candidate_id',$id)->get();

      return view('company.applicant_resume', compact('candidate_single','candidate_educations','candidate_experiences','candidate_skills','candidate_awards','candidate_resumes'));
  }

  public function change_application_status(Request $request)
  {
      $obj = CandidateApplication::with('rCandidate')->where('candidate_id',$request->candidate_id)->where('job_id',$request->job_id)->first();
      $obj->status = $request->status;
      $obj->update();

      $candidate_email = $obj->rCandidate->email;

      if($request->status == 'Approved') {
          // Sending email to candidates
          $detail_link = route('applied_jobs');
          $subject = 'Congratulation! Your application is approved';
          $message = 'Please check the detail: <br>';
          $message .= '<a href="'.$detail_link.'">Click here to see the detail</a>';

          \Mail::to($candidate_email)->send(new Websitemail($subject,$message));
      }

      return redirect()->back()->with('success', 'Status is changed successfully!');
  }



  
   
    
}
