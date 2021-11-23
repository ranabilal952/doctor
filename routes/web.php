<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CancelltionController;
use App\Http\Controllers\Condition;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\DiseasesController;
use App\Http\Controllers\DoctoraccordionController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeAccordinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\SessionbookController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\TimeAviableController;
use App\Http\Controllers\TimezoneController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WebsiteLinkController;
use App\Models\HomeAccordin;
use App\Models\Timezone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::get('/', [FrontController::class, 'create']);
Route::view('details', 'front.details');
Route::view('doctor', 'front.doctor');
Route::view('cancelation_policy', 'front.cancelation_policy');
Route::get('how_book', [FrontController::class, 'howBookSession']);
Route::get('cancelltion_policy', [FrontController::class, 'cancel']);
Route::get('privacy', [FrontController::class, 'privacy']);
Route::get('terms', [FrontController::class, 'condition']);
Route::get('blog_detail/{id}', [FrontController::class, 'show']);
Route::get('doctor_detail/{id}', [FrontController::class, 'doctor_detail']);
Route::get('profile_view', [FrontController::class, 'profile']);




Route::get('user', [WebsiteController::class, 'index'])->name('user');



Route::get('social_link', [SocialLinkController::class, 'index'])->name('social_link');


// title
Route::get('title', [TitleController::class, 'index'])->name('title');
Route::post('save_title', [TitleController::class, 'store'])->name('save_title');
Route::post('title_delete', [TitleController::class, 'destroy'])->name('title_delete');

// Accordion
Route::get('accordion', [HomeAccordinController::class, 'index'])->name('accordion');
Route::post('accordion_save', [HomeAccordinController::class, 'store'])->name('accordion_save');
Route::get('accordion_destory/{id}', [HomeAccordinController::class, 'destroy']);


// Counter
Route::get('counter', [CounterController::class, 'index'])->name('counter');
Route::post('counter_save', [CounterController::class, 'store'])->name('counter_save');

// video link
Route::get('home_video', [WebsiteLinkController::class, 'index'])->name('home_video');
Route::post('video_save', [WebsiteLinkController::class, 'store'])->name('video_save');


// footer info
Route::get('footer', [FooterController::class, 'index'])->name('footer');
Route::post('footer_save', [FooterController::class, 'store'])->name('footer_save');


// Social link
Route::get('social_link', [SocialLinkController::class, 'index'])->name('social_link');
Route::post('footer_social', [SocialLinkController::class, 'store'])->name('footer_social');


// Doctor Accordion
Route::get('bbb', [DoctoraccordionController::class, 'create'])->name('bbb');
Route::get('doctor_question', [DoctoraccordionController::class, 'index'])->name('doctor_question');
Route::post('question_save', [DoctoraccordionController::class, 'store'])->name('question_save');

// How to book session
Route::get('Session_book', [SessionbookController::class, 'index'])->name('Session_book');
Route::post('sesion_save', [SessionbookController::class, 'store'])->name('sesion_save');


//User Management
Route::get('create', [UserController::class, 'create'])->name('create');
Route::get('all_user', [UserController::class, 'index'])->name('all_user');
Route::post('user_save', [UserController::class, 'store'])->name('user_save');


// Add Speciality
Route::get('add_speciality', [SpecialityController::class, 'index'])->name('add_speciality');
Route::post('speciality_save', [SpecialityController::class, 'store'])->name('speciality_save');


// Add Diseases
Route::get('diseases_add',[DiseasesController::class, 'index'])->name('diseases_add');
Route::post('diseases_save',[DiseasesController::class, 'store'])->name('diseases_save');


//Term Condition 
Route::get('terms_detail',[ConditionController::class, 'index'])->name('terms_detail');
Route::post('terms_detail_save',[ConditionController::class, 'store'])->name('terms_detail_save');


// Privacy Policy
Route::get('privacy_policy',[PrivacyController::class, 'index'])->name('privacy_policy');
Route::post('privacy_policy_save',[PrivacyController::class, 'store'])->name('privacy_policy_save');

// Cancelltion Policy
Route::get('Cancelltion_policy',[CancelltionController::class, 'index'])->name('Cancelltion_policy');
Route::post('cancelltion_policy_save',[CancelltionController::class, 'store'])->name('cancelltion_policy_save');


// Blog Information
Route::get('blog_create',[BlogController::class, 'create'])->name('blog_create');
Route::get('all_blogs',[BlogController::class, 'index'])->name('all_blogs');
// Route::get('blog_detail',[BlogController::class, 'show'])->name('blog_detail');
Route::post('blog_save',[BlogController::class, 'store'])->name('blog_save');

// Doctor Detail
Route::get('create_doctor',[DoctorController::class, 'create'])->name('create_doctor');
Route::post('doctor_detail_save',[DoctorController::class, 'store'])->name('doctor_detail_save');

//Apointment
Route::get('available_appointment',[AppointmentController::class, 'create'])->name('available_appointment');

Route::view('cancel_appointment', 'appointment.cancell_appointment')->name('cancel_appointment');
Route::view('done_appointment', 'appointment.cancell_appointment')->name('done_appointment');

//Aviable Time

Route::get('aviable_time',[TimeAviableController::class, 'index'])->name('aviable_time');
Route::get('checkLogin',[UserController::class, 'checkLogin'])->name('checkLogin');
