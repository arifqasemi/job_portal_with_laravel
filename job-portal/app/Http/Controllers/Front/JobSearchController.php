<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\JobType;
use App\Models\JobExperience;
use App\Models\JobGender;
use App\Models\JobSalaryRange;
use App\Models\Advertisement;
use App\Models\PageOtherItem;
use App\Mail\Websitemail;
class JobSearchController extends Controller
{
    public function index(Request $request){
        $job_categories = JobCategory::orderBy('name','asc')->get();
        $job_locations = JobLocation::orderBy('name','asc')->get();
        $job_types = JobType::orderBy('name','asc')->get();
        $job_experiences = JobExperience::orderBy('id','asc')->get();
        $form_title = $request->title;
        $form_category = $request->category;
        $form_location = $request->location;
        $form_types = $request->type;
        $form_experience = $request->experience;
        $form_gender = $request->gender;
        $form_salary_range = $request->salary_range;

        $jobs = Job::with('rCompany','rJobCategory');

        if($request->title != null) {
            $jobs = $jobs->where('title','LIKE','%'.$request->title.'%');
        }

        if($request->category != null) {
            $jobs = $jobs->where('job_category_id',$request->category);
        }

        if($request->location != null) {
            $jobs = $jobs->where('job_location_id',$request->location);
        }

        if($request->type != null) {
            $jobs = $jobs->where('job_type_id',$request->type);
        }

        if($request->experience != null) {
            $jobs = $jobs->where('job_experience_id',$request->experience);
        }
        $jobs = $jobs->get();

        return view('front.job_list', compact('jobs','job_categories','form_category','form_experience','form_types','form_title','form_location','job_locations','job_types','job_experiences'));
    }// method end


    public function details($id){

        $job_single = Job::with('rCompany','rJobCategory')->where('id',$id)->first();
         $jobs = Job::with('rCompany','rJobCategory','rJobLocation','rJobType')->where('job_category_id',$job_single->job_category_id)->get();

        return view('front.job_details',compact('job_single','jobs'));
    }// mthod end


    public function send_email(Request $request)
    {
        $request->validate([
            'visitor_name' => 'required',
            'visitor_email' => 'required|email',
            'visitor_message' => 'required'
        ]);

        $subject = 'Enquery for job: '.$request->job_title;
        $message = 'Visitor Information: <br>';
        $message .= 'Name: '.$request->visitor_name.'<br>';
        $message .= 'Email: '.$request->visitor_email.'<br>';
        $message .= 'Phone: '.$request->visitor_phone.'<br>';
        $message .= 'Message: '.$request->visitor_message;

        \Mail::to($request->receive_email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success', 'Email is sent successfully!');
    }
}
