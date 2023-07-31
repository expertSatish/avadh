<?php

use App\Http\Controllers\Admin\About\AboutCollegeController;
use App\Http\Controllers\Admin\About\AdvisorController;
use App\Http\Controllers\Admin\About\DirectorController;
use App\Http\Controllers\Admin\About\HodMessageController;
use App\Http\Controllers\Admin\About\ManagerMessageController;
use App\Http\Controllers\Admin\About\VisionMissionController;
use App\Http\Controllers\Admin\AcademicController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\BoardMember;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\Setting\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Banner\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\MsgApp;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GalleryVideoController;
use App\Http\Controllers\Admin\StudentServiceController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Placement\PlacementMemberController;
use App\Http\Controllers\Placement\ForRecruitersController;
use App\Http\Controllers\Admin\EventCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\EnquiryController;

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


Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

/*Admin Dashboard Start*/
Route::group(['prefix' => MsgApp::LINK_ADMIN, 'middleware' => ['auth', 'user-access:Admin']], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name(MsgApp::LINK_ADMIN . '.dashboard');
    Route::resource('/banners', BannerController::class);
    Route::resource('/awards', AwardController::class);
    Route::resource('/manage-academics', AcademicController::class);
    Route::resource('/department', DepartmentController::class);
    Route::resource('/gallery', GalleryController::class);
    Route::resource('/videoData', GalleryVideoController::class);
    Route::resource('/faculty', FacultyController::class);
    Route::resource('/StudentServices', StudentServiceController::class);
    Route::resource('/manage-event', EventController::class);
    Route::resource('/manage-facilities', FacilityController::class);
    Route::resource('/faq', FaqController::class);
    Route::resource('/manage-news', NewsController::class);
    Route::resource('/manage-board_member', BoardMember::class);
    
     Route::group(['prefix' => MsgApp::enquiryForms], function () {
        Route::get('/admission-enquiry-form', [EnquiryController::class,'admissionEnquiry'])->name('admissionEnquiryForm');
        Route::get('/online-admission-form',[ EnquiryController::class,'onlineAdmission'])->name('onlineAdmission');
        Route::get('/contact-enquiry-form', [EnquiryController::class,'conactForm'])->name('conactForm');
        Route::get('admin/enquiryForms/view-form/{id}', [EnquiryController::class, 'viewCompleteForm'])->name('enquiryForms.view');

    });

    Route::group(['prefix' => MsgApp::SETTING], function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name(MsgApp::SETTING . '.profile');
        Route::post('/profile', [ProfileController::class, 'post'])->name(MsgApp::SETTING . '.profile');
        Route::post('/account/update/pass', [ProfileController::class, 'updatePass'])->name('updatePass');
});
Route::group(['prefix' => MsgApp::About], function () {
    Route::resource('/college', AboutCollegeController::class);
    Route::resource('/mission_vission', VisionMissionController::class);
    Route::resource('/manager-message', ManagerMessageController::class);
    Route::resource('/director-message', DirectorController::class);
    Route::resource('/hod-message',HodMessageController::class);
    Route::resource('/advisor-message',AdvisorController::class);

});
 Route::group(['prefix' => MsgApp::event], function () {
        Route::resource('/manage-event', EventController::class);
        Route::resource('/event-category', EventCategoryController::class);
    });

Route::group(['prefix' => MsgApp::placement], function () {
    Route::resource('/add-member', PlacementMemberController::class);
    Route::resource('/add-Recruiter', ForRecruitersController::class);
});
});

/*Admin Dashboard End*/

/*Student Dashboard Start*/
Route::group(['prefix' =>'student', 'middleware' => ['auth', 'user-access:Student']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('student.dashboard');
});
/*Student Dashboard End*/

/*Faculty Dashboard Start*/
Route::group(['prefix' =>'faculty', 'middleware' => ['auth', 'user-access:Faculty']], function () {
    Route::get('/', [HomeController::class, 'managerHome'])->name('faculty.dashboard');
}); 
/*Faculty Dashboard End*/

