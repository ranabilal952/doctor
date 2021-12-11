<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentScheduleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CancelltionController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\DiseasesController;
use App\Http\Controllers\DoctoraccordionController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorvideoController;
use App\Http\Controllers\DynamicFieldController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeAccordinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JitsiMeetingController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OnlineStatusController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentSettingController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\SessionbookController;
use App\Http\Controllers\SlotTimeController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TimeAviableController;
use App\Http\Controllers\TimezoneController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WebsiteLinkController;
use App\Http\Controllers\WeekdayController;
use App\Models\AppointmentSchedule;
use App\Models\PaymentSetting;
use App\Models\SlotController;
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
Route::post('user_save', [UserController::class, 'update'])->name('user_save');


// Add Speciality
Route::get('add_speciality', [SpecialityController::class, 'index'])->name('add_speciality');
Route::post('speciality_save', [SpecialityController::class, 'store'])->name('speciality_save');


// Add Diseases
Route::get('diseases_add', [DiseasesController::class, 'index'])->name('diseases_add');
Route::post('diseases_save', [DiseasesController::class, 'store'])->name('diseases_save');


//Term Condition 
Route::get('terms_detail', [ConditionController::class, 'index'])->name('terms_detail');
Route::post('terms_detail_save', [ConditionController::class, 'store'])->name('terms_detail_save');


// Privacy Policy
Route::get('privacy_policy', [PrivacyController::class, 'index'])->name('privacy_policy');
Route::post('privacy_policy_save', [PrivacyController::class, 'store'])->name('privacy_policy_save');

// Cancelltion Policy
Route::get('Cancelltion_policy', [CancelltionController::class, 'index'])->name('Cancelltion_policy');
Route::post('cancelltion_policy_save', [CancelltionController::class, 'store'])->name('cancelltion_policy_save');


// Blog Information
Route::get('blog_create', [BlogController::class, 'create'])->name('blog_create');
Route::get('all_blogs', [BlogController::class, 'index'])->name('all_blogs');
// Route::get('blog_detail',[BlogController::class, 'show'])->name('blog_detail');
Route::post('blog_save', [BlogController::class, 'store'])->name('blog_save');

// Doctor Detail
Route::get('create_doctor', [DoctorController::class, 'create'])->name('create_doctor');
Route::post('doctor_detail_save', [DoctorController::class, 'store'])->name('doctor_detail_save');

//Apointment
Route::get('available_appointment', [AppointmentController::class, 'create'])->name('available_appointment');



//Aviable Time

Route::get('aviable_time', [TimeAviableController::class, 'index'])->name('aviable_time');
Route::post('store_time', [TimeAviableController::class, 'store'])->name('store_time');
Route::get('checkLogin', [UserController::class, 'checkLogin'])->name('checkLogin');


Route::get('appoint', [AppointmentController::class, 'home']);
Route::resource('weekday', WeekdayController::class);
Route::resource('slottime', SlotTimeController::class);
Route::resource('slot', SlotController::class);
Route::resource('timezone', TimezoneController::class);
Route::resource('appointment', AppointmentController::class); //getavailability
Route::post('getavailability', [AppointmentController::class, 'getavailability']);
Route::post('loginThroughAjax', [AppointmentController::class, 'loginThroughAjax']);



///DOCTOR APPOINTMENTs

Route::get('getCurrentAppointments', [AppointmentController::class, 'getCurrentAppointments']);
Route::get('getPastAppointments', [AppointmentController::class, 'getPastAppointments']);
Route::get('changeAppointmentStatus/{appointment_id}/{status}', [AppointmentController::class, 'changeAppointmentStatus']);


//JITSI
Route::get('generateMeeting/{appointment_id}', [JitsiMeetingController::class, 'store']);
Route::get('meeting/{appointment_id}',  [JitsiMeetingController::class, 'getIntoMeeting']);
Route::post('changeMeetingStatus', [JitsiMeetingController::class, 'changeMeetingStatus']);


// Doctor Video
Route::get('doctorvideo',  [DoctorvideoController::class, 'index'])->name('doctorvideo');
Route::post('videosave', [DoctorvideoController::class, 'store'])->name('videosave');


// Offer
Route::get('offer',  [OfferController::class, 'index'])->name('offer');
Route::get('create-offer', [OfferController::class, 'create']);
Route::post('offersave', [OfferController::class, 'store'])->name('offersave');
Route::get('toggle-offer/{id}', [OfferController::class, 'toggleOffer']);


Route::get('onlinesetting', [OnlineStatusController::class, 'create'])->name('onlinesetting');
Route::post('postOnlineStatus', [OnlineStatusController::class, 'store']);
Route::view('activesession', 'Schedules.index')->name('activesession');
Route::view('therapist ', 'psychometer.create')->name('therapist');



Route::get('dynamic-field', [DynamicFieldController::class, 'index'])->name('dynamic-field');
Route::post('dynamic-field/insert', [DynamicFieldController::class, 'insert'])->name('dynamic-field/insert');


Route::get('test',  [TestController::class, 'index'])->name('test');
Route::post('testsave', [TestController::class, 'store'])->name('testsave');

Route::resource('schedule', SchedulesController::class);
Route::get('create-schedule', [SchedulesController::class, 'create']);
Route::get('active-schedule', [SchedulesController::class, 'getActiveSchedule']);
Route::post('store-schedule', [SchedulesController::class, 'store']);
Route::get('all-schedules', [SchedulesController::class, 'index']);
Route::get('booked-schedule', [SchedulesController::class, 'getBookedSchedule']);


Route::get('payment-schedule/{id}', [SchedulesController::class, 'paymentSchedule']);
Route::get('book-schedule/{id}', [SchedulesController::class, 'bookSchedule']);

Route::get('get-next-session', [AppointmentScheduleController::class, 'getNextSession']);
Route::get('get-previous-session', [AppointmentScheduleController::class, 'getPreviousSession']);
Route::get('view-appointment/{id}', [AppointmentScheduleController::class, 'viewAppointment']);

Route::view('video-test', 'jitsi.video-test');


Route::get('testcreate', [TestController::class, 'create'])->name('testcreate');


Route::post('stripe', [PaymentController::class, 'stripePost'])->name('stripe.post');

Route::get('payment-setting', [PaymentSettingController::class, 'create']);
Route::post('payment-setting', [PaymentSettingController::class, 'store']);

Route::get('get-all-doctors', [DoctorController::class, 'getAllDoctors']);
