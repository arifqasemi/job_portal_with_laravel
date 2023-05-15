<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Hash;
class AdminProfileController extends Controller
{
   public function index(){
    return view('admin.admin_profile');
   }


   public function admin_profile_submit(Request $request){
       $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();

    $request->validate([
        'email'=>'required|email',
        'name'=>'required',
      ]);

   if($request->password!=''){
    $request->validate([
        'password'=>'required',
        'retype_password'=>'required|same:password'
      ]);
      $admin_data->password = Hash::make($request->password);
   }

   if($request->hasFile('photo')){
    $request->validate([
        'photo'=>'image|mimes:jpg,png,jpeg',
    ]);
    unlink(public_path('uploads/'.$admin_data->photo));

    $ext = $request->file('photo')->extension();

    $file_name = 'admin'.'.'. $ext;
    $request->file('photo')->move(public_path('uploads/'),$file_name);
    $admin_data->photo = $file_name;
   }

   $admin_data->name = $request->name;
   $admin_data->email = $request->email;
   $admin_data->update();
   return redirect()->back()->with(['success'=>'Your profile updated successfuly']);
    
   }
}
