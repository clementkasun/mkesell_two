<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Graduate;
use App\Models\Notifications;
use App\Models\Vacancy;
use App\Notifications\VacancyNotification;
use Illuminate\Support\Facades\Notification;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/results/export', [JsonResultsController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/survey_setup', [App\Http\Controllers\TitleController::class, 'show']);
Route::get('/survey_mapping', [\App\Http\Controllers\AttributeHierachyMappingController::class, 'index']);
//Route::get('/survey_view/id/{id}', 'SurveyTitleController@view');
Route::get('/survey_session', [App\Http\Controllers\SurveySessionController::class, 'load']);
Route::get('/survey_template', [App\Http\Controllers\SurveySessionController::class, 'load_template']);

Route::get('/survey_session', [App\Http\Controllers\SurveySessionController::class, 'load']);
Route::get('/survey_template', [App\Http\Controllers\SurveySessionController::class, 'load_template']);
Route::get('/location', [App\Http\Controllers\SurveySessionController::class, 'load_location']);

// auth
Route::get('/rolls', [App\Http\Controllers\RollController::class, 'index'])->name('system_Rolls');
Route::get('/users_list', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/users/id/{id}', [App\Http\Controllers\UserController::class, 'edit']);
//Route::get('/test', function () {
//    return view('auth.testlogin');//});
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout']); # post
Route::post('/users', [App\Http\Controllers\UserController::class, 'create'])->name('system_Rolls');
Route::post('/rolls', [App\Http\Controllers\RollController::class, 'create'])->name('create_system_Rolls');

#put
Route::put('/users/id/{id}', [App\Http\Controllers\UserController::class, 'store']);
Route::put('/users/password/{id}', [App\Http\Controllers\UserController::class, 'storePassword']);

#delete
Route::delete('/users/id/{id}', [App\Http\Controllers\UserController::class, 'delete']);
Route::get('/users/myProfile', [App\Http\Controllers\UserController::class, 'myProfile']);
Route::put('/users/my_password', [App\Http\Controllers\UserController::class, 'changeMyPass']);

Route::middleware(['auth', 'verified'])->get('/auth_test', [App\Http\Controllers\JsonResultsController::class, 'authTest']);

Route::get('/attributes_tbl/id/{id}', [App\Http\Controllers\SurveyStructureController::class, 'view_index']);

#category List
Route::get('/category_list', [App\Http\Controllers\CategoryListController::class, 'index']);
Route::get('/category_element', [App\Http\Controllers\CategoryElementController::class, 'index']);


#graduate registration
Route::middleware(['auth:sanctum', 'verified'])->get('/graduate_registration', function () {
    return view('/registration/graduate_registration');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/registered_graduates', function () {
    return view('/registration/registered_graduates');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/pending_graduates', function () {
    return view('/registration/pending_graduates');
});

#settings
Route::middleware(['auth:sanctum', 'verified'])->get('/sector_service_cat', function () {
    return view('/sector_service_cat');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/university', function () {
    return view('/university');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/vacancy', function () {
    return view('/vacancy');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/vacancy_status', function () {
    return view('/vacancy_status');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/vacancy_profile/id/{id}', [App\Http\Controllers\VacancyController::class, 'profile']);

#reports
Route::middleware(['auth:sanctum', 'verified'])->get('/graduate_report', function () {
    return view('/report/graduate_report');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/graduate_profile/{id}', [App\Http\Controllers\GraduateController::class, 'profile']);

Route::middleware(['auth:sanctum', 'verified'])->get('/graduate_edit/{id}', [App\Http\Controllers\GraduateController::class, 'edit']);

Route::middleware(['auth:sanctum', 'verified'])->get('/graduate_update', function () {
    return view('registration.graduate_update');
});

#sms mng
Route::middleware(['auth:sanctum', 'verified'])->get('/sms_management', function () {
    return view('/sms_management');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/graduate_approval', function () {
    return view('/graduate_approval');
});


#fontend
Route::get('/new_registration', function () {
    return view('/frontend/graduate_registration');
});

// Route::get('/send_vacancy_notification',function (){
//     Notification::send(User::first(), new VacancyNotification());
//     return view('/report/graduate_report');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/sms_report', function () {
    return view('/report/sms_report');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/all_vacancies', function () {
    return view('/all_vacancies_view');
});
