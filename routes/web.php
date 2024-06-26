<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\FarighController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\DB;

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
    return view('welcome');
})->name('NewsAnalyzer');

Route::get('/support', [FarighController::class, 'index'])->name('supportus');
Route::post('/Subscribe', [MailController::class, 'subuser'])->name('SubscribeUs');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');


    Route::post('update-profile-info',[AdminController::class,'updateInfoAdmin'])->name('UpdateInfoAdmin');
    Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
   
    Route::get('results', [AdminController::class, 'results'])->name('admin.results');
    Route::get('manage_results', [AdminController::class, 'manageResults'])->name('admin.manageResults');
    Route::get('deleteAll_results', [AdminController::class, 'deleteAll'])->name('admin.deleteAllResults');
    Route::get('deleteAll_results/{id}', [AdminController::class, 'deleteSelective'])->name('admin.deleteSelectedResults');
    Route::get('delete_result/{id}', [AdminController::class, 'deleteResultEnglish'])->name('admin.deleteResultEng');
    Route::get('delete_result/{id}', [AdminController::class, 'deleteResultUrdu'])->name('admin.deleteResultUr');
    Route::get('charts', [AdminController::class, 'adminCharts'])->name('admin.charts');

    Route::get('Manage', [AdminController::class, 'manage'])->name('admin.manageUsers');
    Route::get('User/edit/{id}', [AdminController::class, 'edit'])->name('admin.editUser');
    Route::post('User/update/{id}', [AdminController::class, 'update'])->name('admin.updateUser');
    Route::get('User/delete/{id}', [AdminController::class, 'delete'])->name('admin.deleteUser');

    Route::get('sending-mails/to-subcribed-users', [AdminController::class, 'mailer'])->name('admin.AutoMailer');
    
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
Route::get('newsdashboard',[UserController::class,'news'])->name('user.news');
Route::get('profile',[UserController::class,'profile'])->name('user.profile');
Route::get('settings',[UserController::class,'settings'])->name('user.settings');
Route::get('results', [UserController::class, 'results'])->name('user.results');
Route::get('charts', [ChartController::class, 'index'])->name('user.charts');
Route::post('update-profile-info',[UserController::class,'updateInfoUser'])->name('userUpdateInfo');
Route::post('change-profile-picture',[UserController::class,'updatePicture'])->name('userPictureUpdate');
Route::post('change-password',[UserController::class,'changePassword'])->name('userChangePassword');
});



