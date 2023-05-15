<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function index(){
        return response()->view('front.login')->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }// method end


    public function company_login_submit(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credential = [
            'username' => $request->username,
            'password' => $request->password,
            'status' => 1
        ];

        if(Auth::guard('company')->attempt($credential)) {
            return redirect()->route('company_dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Information is not correct!');

        }
    }// method ends



    public function company_logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('login');
    }// method end



    public function candidate_login_submit(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credential = [
            'username' => $request->username,
            'password' => $request->password,
            'status' => 1
        ];

        if(Auth::guard('candidate')->attempt($credential)) {
            return redirect()->route('candidate_dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Information is not correct!');
        }
    }// method end


    public function candidate_logout()
    {
        Auth::guard('candidate')->logout();
        return redirect()->route('login');
    }// method end
}
