<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\backend\ApplicationController;
use App\Http\Controllers\backend\circularController;
use App\Http\Controllers\backend\ClientController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\backend\GeneralSettingController;
use App\Http\Controllers\career\ComputerSkilController;
use App\Http\Controllers\career\EducationalInfoController;
use App\Http\Controllers\career\EmploymentInfoController;
use App\Http\Controllers\career\PhotoSignatureController;
use App\Http\Controllers\career\ReferanceController;
use App\Http\Controllers\career\UserPersonalDetailsController;
use App\Models\UserPersonalDetails;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/',[frontendController::class, 'index'])->name('index');
Route::get('/about',[frontendController::class, 'about'])->name('about');
Route::get('/mission',[frontendController::class, 'mission'])->name('mission');
Route::get('/vision',[frontendController::class, 'vision'])->name('vision');
Route::get('/our_project',[frontendController::class, 'our_project'])->name('our_project');
Route::get('/contact',[frontendController::class, 'contact'])->name('contact');
Route::get('/our_team',[frontendController::class, 'our_team'])->name('our_team');
Route::get('/gallery',[frontendController::class, 'gallery'])->name('gallery');
Route::get('/career',[frontendController::class, 'career'])->name('career');

// our team seacrh section
Route::get('our_team/search/{search}',[frontendController::class, 'getTeam'])->name('getTeam');

Route::middleware('auth')->group(function(){
    Route::get('/pdf',function(){
        return view('invoice');
     });

    Route::get('user-profile',[CareerController::class, 'userProfileView'])->name('userProfileView');
    Route::get('cvdownload',[CareerController::class, 'cvdownload'])->name('cvdownload');
    Route::get('cvdoprint',[CareerController::class, 'cvdoprint'])->name('cvdoprint');
    Route::get('/viewCircular/details/{id}',[CareerController::class, 'viewCircularDetails'])->name('viewCircularDetails');
    Route::get('/jobApplication/{id}',[CareerController::class, 'jobApplication'])->name('jobApplication');

    Route::get('/career/personal-details',[CareerController::class, 'personalDetails'])->name('career.personal_details');
    Route::get('/career/educational-info',[CareerController::class, 'EducationalInfo'])->name('career.EducationalInfo');
    Route::get('/career/employment-info',[CareerController::class, 'EmploymentInfo'])->name('career.EmploymentInfo');
    Route::get('/career/referance',[CareerController::class, 'Referance'])->name('career.Referance');
    Route::get('/career/computerskill',[CareerController::class, 'ComputerSkill'])->name('career.ComputerSkill');
    Route::get('/career/photo&signature',[CareerController::class, 'PhotoSignature'])->name('career.PhotoSignature');

    Route::resource('/career/personal_details',UserPersonalDetailsController::class,['name' => 'personal_details']);

    Route::resource('/career/referances',ReferanceController::class,['name' => 'refarances']);
    Route::get('/career/referance/remove/{id}',[ReferanceController::class, 'deleteRefer']);
    Route::post('/career/referances/conform',[ReferanceController::class, 'referanceConform'])->name('referanceConform');

    Route::resource('/career/educational_info',EducationalInfoController::class,['name' => 'educational_info']);
    Route::post('educationinfo/conform',[EducationalInfoController::class, 'educationinfoConform'])->name('educationinfoConform');
    Route::get('educationinfo/delete/{id}',[EducationalInfoController::class, 'educationinfoedelete'])->name('educationinfoedelete');

    Route::resource('/career/employment_info',EmploymentInfoController::class,['name' => 'employment_info']);
    Route::get('/career/employment_info/employment_infoDelete/{id}',[EmploymentInfoController::class, 'employment_infoDelete'])->name('employment_infoDelete');
    Route::post('/career/employment_info/conform',[EmploymentInfoController::class, 'employment_infoConform'])->name('employment_infoConform');

    Route::resource('/career/computer-skill',ComputerSkilController::class,['name' => 'computer_skill']);
    Route::resource('/career/photo_signature',PhotoSignatureController::class,['name'=>'phot_signature']);
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/login',[AdminController::class,'login'])->name('login');
    Route::post('/login',[AdminController::class,'check'])->name('login');

    Route::middleware('admin')->group(function(){
        Route::get('/',[AdminController::class,'index'])->name('home');
        Route::post('/',[AdminController::class,'logout'])->name('logout');
        Route::resource('/slider',SliderController::class, ['name'=>'slider']);
        Route::resource('/contact',ContactController::class, ['name'=>'contact']);
        Route::resource('/gallery',GalleryController::class, ['name'=>'gallery']);
        Route::resource('/employee',EmployeeController::class, ['name'=>'employee']);
        Route::resource('/general-setting',GeneralSettingController::class, ['name'=>'general_setting']);
        Route::resource('/circular',circularController::class, ['name'=>'circular']);
        Route::resource('/application',ApplicationController::class, ['name'=>'application']);
    });
});


