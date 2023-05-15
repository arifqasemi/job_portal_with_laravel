<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class PostFController extends Controller
{

    public function index(){
        $posts = Post::orderBy('id','desc')->paginate(2);

     return view('front.post',compact('posts'));
    }


    public function post($slug){
        $single_post = Post::where('slug',$slug)->get()->first();
        $single_post->total_view=$single_post->total_view+1;
        $single_post->update(); 
        return view('front.single_post',compact('single_post'));

    }

}