//for frontend routes 
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about-college', [IndexController::class, 'aboutCollege'])->name('aboutCollege');
Route::get('/vision-mission', [IndexController::class, 'visionMission'])->name('visionMission');
Route::get('/manager-messages', [IndexController::class, 'managerMessage'])->name('managerMessage');
Route::get('/director-messages', [IndexController::class, 'directorMessage'])->name('directorMessage');
Route::get('/hod-messages', [IndexController::class, 'hodMessage'])->name('hodMessage');
Route::get('/advisor-messages', [IndexController::class, 'advisorMessage'])->name('advisorMessage');
Route::get('/why-us', [IndexController::class, 'whyUs'])->name('whyUs');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::get('/gallery-image', [IndexController::class, 'imageGallery'])->name('imageGallery');
Route::get('/video-gallery', [IndexController::class, 'videoGallery'])->name('videoGallery');
Route::get('/anti-ragging', [IndexController::class, 'antiragging'])->name('antiragging');
Route::get('/gender-sensitization', [IndexController::class, 'genderSensitization'])->name('genderSensitization');
Route::get('/placement-cell', [IndexController::class, 'placementCell'])->name('placementCell');
Route::get('/career-development', [IndexController::class, 'careerDevelopmant'])->name('careerDevelopmant');
Route::post('/career-development/store', [IndexController::class, 'saveCareerForm'])->name('saveCareerForm');
Route::post('/contact-save', [IndexController::class, 'postData']);
Route::get('/annaul-day', [IndexController::class, 'annualDay'])->name('annual-day');
Route::get('/sports-day', [IndexController::class, 'sportsday'])->name('sports-day');
Route::get('/college-heighlite', [IndexController::class, 'collegeHeiglights'])->name('collegeHeiglights');
Route::get('/governing-day', [IndexController::class, 'governingBody'])->name('governingBody');
Route::get('/bord-member', [IndexController::class, 'bordMember'])->name('bordMember');

Route::get('/event', [IndexController::class, 'event'])->name('event');
Route::get('/news/{slug}', [IndexController::class, 'news'])->name('news');

Route::get('/event-details/{slug}', [IndexController::class, 'eventDetailsData']);


Route::get('/for-recruiters', [IndexController::class, 'forRecruiters'])->name('forRecruiters');
Route::get('/enquiry', [IndexController::class, 'enquiry'])->name('enquiry');
Route::post('/enquiry-save', [IndexController::class, 'enquirySave'])->name('admissionEnquiry');
Route::get('get-cities', [IndexController::class, 'getCities'])->name('get-city');
Route::get('/privacy-policy', [IndexController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/terms-and-condition', [IndexController::class, 'termCondition'])->name('termCondition');
Route::get('/feedback', [IndexController::class, 'feedback'])->name('feedback');
Route::get('/placement-internship', [IndexController::class, 'placementInternship'])->name('placementInternship');



Route::get('/faculty/{slug}', [IndexController::class, 'pharmaceuticsDepartment']);
Route::get('/event/{slug}', [IndexController::class, 'eventDetails']);
Route::get('/academic/{slug}', [IndexController::class, 'academicDetails']);
Route::get('/student-service/{slug}', [IndexController::class, 'studentServiceData']);

Route::get('/d-pharm', [IndexController::class, 'dpharm'])->name('dpharm');
Route::get('/b-pharm', [IndexController::class, 'bpharm'])->name('bpharm');

Route::get('/free-english-speaking-classes', [IndexController::class, 'freeEnglish'])->name('freeEnglish');
Route::get('/facility/{slug}', [IndexController::class, 'facility']);

Route::get('/faq', [IndexController::class, 'faq'])->name('faq');
Route::get('/online-form', [IndexController::class, 'onlineForm'])->name('onlineForm');
Route::post('/saveOnlineFrom', [IndexController::class, 'saveOnlineFrom'])->name('saveOnlineFrom');

Route::get('/academic-programme', [IndexController::class, 'academicProgramme'])->name('academicProgramme');
Route::get('/academic-facilitie', [IndexController::class, 'academicFacilities'])->name('academicFacilities');
Route::get('/campus-facilities', [IndexController::class, 'campusFacilities'])->name('campusFacilities');
Route::get('/student-welfareServices', [IndexController::class, 'studentWelfareServices'])->name('studentWelfareServices');
Route::get('/sports-facilities', [IndexController::class, 'sportsFacilities'])->name('sportsFacilities');
Route::get('/cultural-facility', [IndexController::class, 'culturalFacility'])->name('culturalFacility');














