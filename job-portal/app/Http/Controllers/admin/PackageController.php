<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
class PackageController extends Controller
{
    public function index(){
        $packages = Package::orderBy('id','desc')->paginate(3);
     return view('admin.package',compact('packages'));
    }// method end


    public function add(){
     return view('admin.add_package');
    }// method end


    public function store(Request $request){
        $request->validate([
            'package_name' => 'required',
            'package_price' => 'required',
            'package_days' => 'required',
            'package_display_time' => 'required',
            'total_allowed_jobs' => 'required',
            'total_allowed_featured_jobs' => 'required',
            'total_allowed_photos' => 'required',
            'total_allowed_videos' => 'required'
        ]);

        $obj = new Package();
        $obj->package_name = $request->package_name;
        $obj->package_price = $request->package_price;
        $obj->package_days = $request->package_days;
        $obj->package_display_time = $request->package_display_time;
        $obj->total_allowed_jobs = $request->total_allowed_jobs;
        $obj->total_allowed_featured_jobs = $request->total_allowed_featured_jobs;
        $obj->total_allowed_photos = $request->total_allowed_photos;
        $obj->total_allowed_videos = $request->total_allowed_videos;
        $obj->save();

        return redirect()->route('package')->with('success', 'Data is saved successfully.');

    }// method end



    public function edit($id)
    {
        $package_single = Package::where('id',$id)->first();
        return view('admin.edit_package',compact('package_single'));
    }// method end


    public function update(Request $request, $id)
    {
        $obj = Package::where('id',$id)->first();

        $request->validate([
            'package_name' => 'required',
            'package_price' => 'required',
            'package_days' => 'required',
            'package_display_time' => 'required',
            'total_allowed_jobs' => 'required',
            'total_allowed_featured_jobs' => 'required',
            'total_allowed_photos' => 'required',
            'total_allowed_videos' => 'required'
        ]);

        $obj->package_name = $request->package_name;
        $obj->package_price = $request->package_price;
        $obj->package_days = $request->package_days;
        $obj->package_display_time = $request->package_display_time;
        $obj->total_allowed_jobs = $request->total_allowed_jobs;
        $obj->total_allowed_featured_jobs = $request->total_allowed_featured_jobs;
        $obj->total_allowed_photos = $request->total_allowed_photos;
        $obj->total_allowed_videos = $request->total_allowed_videos;
        $obj->update();

        return redirect()->route('package')->with('success', 'Data is updated successfully.');

    }// method end



    public function delete($id)
    {
        // $check = Order::where('package_id',$id)->count();
        // if($check>0) {
        //     return redirect()->back()->with('error', 'You can not delete this item, because this is used in another place.');
        // }

        Package::where('id',$id)->delete();
        return redirect()->route('package')->with('success', 'Data is deleted successfully.');
    }
}
