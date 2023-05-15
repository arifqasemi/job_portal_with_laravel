<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        // $posts = Post::orderBy('id','desc')->paginate(2);

     return view('admin.contact');
    }
}
