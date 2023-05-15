<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\CandidateEducation;
use App\Models\CandidateSkill;
use App\Models\CandidateExperience;
use App\Models\CandidateAward;
use App\Models\CandidateResume;
use App\Models\CandidateBookmark;
use App\Models\CandidateApplication;
use App\Models\Job;

use App\Mail\WebsiteMail;
use Illuminate\Validation\Rule;
use Hash;
use Auth;
class CandidateController extends Controller
{
     public function index(){
      
        $total_applied_jobs = CandidateApplication::where('candidate_id',Auth::guard('candidate')->user()->id)->where('status','Applied')->count();

        $total_rejected_jobs = CandidateApplication::where('candidate_id',Auth::guard('candidate')->user()->id)->where('status','Rejected')->count();

        $total_approved_jobs = CandidateApplication::where('candidate_id',Auth::guard('candidate')->user()->id)->where('status','Approved')->count();

         
        return view('candidate.dashboard',compact('total_applied_jobs','total_rejected_jobs','total_approved_jobs'));

    }/// method end



     public function edit()
     {
         return view('candidate.edit_profile');
     }
 
     public function update(Request $request)
     {
         $obj = Candidate::where('id',Auth::guard('candidate')->user()->id)->first();
         $id = $obj->id;
         
         $request->validate([
             'name' => 'required',
             'username' => ['required','alpha_dash',Rule::unique('candidates')->ignore($id)],
             'email' => ['required','email',Rule::unique('candidates')->ignore($id)],
         ]);
 
         if($request->hasFile('photo')) {
             $request->validate([
                 'photo' => 'image|mimes:jpg,jpeg,png,gif'
             ]);
 
             if(Auth::guard('candidate')->user()->photo != '') {
                 unlink(public_path('uploads/'.$obj->photo));
             }            
 
             $ext = $request->file('photo')->extension();
             $final_name = 'candidate_photo_'.time().'.'.$ext;
 
             $request->file('photo')->move(public_path('uploads/'),$final_name);
 
             $obj->photo = $final_name;
         }
 
         $obj->name = $request->name;
         $obj->designation = $request->designation;
         $obj->username = $request->username;
         $obj->email = $request->email;
         $obj->biography = $request->biography;
         $obj->phone = $request->phone;
         $obj->country = $request->country;
         $obj->address = $request->address;
         $obj->state = $request->state;
         $obj->city = $request->city;
         $obj->zip_code = $request->zip_code;
         $obj->gender = $request->gender;
         $obj->marital_status = $request->marital_status;
         $obj->date_of_birth = $request->date_of_birth;
         $obj->website = $request->website;
         $obj->update();
 
         return redirect()->back()->with('success', 'Profile is updated successfully.');
 
     }// method end



     
    public function education()
    {
        $educations = CandidateEducation::where('candidate_id',Auth::guard('candidate')->user()->id)->orderBy('id','desc')->get();
        return view('candidate.education', compact('educations'));
    }// method  end

    public function add_education()
    {
        return view('candidate.add_candidate_education');
    }// method end



    public function store_education(Request $request)
    {
        $request->validate([
            'level' => 'required',
            'institute' => 'required',
            'degree' => 'required',
            'passing_year' => 'required'
        ]);

        $obj = new CandidateEducation();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->level = $request->level;
        $obj->institute = $request->institute;
        $obj->degree = $request->degree;
        $obj->passing_year = $request->passing_year;
        $obj->save();

        return redirect()->route('candidate_education')->with('success', 'Education is added successfully.');
    }/// method end


    public function delete_education($id)
    {
        CandidateEducation::where('id',$id)->delete();
        return redirect()->route('candidate_education')->with('success', 'Education is deleted successfully.');
    }// method end




    public function skill()
    {
        $skills = CandidateSkill::where('candidate_id',Auth::guard('candidate')->user()->id)->get();
        return view('candidate.skill', compact('skills'));
    }/// method end

    public function add_skill()
    {
        return view('candidate.add_skill');
    }/// method end

