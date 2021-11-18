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
Route::post('/save_post', [App\Http\Controllers\PostController,  'store']);
Route::get('/get_all_post', [App\Http\Controllers\PostController,  'show']);