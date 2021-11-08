<?php

use App\Http\Controllers\CounterController;
use App\Http\Controllers\DoctoraccordionController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeAccordinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionbookController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WebsiteLinkController;
use App\Models\HomeAccordin;
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
Route::get('how_book', [FrontController::class, 'howBookSession']);



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
Route::get('doctor_question', [DoctoraccordionController::class, 'index'])->name('doctor_question');
Route::post('question_save', [DoctoraccordionController::class, 'store'])->name('question_save');

// How to book session
Route::get('Session_book', [SessionbookController::class, 'index'])->name('Session_book');
Route::post('sesion_save', [SessionbookController::class, 'store'])->name('sesion_save');
