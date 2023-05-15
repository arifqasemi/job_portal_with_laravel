<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\company;
use Hash;
use App\Mail\Websitemail;
use App\Models\Candidate;

class ForgetController extends Controller
{

    public function forget_view(){
        return view('company.forget_password');
    }// method end 

    public function candidate_forget_view(){
        return view('candidate.forget_password');
    }// method end 

    
    public function check_company_email(Request $request){
        $user = company::where('email',$request->email)->first();
        if(!$user) {
            return redirect()->back()->with(['error' => 'Invalid email']);
        }
        $token = hash('sha256',time());

        $user->token = $token;
        $user->update();

        $reset_link = url('reset_candidate_password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br><a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject,$message));
        return redirect()->route('login')->with(['error' => 'check your email']);

}// method ends



public function reset_company_password($token,$email)
{
   
    $company_data = company::where('token',$token)->where('email',$email)->first();
        if(!$company_data) {
            return redirect()->route('login');
        }
        return view('company.reset_company_form', compact('token','email'));
}// method end



public function renew_company_password(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $company_data = company::where('token',$request->token)->where('email',$request->email)->first();

        $company_data->password = Hash::make($request->password);
        $company_data->token = '';
        $company_data->update();

        return redirect()->route('login')->with('success', 'Password is reset successfully. You can now login to the system.');

    }// method end


    

  








    public function check_candidate_email(Request $request){
        $user = Candidate::where('email',$request->email)->first();
        if(!$user) {
            return redirect()->back()->with(['error' => 'Invalid email']);
        }
        $token = hash('sha256',time());

        $user->token = $token;
        $user->update();

        $reset_link = url('reset_candidate_password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br><a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject,$message));
        return redirect()->route('login')->with(['error' => 'check your email']);

}// method ends



public function reset_candidate_password($token,$email)
{
    $candidate_data = Candidate::where('token',$token)->where('email',$email)->first();
    if(!$candidate_data) {
        return redirect()->route('login');
    }
    return view('candidate.reset_candidate_password', compact('token','email'));
}
  
public function renew_candidate_password(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $company_data = Candidate::where('token',$request->token)->where('email',$request->email)->first();

        $company_data->password = Hash::make($request->password);
        $company_data->token = '';
        $company_data->update();

        return redirect()->route('login')->with('success', 'Password is reset successfully. You can now login to the system.');

    }// method end

}
