<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\Admin;
use App\Mail\Websitemail;

class AdminHomeController extends Controller
{
    public function index(){
        return view('admin.app');
}// method ends


    public function login(){
      
        return view('admin.login');
}// method ends


public function admin_login_submit(Request $request){
      $request->validate([
        'email'=>'required|email',
        'password'=>'required'
      ]);
     $credentials = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    if(Auth::guard('admin')->attempt($credentials)) {
       
        return redirect()->route('admin_home');
    } else {
        return redirect()->route('admin_login')->with(['error' => 'Invalid email or password']);
                
    }
}// method ends

public function logout(){

    Auth::guard('admin')->logout();

    return redirect()->route('admin_login');


}// method ends
    public function forget_password(){
        return view('admin.forget_password');
}// method ends


public function forget_password_submit(Request $request){
    $user = Admin::where('email',$request->email)->first();
    if(!$user) {
        return redirect()->back()->with(['error' => 'Invalid email']);
    }
    $token = hash('sha256',time());

    $user->token = $token;
    $user->update();

    $reset_link = url('reset_password/'.$token.'/'.$request->email);
    $subject = 'Reset Password';
    $message = 'Please click on the following link: <br><a href="'.$reset_link.'">Click here</a>';

    \Mail::to($request->email)->send(new Websitemail($subject,$message));
    return redirect()->route('admin_login')->with(['error' => 'check your email']);

}// method ends


public function reset_password($token,$email)
{
    $user = Admin::where('token',$token)->where('email',$email)->first();
    if(!$user) {
        return redirect()->route('admin_login');
    }

    return view('admin.reset_password', compact('token','email'));

}// method ends



 
public function reset_password_submit(Request $request)
{
    $user = Admin::where('token', $request->token)->where('email', $request->email)->first();

    $user->token = '';
    $user->password = Hash::make($request->new_password);
    $user->update();

    return redirect()->route('admin_login')->with(['error' => 'password is reseted successfuly!']);

}// method ends
}
