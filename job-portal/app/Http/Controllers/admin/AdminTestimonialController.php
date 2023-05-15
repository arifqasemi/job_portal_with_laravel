<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
class AdminTestimonialController extends Controller
{
    public function index(){

        $testimonials = Testimonial::get();
        return view('admin.testimonial',compact('testimonials'));
    }//method end


    public function add(){

        return view('admin.add_testimonial');
    }//method end


    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $obj = new Testimonial();

        $ext = $request->file('photo')->extension();
        $final_name = 'testimonial_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('front/uploads/'),$final_name);

        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->save();

        return redirect()->route('testimonial')->with('success', 'Data is saved successfully.');

    }//method end

    public function delete($id){
        Testimonial::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Data is deleted successfully.');

    }//method end
    public function edit($id){
        $testimonial_single = Testimonial::where('id',$id)->first();
        return view('admin.edit_testimonial',compact('testimonial_single'));

    }

    public function update(Request $request,$id){
        $testimonials = Testimonial::where('id',$id)->first();

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);


        $ext = $request->file('photo')->extension();
        $final_name = 'testimonial_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('front/uploads/'),$final_name);

        $testimonials->photo = $final_name;
        $testimonials->name = $request->name;
        $testimonials->designation = $request->designation;
        $testimonials->comment = $request->comment;
        $testimonials->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');

    }//method end
}
