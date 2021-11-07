<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeAccordinController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/', [FrontController::class, 'create']);
Route::view('details', 'front.details');
Route::view('doctor', 'front.doctor');
Route::get('how_book', [FrontController::class, 'howBookSession']);



Route::get('user', [App\Http\Controllers\WebsiteController::class, 'index'])->name('user');



Route::get('social_link', [App\Http\Controllers\SocialLinkController::class, 'index'])->name('social_link');


// title
Route::get('title', [App\Http\Controllers\titleController::class, 'index'])->name('title');
Route::post('save_title', [App\Http\Controllers\titleController::class, 'store'])->name('save_title');
Route::post('title_delete', [App\Http\Controllers\titleController::class, 'destroy'])->name('title_delete');

// Accordion
Route::get('accordion', [App\Http\Controllers\HomeAccordinController::class, 'index'])->name('accordion');
Route::post('accordion_save', [App\Http\Controllers\HomeAccordinController::class, 'store'])->name('accordion_save');
Route::get('accordion_destory/{id}', [HomeAccordinController::class, 'destroy']);


// Counter
Route::get('counter', [App\Http\Controllers\CounterController::class, 'index'])->name('counter');
Route::post('counter_save', [App\Http\Controllers\CounterController::class, 'store'])->name('counter_save');

// video link
Route::get('home_video', [App\Http\Controllers\WebsiteLinkController::class, 'index'])->name('home_video');
Route::post('video_save', [App\Http\Controllers\WebsiteLinkController::class, 'store'])->name('video_save');


// footer info
Route::get('footer', [App\Http\Controllers\FooterController::class, 'index'])->name('footer');
Route::post('footer_save', [App\Http\Controllers\FooterController::class, 'store'])->name('footer_save');


// Social link
Route::get('social_link', [App\Http\Controllers\SocialLinkController::class, 'index'])->name('social_link');
Route::post('footer_social', [App\Http\Controllers\SocialLinkController::class, 'store'])->name('footer_social');


// Doctor Accordion
Route::get('doctor_question', [App\Http\Controllers\DoctoraccordionController::class, 'index'])->name('doctor_question');
Route::post('question_save', [App\Http\Controllers\DoctoraccordionController::class, 'store'])->name('question_save');

// How to book session
Route::get('Session_book', [App\Http\Controllers\SessionbookController::class, 'index'])->name('Session_book');
Route::post('sesion_save', [App\Http\Controllers\SessionbookController::class, 'store'])->name('sesion_save');
