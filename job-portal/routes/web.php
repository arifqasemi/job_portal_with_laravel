<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\jobcategoryController;
use App\Http\Controllers\admin\JobLocationController;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\JobFCategoryController;
use App\Http\Controllers\admin\AdminTestimonialController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\Front\PostFController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\Front\ContactFController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\Front\PricingController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\SignUpController;
use App\Http\Controllers\Front\ForgetController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Candidate\candidateController;
use App\Http\Controllers\admin\JobTypeController;
use App\Http\Controllers\admin\JobExperienceController;
use App\Http\Controllers\Company\CompanyLocationController;
use App\Http\Controllers\Company\CompanyIndustryController;
use App\Http\Controllers\Front\JobSearchController;
use App\Http\Controllers\Front\CompanyListsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



/*
|--------------------------------------------------------------------------
| admin home Routes
|--------------------------------------------------------------------------
|
*/


Route::get('admin/logout',[AdminHomeController::class,'logout'])->name('admin_logout');
Route::get('admin/login',[AdminHomeController::class,'login'])->name('admin_login');
Route::get('admin/forget_password',[AdminHomeController::class,'forget_password'])->name('admin_forget_password');
Route::post('admin/admin_login',[AdminHomeController::class,'admin_login_submit'])->name('admin_login_submit');
Route::post('admin/forget_password',[AdminHomeController::class,'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('reset_password/{token}/{email}',[AdminHomeController::class,'reset_password'])->name('reset_password');
Route::post('reset_password',[AdminHomeController::class,'reset_password_submit'])->name('reset_password_submit');

/*
|--------------------------------------------------------------------------
| admin home Routes ends
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| admin  Routes
|--------------------------------------------------------------------------
|
*/
Route::middleware(['admin:admin'])->group(function(){
    Route::get('admin',[AdminHomeController::class,'index'])->name('admin_home');

Route::get('admin/profile',[AdminProfileController::class,'index'])->name('admin_profile');

Route::post('admin/profile_submit',[AdminProfileController::class,'admin_profile_submit'])->name('admin_profile_submit');
});


Route::get('admin/setting_page',[SettingController::class,'index'])->name('setting_page');
Route::post('admin/setting_page_update',[SettingController::class,'setting_page_update'])->name('setting_page_update');


Route::get('admin/job_category',[jobcategoryController::class,'index'])->name('job_category');

Route::get('admin/add_job_category',[jobcategoryController::class,'add'])->name('add_job_category');
Route::post('admin/store_category',[jobcategoryController::class,'store'])->name('store_job_category');
Route::get('admin/edit_job_category/{id}',[jobcategoryController::class,'edit'])->name('edit_job_category');
Route::post('admin/update_job_category/{id}',[jobcategoryController::class,'update'])->name('update_job_category');
Route::get('admin/delete_job_category/{id}',[jobcategoryController::class,'delete'])->name('delete_job_category');



Route::get('admin/testimonial',[AdminTestimonialController::class,'index'])->name('testimonial');
Route::get('admin/add_testimonial',[AdminTestimonialController::class,'add'])->name('add_testimonial');
Route::post('admin/store_testimonial',[AdminTestimonialController::class,'store'])->name('store_testimonial');
Route::get('admin/delete_testimonial/{id}',[AdminTestimonialController::class,'delete'])->name('delete_testimonial');
Route::get('admin/edit_testimonial/{id}',[AdminTestimonialController::class,'edit'])->name('edit_testimonial');
Route::post('admin/update_testimonial/{id}',[AdminTestimonialController::class,'update'])->name('update_testimonial');





Route::get('admin/post',[PostController::class,'index'])->name('post');
Route::get('admin/add_post',[PostController::class,'add'])->name('add_post');
Route::post('admin/store_post',[PostController::class,'store'])->name('store_post');
Route::get('admin/edit_post/{id}',[PostController::class,'edit'])->name('edit_post');
Route::get('admin/delete_post/{id}',[PostController::class,'delete'])->name('delete_post');
Route::post('admin/update_post/{id}',[PostController::class,'update'])->name('update_post');
Route::get('contact',[ContactController::class,'index'])->name('contact');





Route::get('package',[PackageController::class,'index'])->name('package');
Route::get('add_package',[PackageController::class,'add'])->name('add_package');
Route::get('edit_package/{id}',[PackageController::class,'edit'])->name('edit_package');
Route::get('delete_package/{id}',[PackageController::class,'delete'])->name('delete_package');
Route::post('store_package',[PackageController::class,'store'])->name('store_package');
Route::post('update_package/{id}',[PackageController::class,'update'])->name('update_package');


           /////-------job location---------////

Route::get('job_location',[JobLocationController::class,'index'])->name('job_location');
Route::get('add_job_location',[JobLocationController::class,'add'])->name('add_job_location');
Route::post('store_job_location',[JobLocationController::class,'store'])->name('store_job_location');
Route::get('delete_job_location/{id}',[JobLocationController::class,'delete'])->name('delete_job_location');



               /////-------job type---------////
Route::get('job_type',[JobTypeController::class,'index'])->name('job_type');

Route::get('add_job_type',[JobTypeController::class,'add'])->name('add_job_type');
Route::post('store_job_type',[JobTypeController::class,'store'])->name('store_job_type');
Route::post('edit_job_type',[JobTypeController::class,'edit'])->name('edit_job_type');
Route::post('delete_job_type',[JobTypeController::class,'delete'])->name('delete_job_type');



                     /////-------job experience---------////

Route::get('job_expereince',[JobExperienceController::class,'index'])->name('job_expereince');
Route::get('add_job_experience',[JobExperienceController::class,'add'])->name('add_job_experience');
Route::post('store_job_experience',[JobExperienceController::class,'store'])->name('store_job_experience');
Route::get('delete_job_experience/{id}',[JobExperienceController::class,'delete'])->name('delete_job_experience');

                     /////-------company location---------////
Route::get('company_location',[CompanyLocationController::class,'index'])->name('company_location');
Route::get('add_company_location',[CompanyLocationController::class,'add'])->name('add_company_location');
Route::post('store_company_location',[CompanyLocationController::class,'store'])->name('store_company_location');
Route::get('delete_company_location/{id}',[CompanyLocationController::class,'delete'])->name('delete_company_location');


                              /////-------company indusrty---------////
Route::get('company_industry',[CompanyIndustryController::class,'index'])->name('company_industry');
Route::get('add_company_industry',[CompanyIndustryController::class,'add'])->name('add_company_industry');
Route::post('store_company_industry',[CompanyIndustryController::class,'store'])->name('store_company_industry');
Route::get('delete_company_industry/{id}',[CompanyIndustryController::class,'delete'])->name('delete_company_industry');

/*
|--------------------------------------------------------------------------
| admin  Routes end
|--------------------------------------------------------------------------
|
*/





/*
|--------------------------------------------------------------------------
| frontend  Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('terms',[TermsController::class,'index'])->name('terms');
Route::get('categories',[JobFCategoryController::class,'index'])->name('all_categories');



Route::get('post',[PostFController::class,'index'])->name('posts');
Route::get('post/{slug}',[PostFController::class,'post'])->name('single_post');


Route::get('contact',[ContactFController::class,'index'])->name('front.contact');
Route::post('contact',[ContactFController::class,'submit'])->name('conact_submit');





Route::get('pricing',[PricingController::class,'index'])->name('pricing');


   /////------- login route starts-----------////

Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('company_login_submit',[LoginController::class,'company_login_submit'])->name('company_login1_submit');
Route::get('company_logout',[LoginController::class,'company_logout'])->name('company_logout');

   /////------- sign up route starts-----------////

Route::get('signup',[SignUpController::class,'index'])->name('signup');



      /////----------Forget Password Controller Route company--------/////
Route::post('reset_company_password_submit',[ForgetController::class,'reset_password_submit'])->name('reset_company_password_submit');
Route::get('forget_password',[ForgetController::class,'forget_view'])->name('forget_password');
Route::post('check_company_email_for_reset_password',[ForgetController::class,'check_company_email'])->name('check_company_email_for_reset_password');
Route::get('reset_company_password/{token}/{email}',[ForgetController::class,'reset_company_password'])->name('reset_company_password');
Route::post('renew_company_password',[ForgetController::class,'renew_company_password'])->name('renew_company_password');
     
    /////----------Forget Password Controller Route candidate--------/////
Route::get('candidate_forget_password',[ForgetController::class,'candidate_forget_view'])->name('candidate_forget_password');
Route::post('check_candidate_email_for_reset_password',[ForgetController::class,'check_candidate_email'])->name('check_candidate_email_for_reset_password');
Route::get('reset_candidate_password/{token}/{email}',[ForgetController::class,'reset_candidate_password'])->name('reset_candidate_password');
Route::post('renew_candidate_password',[ForgetController::class,'renew_candidate_password'])->name('renew_candidate_password');






   /////------- company dashboard-----------////
Route::middleware(['company:company'])->group(function(){
    Route::get('company_dashboard',[CompanyController::class,'index'])->name('company_dashboard');
    Route::get('company_payment',[CompanyController::class,'make_payment'])->name('company_payment');
    Route::get('company_order',[CompanyController::class,'company_order'])->name('company_order');
    Route::get('company_profile',[CompanyController::class,'edit'])->name('company_profile');
    Route::post('update_company_profile',[CompanyController::class,'update'])->name('update_company_profile');
    Route::get('add_job',[CompanyController::class,'add_job'])->name('add_job');
    Route::post('store_job',[CompanyController::class,'store'])->name('store_job');
    Route::get('all_jobs',[CompanyController::class,'jobs'])->name('all_jobs');
    Route::get('edit_jobs/{id}',[CompanyController::class,'edit_job'])->name('edit_job');
    Route::get('delete_jobs/{id}',[CompanyController::class,'delete_job'])->name('delete_job');
    Route::post('update_job/{id}',[CompanyController::class,'update_job'])->name('update_job');
    Route::get('company_candidate_application',[CompanyController::class,'candidate_application'])->name('company_candidate_application');
    Route::get('applicants/{id}',[CompanyController::class,'applicants'])->name('applicants');
    Route::get('applicant_resume/{id}',[CompanyController::class,'applicant_resume'])->name('applicant_resume');
    Route::post('change_application_status/',[CompanyController::class,'change_application_status'])->name('change_application_status');

});

Route::post('company/signup',[SignUpController::class,'company_signup'])->name('company_signup');
// Route::post('company/signup',[SignUpController::class,'company_signup'])->name('company_signup');
Route::get('company_signup_verify/{token}/{email}',[SignUpController::class,'company_signup_verify'])->name('company_signup_verify');








   /////------- candidate dashboard-----------////
   Route::middleware(['candidate:candidate'])->group(function(){
      Route::get('candidate_dashboard/',[candidateController::class,'index'])->name('candidate_dashboard');
      Route::get('edit_candidate_profile',[candidateController::class,'edit'])->name('edit_candidate_profile');
      Route::post('update_candidate_profile/',[candidateController::class,'update'])->name('update_candidate_profile');
      Route::get('candidate_education/',[candidateController::class,'education'])->name('candidate_education');
      Route::get('add_candidate_education/',[candidateController::class,'add_education'])->name('add_candidate_education');
      Route::post('store_candidate_education/',[candidateController::class,'store_education'])->name('store_candidate_education');
      Route::get('delete_education/{id}',[candidateController::class,'delete_education'])->name('delete_education');
      Route::get('candidate_skill/',[candidateController::class,'skill'])->name('candidate_skill');
      Route::get('add_skill/',[candidateController::class,'add_skill'])->name('add_skill');
      Route::post('store_skill/',[candidateController::class,'store_skill'])->name('store_skill');
      Route::get('delete_skill/{id}',[candidateController::class,'delete_skill'])->name('delete_skill');
      Route::get('candidate_experience',[candidateController::class,'experience'])->name('candidate_experience');
      Route::get('add_experience',[candidateController::class,'add_experience'])->name('add_experience');
      Route::post('store_experience',[candidateController::class,'store_experience'])->name('store_experience');
      Route::get('delete_experience',[candidateController::class,'delete_experience'])->name('delete_experience');
      Route::get('candidate_award',[candidateController::class,'award'])->name('candidate_award');
      Route::get('add_candidate_award',[candidateController::class,'add_award'])->name('add_candidate_award');
      Route::post('store_candidate_award',[candidateController::class,'store_award'])->name('store_candidate_award');
      Route::get('delete_candidate_award',[candidateController::class,'delete_award'])->name('delete_candidate_award');
      Route::get('candidate_resume',[candidateController::class,'resume'])->name('candidate_resume');
      Route::get('add_candidate_resume',[candidateController::class,'add_resume'])->name('add_candidate_resume');
      Route::post('store_candidate_resume',[candidateController::class,'store_resume'])->name('store_candidate_resume');
      Route::get('delete_candidate_resume/{id}',[candidateController::class,'delete_resume'])->name('delete_candidate_resume');
      Route::get('add_bookmark/{id}',[candidateController::class,'add_bookmark'])->name('add_bookmark');
      Route::get('view_bookmark',[candidateController::class,'view_bookmark'])->name('view_bookmark');
      Route::get('delete_bookmark/{id}',[candidateController::class,'delete_bookmark'])->name('delete_bookmark');
      Route::get('apply/{id}',[candidateController::class,'apply'])->name('apply');
      Route::post('apply_submit/{id}',[candidateController::class,'apply_submit'])->name('apply_submit');
      Route::get('applied_jobs',[candidateController::class,'applications'])->name('applied_jobs');

  });
// Route::get('candidate_dashboard/',[candidateController::class,'index'])->name('candidate_dashboard');
Route::post('candidate_login_submit/',[LoginController::class,'candidate_login_submit'])->name('candidate_login_submit');
Route::post('candidate',[SignUpController::class,'candidate_signup_submit'])->name('candidate_signup_submit');
Route::get('candidate_signup_verify/{token}/{email}',[SignUpController::class,'candidate_signup_verify'])->name('candidate_signup_verify');
Route::get('candidate_logout/',[LoginController::class,'candidate_logout'])->name('candidate_logout');










           //////-----------Job search-------------/////

Route::get('job/search',[JobSearchController::class,'index'])->name('job_search');
Route::get('job/details/{id}',[JobSearchController::class,'details'])->name('job_details');
Route::post('job/enquery',[JobSearchController::class,'send_email'])->name('job_enquery');


               //////-----------Company search-------------/////


Route::get('company/search',[CompanyListsController::class,'index'])->name('company_search');
Route::get('company/{id}',[CompanyListsController::class,'company_detail'])->name('single_company');
Route::get('filter_company',[CompanyListsController::class,'index'])->name('filter_company');

/*
|--------------------------------------------------------------------------
| frontend  Routes end
|--------------------------------------------------------------------------
|
*/