    public function store_skill(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'percentage' => 'required'
        ]);

        $obj = new CandidateSkill();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->name = $request->name;
        $obj->percentage = $request->percentage;
        $obj->save();

        return redirect()->route('candidate_skill')->with('success', 'Skill is added successfully.');
    }/// method end

    

  

    public function delete_skill($id)
    {
        CandidateSkill::where('id',$id)->delete();
        return redirect()->route('candidate_skill')->with('success', 'Skill is deleted successfully.');
    }// method end



    public function experience()
    {
        $experiences = CandidateExperience::where('candidate_id',Auth::guard('candidate')->user()->id)->orderBy('id','desc')->get();
        return view('candidate.experience', compact('experiences'));
    }

    public function add_experience()
    {
        return view('candidate.add_experience');
    }

    public function store_experience(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'designation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $obj = new CandidateExperience();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->company = $request->company;
        $obj->designation = $request->designation;
        $obj->start_date = $request->start_date;
        $obj->end_date = $request->end_date;
        $obj->save();

        return redirect()->route('candidate_experience')->with('success', 'Experience is added successfully.');
    }// method end



    public function delete_experience($id)
    {
        CandidateExperience::where('id',$id)->delete();
        return redirect()->route('candidate_experience')->with('success', 'Experience is deleted successfully.');
    }/// method end



    public function award()
    {
        $awards = CandidateAward::where('candidate_id',Auth::guard('candidate')->user()->id)->orderBy('id','desc')->get();
        return view('candidate.award', compact('awards'));
    }

    public function add_award()
    {
        return view('candidate.add_award');
    }

    public function store_award(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required'
        ]);

        $obj = new CandidateAward();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->date = $request->date;
        $obj->save();

        return redirect()->route('candidate_award')->with('success', 'Award is added successfully.');
    }

  

  

    public function delete_award($id)
    {
        CandidateAward::where('id',$id)->delete();
        return redirect()->route('candidate_award')->with('success', 'Award is deleted successfully.');
    }// method end



    public function resume()
    {
        $resumes = CandidateResume::where('candidate_id',Auth::guard('candidate')->user()->id)->get();
        return view('candidate.resume', compact('resumes'));
    }

    public function add_resume()
    {
        return view('candidate.add_resume');
    }

    public function store_resume(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf,doc,docx'
        ]);

        $ext = $request->file('file')->extension();
        $final_name = 'resume_'.time().'.'.$ext;
        $request->file('file')->move(public_path('front/uploads/'),$final_name);

        $obj = new CandidateResume();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->name = $request->name;
        $obj->file = $final_name;
        $obj->save();

        return redirect()->route('candidate_resume')->with('success', 'Resume is added successfully.');
    }


    public function delete_resume($id)
    {
        $resume_single = CandidateResume::where('id',$id)->first();
        unlink(public_path('front/uploads/'.$resume_single->file));
        CandidateResume::where('id',$id)->delete();
        return redirect()->route('candidate_resume')->with('success', 'Resume is deleted successfully.');
    }


    public function add_bookmark($id){
            $existing_bookmark_check = CandidateBookmark::where('candidate_id',Auth::guard('candidate')->user()->id)->where('job_id',$id)->count();
        if($existing_bookmark_check > 0) {
            return redirect()->back()->with('error', 'This job is already added to the bookmark');
        }

        $obj = new CandidateBookmark();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->job_id = $id;
        $obj->save();

        return redirect()->back()->with('success', 'Job is added to bookmark section successfully.');
    }


    public function view_bookmark()
    {
        $bookmarked_jobs = CandidateBookmark::with('rJob','rCandidate')->where('candidate_id',Auth::guard('candidate')->user()->id)->get();

        return view('candidate.bookmark', compact('bookmarked_jobs'));
    }// method end

    public function delete_bookmark($id)
    {
        CandidateBookmark::where('id',$id)->delete();

        return redirect()->back()->with('success', 'Bookmark item is deleted successfully.');
    }/// method end



    public function apply($id)
    {
        $existing_apply_check = CandidateApplication::where('candidate_id',Auth::guard('candidate')->user()->id)->where('job_id',$id)->count();
        if($existing_apply_check > 0) {
            return redirect()->back()->with('error', 'You already have applied on this job!');
        }

        $job_single = Job::where('id',$id)->first();

        return view('candidate.apply', compact('job_single'));
    }

    public function apply_submit(Request $request, $id)
    {
        $request->validate([
            'cover_letter' => 'required'
        ]);

        $obj = new CandidateApplication();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->job_id = $id;
        $obj->cover_letter = $request->cover_letter;
        $obj->status = 'Applied';
        $obj->save();

        $job_info = Job::with('rCompany')->where('id',$id)->first();
        $company_email = $job_info->rCompany->email;

        // Sending email to company
        $applicants_list_url = route('applicants',$id);
        $subject = 'A person applied to a job';
        $message = 'Please check the application: ';
        $message .= '<a href="'.$applicants_list_url.'">Click here to see applicants list for this job</a>';

        \Mail::to($company_email)->send(new Websitemail($subject,$message));

        return redirect()->route('job_details',$id)->with('success', 'Your application is sent successfully!');
    }

    public function applications()
    {
        $applied_jobs = CandidateApplication::with('rJob')->where('candidate_id',Auth::guard('candidate')->user()->id)->get();
        return view('candidate.applications', compact('applied_jobs'));
    }
}
