<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){
        $posts = Post::get();
        return view('admin.post',compact('posts'));
    }//method end


    public function add()
    {
        return view('admin.add_post');
    }//mehtod end


    public function store(Request $request){
        $request->validate([
            'heading' => 'required',
            'slug' => 'required|alpha_dash|unique:posts',
            'short_description' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $obj = new Post();

        $ext = $request->file('photo')->extension();
        $final_name = 'post_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('front/uploads/'),$final_name);

        $obj->photo = $final_name;
        $obj->heading = $request->heading;
        $obj->slug = $request->slug;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->total_view = 0;
        $obj->title = $request->title;
        $obj->meta_description = $request->meta_description;
        $obj->save();

        return redirect()->route('post')->with('success', 'Data is saved successfully.');

    }// method end


    public function edit($id)
    {
        $post_single = Post::where('id',$id)->first();
        return view('admin.edit_post',compact('post_single'));
    }// method end



    public function update(Request $request, $id)
    {
        $obj = Post::where('id',$id)->first();

        $request->validate([
            'heading' => 'required',
            'slug' => ['required','alpha_dash',Rule::unique('posts')->ignore($id)],
            'short_description' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('front/uploads/'.$obj->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'post_'.time().'.'.$ext;

            $request->file('photo')->move(public_path('front/uploads/'),$final_name);

            $obj->photo = $final_name;
        }

        $obj->heading = $request->heading;
        $obj->slug = $request->slug;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->title = $request->title;
        $obj->meta_description = $request->meta_description;
        $obj->update();

        return redirect()->route('post')->with('success', 'Data is updated successfully.');

    }// method end


    public function delete($id)
    {
        $post_single = Post::where('id',$id)->first();
        unlink(public_path('front/uploads/'.$post_single->photo));
        Post::where('id',$id)->delete();
        return redirect()->route('post')->with('success', 'Data is deleted successfully.');
    }
}
