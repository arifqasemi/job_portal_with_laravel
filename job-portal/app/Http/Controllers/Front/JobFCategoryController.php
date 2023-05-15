<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;
class JobFCategoryController extends Controller
{
    public function index()
    {
        $job_categories = JobCategory::get();
        return view('front.job_categories', compact('job_categories'));
    }
}
