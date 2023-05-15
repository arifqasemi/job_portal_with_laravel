<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageContent;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\Job;
use App\Models\Testimonial;
use App\Models\Post;


class HomeController extends Controller
{
    //


    public function index(){
       $home_page_content = HomePageContent::where('id',1)->first();
       $job_categories = JobCategory::withCount('rJob')->orderBy('name','asc')->take(9)->get();
       $testimonials = Testimonial::get();
       $job_locations = JobLocation::get();
       $featured_jobs = Job::with('rCompany')->orderBy('id','desc')->where('is_featured',1)->get();

       $posts = Post::take(3)->get();
        return view('front.home',compact('home_page_content','job_categories','testimonials','posts','job_locations','featured_jobs'));
    }
}
