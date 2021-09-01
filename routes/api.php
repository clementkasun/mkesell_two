<?php

use App\Http\Controllers\GraduateController;
use App\Models\User;
use App\Models\Roll;
use Illuminate\Http\Request;
use App\Models\Graduate;
use App\Models\Notifications;
use App\Models\Vacancy;
use App\Notifications\VacancyNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RollController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\TestJsonController;
use App\Http\Controllers\JsonResultsController;
use App\Http\Controllers\JsonResultsController\DistrictController;
use App\Http\Controllers\JsonResultsController\DsDivisionController;
use App\Http\Controllers\JsonResultsController\ServiceCategoryController;
use App\Http\Controllers\JsonResultsController\ElectorateDivisionController;
use App\Http\Controllers\JsonResultsController\PendingGraduateController;
use App\Http\Controllers\JsonResultsController\VacancyController;
use App\Http\Controllers\JsonResultsController\VacancyAttachmentController;
use Maatwebsite\Excel\Validators\ValidationException;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

// Route::get('/survey_object', [ResultController::class, 'getSurveyObject']);
Route::apiResource('/json', TestJsonController::class); // get payment history by id
Route::apiResource('/result/json', JsonResultsController::class); // save json results
Route::get('/result/export/{id}', [JsonResultsController::class, 'export']); // save json results

//api
Route::post('/rolls/rollId/{id}', [RollController::class, 'store']);
Route::delete('/rolls/rollId/{id}', [RollController::class, 'destroy']);
Route::get('/rolls/levelId/{id}', [LevelController::class, 'rollsByLevel'])->name('rolls_by_level');
Route::get('/rolls/rollPrivilege/{id}', [RollController::class, 'getRollPrevilagesById'])->name('Previlages_by_rollId');
Route::get('/user/Privileges/{id}', [UserController::class, 'previlagesById']);
Route::get('/rolls/privilege/add', [RollController::class, 'PrevilagesAdd'])->name('Previlages_add');
Route::get('/user/privilege/add/{id}', [UserController::class, 'PrevilagesAddById']);
Route::get('/user/activity/{id}', [UserController::class, 'activeStatus']);
Route::get('/user/deleted', [UserController::class, 'getDeletedUser']);
Route::put('/user/active/{id}', [UserController::class, 'activeDeletedUser']); //restore deleted users
Route::get('/user/mobile/', [UserController::class, 'getMobileUsers']); //get (Level 2) mobile users
Route::middleware('auth:api')->get('/level/institutes/id/{id}', [LevelController::class, 'instituteById'])->name('level_institues_by_id');
Route::post('/add_user', [UserController::class, 'create']); //add a user

Route::post('/auth_test', [App\Http\Controllers\JsonResultsController::class, 'authTest']);
Route::post('/sanctum/token', [UserController::class, 'authToken']);
Route::get('/extras/{id}', [App\Http\Controllers\MobileController::class, 'sendGnDivisionWithMapping']); //get all GN divisions mapped with other division

/// hansana
Route::get('/transform', [TestJsonController::class, 'TrnsformSurvey']);
Route::get('/transform/titles', [TestJsonController::class, 'getTitles']);
Route::get('/transform/survey/{id}', [TestJsonController::class, 'getASurvey']);

//Api's for the district table 
Route::get('/get_districts', [App\Http\Controllers\DistrictController::class, 'show']); //get the district record from the table

//Api's for the ds division
Route::get('/get_gn_divisions/{ds_division}', [App\Http\Controllers\GnDivisionController::class, 'show']); //get the gn division record from the table

//Api's for the ds division
Route::get('/get_ds_divisions/{district_id}', [App\Http\Controllers\DsDivisionController::class, 'show']); //get the ds division record from the table

//Api's for the Graduate table
Route::post('/save_graduate', [App\Http\Controllers\GraduateController::class, 'store']); //add graduate record to the table
Route::get('/get_graduates', [App\Http\Controllers\GraduateController::class, 'show']); //add graduate record to the table
Route::get('/get_graduate/{id}', [App\Http\Controllers\GraduateController::class, 'get_graduate']); //add graduate record to the table
Route::post('/update_graduate/{id}', [App\Http\Controllers\GraduateController::class, 'update']); //update graduate record to the the table
Route::delete('/delete_graduate/{id}', [App\Http\Controllers\GraduateController::class, 'destroy']); //delete graduate record from the graduate table
Route::get('/get_graduate_tel/id/{id}/from/{from}', [App\Http\Controllers\GraduateController::class, 'get_graduate_tel']);

//Api's for the sector table
Route::post('/save_sector', [App\Http\Controllers\SectorController::class, 'store']); //add sector record to the table
Route::get('/get_sectors', [App\Http\Controllers\SectorController::class, 'show']); //add sector record to the table
Route::get('/get_sector/{id}', [App\Http\Controllers\SectorController::class, 'get_sector']); //add sector record to the table
Route::put('/update_sector/{id}', [App\Http\Controllers\SectorController::class, 'update']); //update sector record to the the table
Route::delete('/delete_sector/{id}', [App\Http\Controllers\SectorController::class, 'destroy']); //delete sector record from the sector table

