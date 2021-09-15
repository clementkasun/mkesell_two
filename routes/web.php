<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Graduate;
use App\Models\Notifications;
use App\Models\Vacancy;
use App\Notifications\VacancyNotification;
use App\Http\Controllers\PostController;
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

Route::get('/login_cust', function () {
    return view('auth.login');
});

Route::get('/register_customer', function () {
    return view('auth.CustomerRegister');
});

//Route::get('/', function () {
//    return view('home');
//})->name('home');

Route::get('/', [PostController::class, 'index']);
Route::get('/dashboard', [PostController::class, 'index']);
Route::get('home', function(){
  return view('home');  
});

Route::get('/post_profile', function () {
    return view('post_profile');
});

//// auth
//Route::get('/rolls', [App\Http\Controllers\RollController::class, 'index'])->name('system_Rolls');
//Route::get('/users_list', [App\Http\Controllers\UserController::class, 'index']);
//Route::get('/users/id/{id}', [App\Http\Controllers\UserController::class, 'edit']);
////Route::get('/test', function () {
////    return view('auth.testlogin');//});
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout']); # post
//Route::post('/users', [App\Http\Controllers\UserController::class, 'create'])->name('system_Rolls');
//Route::post('/rolls', [App\Http\Controllers\RollController::class, 'create'])->name('create_system_Rolls');
//
//#put
//Route::put('/users/id/{id}', [App\Http\Controllers\UserController::class, 'store']);
//Route::put('/users/password/{id}', [App\Http\Controllers\UserController::class, 'storePassword']);
//
//#delete
//Route::delete('/users/id/{id}', [App\Http\Controllers\UserController::class, 'delete']);
//Route::get('/users/myProfile', [App\Http\Controllers\UserController::class, 'myProfile']);
//Route::put('/users/my_password', [App\Http\Controllers\UserController::class, 'changeMyPass']);
//
//Route::middleware(['auth', 'verified'])->get('/auth_test', [App\Http\Controllers\JsonResultsController::class, 'authTest']);
//
//Route::get('/attributes_tbl/id/{id}', [App\Http\Controllers\SurveyStructureController::class, 'view_index']);
//
//#category List
//Route::get('/category_list', [App\Http\Controllers\CategoryListController::class, 'index']);
//Route::get('/category_element', [App\Http\Controllers\CategoryElementController::class, 'index']);


#graduate registration
Route::middleware(['auth:sanctum', 'verified'])->get('/post_registration', function () {
    return view('/registration/post_registration');
});