//Api's for the service catagory table
Route::post('/save_service_catagory', [App\Http\Controllers\ServiceCategoryController::class, 'store']); //add service catagory record to the table
Route::get('/get_service_catagories', [App\Http\Controllers\ServiceCategoryController::class, 'show']); //add service catagory record to the table
Route::get('/get_service_catagory/{sector_id}', [App\Http\Controllers\ServiceCategoryController::class, 'get_service_catagory']); //add service catagory record to the table
Route::put('/update_service_catagory/{id}', [App\Http\Controllers\ServiceCategoryController::class, 'update']); //update service catagory record to the the table
Route::delete('/delete_service_catagory/{id}', [App\Http\Controllers\ServiceCategoryController::class, 'destroy']); //delete service catagory record from the service catagory table
Route::get('/get_service_category_by_id/{service_cat_id}', [App\Http\Controllers\ServiceCategoryController::class, 'edit']);

//Api's for the university table
Route::post('/save_university', [App\Http\Controllers\UniversityController::class, 'store']); //add university record to the table
Route::get('/get_universities', [App\Http\Controllers\UniversityController::class, 'show']); //add university record to the table
Route::get('/get_university/{id}', [App\Http\Controllers\UniversityController::class, 'get_university']); //add university record to the table
Route::put('/update_university/{id}', [App\Http\Controllers\UniversityController::class, 'update']); //update university record to the the table
Route::delete('/delete_university/{id}', [App\Http\Controllers\UniversityController::class, 'destroy']); //delete university record from the university table

//APi's for the electorate table
Route::get('/get_electorate_division/{district_id}', [App\Http\Controllers\ElectorateDivisionController::class, 'show']);

//Api's for pending graduates table
Route::get('/pending_graduates', [App\Http\Controllers\GraduateController::class, 'get_pending_graduates']);
Route::get('/approved_graduates', [App\Http\Controllers\GraduateController::class, 'get_approved_graduates']);
Route::put('/approve_graduate/{id}', [App\Http\Controllers\GraduateController::class, 'approve_graduate']);
Route::post('/search_graduate_by_critiria', [App\Http\Controllers\GraduateController::class, 'search_graduate_by_critiria']);
Route::post('/search_grad_with_filtered', [App\Http\Controllers\GraduateController::class, 'search_grad_with_filtered']);
Route::get('/get_degrees', [App\Http\Controllers\GraduateController::class, 'get_degree']);

//Api's for the vacancies
Route::post('/save_vacancy', [App\Http\Controllers\VacancyController::class, 'store']);
/* 
  'companey_name' 'address'  'tel_no' 'fax' 'email' 
  'contact_person' 'description' 'catagory_id' 'vacancy_type'
  'starting_date' 'closing_date' 'created_at'
*/

Route::get('/get_vacancies', [App\Http\Controllers\VacancyController::class, 'show']);
Route::get('/get_vacancy/{id}', [App\Http\Controllers\VacancyController::class, 'get_vacancy']);
Route::post('/update_vacancy/{id}', [App\Http\Controllers\VacancyController::class, 'update']);
Route::delete('/delete_vacancy/{id}', [App\Http\Controllers\VacancyController::class, 'destroy']);

//Api's for the notify graduates
Route::post('/notify_manually', [App\Http\Controllers\NotificationController::class, 'notify_manually']);
Route::post('/notify_single', [App\Http\Controllers\NotificationController::class, 'notify_single']);

//Api for add images to the vacancy table
Route::put('/upload_images', [App\Http\Controllers\VacancyController::class, 'upload_images']);

//Api for change status of vacancy record
Route::put('/update_vacancy_status/{vacancy_id}', [App\Http\Controllers\VacancyController::class, 'update_vacancy_status']);

//Api's for return count of the table to load dashboard counts
Route::get('/all_count_load', [App\Http\Controllers\DashboardController::class, 'allCount']);

//Api's for otp verify
Route::post('/make_send_otp', [App\Http\Controllers\GraduateController::class, 'make_send_otp']);
Route::get('/auth_otp/{send_id}/{otp}', [App\Http\Controllers\GraduateController::class, 'auth_otp']);

//Api's for online graduate registration 
Route::post('/save_online_graduate', [App\Http\Controllers\GraduateController::class, 'online_registration']);
Route::put('/update_online_graduate/{graduate_id}', [App\Http\Controllers\GraduateController::class, 'online_reg_update']);
Route::post('/send_user_login_details/{id}', [App\Http\Controllers\GraduateController::class, 'send_username_pass']);

//Api for change contact number
Route::put('/change_graduate_tel/{graduate_id}', [App\Http\Controllers\GraduateController::class, 'change_graduate_tel']);
Route::get('/get_sms_report', [NotificationController::class, 'get_sms_report']);
Route::post('/delete_file', [App\Http\Controllers\GraduateController::class, 'delete_file']);
Route::get('/cheack_email', [App\Http\Controllers\GraduateController::class, 'check_dup_email']);
Route::get('/get_user_vacancies/{user_id}', [App\Http\Controllers\VacancyController::class, 'vacancies_for_user']);
Route::get('/get_graduate_new/{graduate_id}', [App\Http\Controllers\GraduateController::class, 'get_graduate_new']);
Route::get('/cheack_nic', [App\Http\Controllers\GraduateController::class, 'check_dup_nic']);
Route::get('get_degrees', [App\Http\Controllers\GraduateController::class, 'get_all_degrees']);