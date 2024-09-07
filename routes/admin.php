<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\loginController;
use App\Http\Controllers\Admin\DashboaredController;
use App\Http\Controllers\Admin\Crude_PCR_Controller;
/*
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

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::get('/',[DashboaredController::class,'index'])->name('admin.dashboard');
    Route::get('logout',[loginController::class,'logout'])->name('admin.logout');
    Route::get('logasuser', [LoginController::class, 'logasuser'])->name('admin.logasuser');

    Route::get('showinfo',[DashboaredController::class,'showinfo'])->name('admin.showinfo');
    Route::get('addInfo',[DashboaredController::class,'addInfo'])->name('admin.addInfo');
    Route::post('submitinfo',[DashboaredController::class,'submitinfo'])->name('admin.submitinfo');

    Route::get('showuserinfo/{id}',[DashboaredController::class,'showuserinfo'])->name('admin.showuserinfo');
    Route::get('adduserInfo/{id}',[DashboaredController::class,'adduserInfo'])->name('admin.adduserInfo');
    Route::post('submituserinfo',[DashboaredController::class,'submituserinfo'])->name('admin.submituserinfo');
    Route::get('showalluser',[DashboaredController::class,'showalluser'])->name('admin.showalluser');


    Route::get('showallpost',[DashboaredController::class,'showallpost'])->name('admin.showallpost');
    Route::get('showpost/{id}', [DashboaredController::class,'showsingelpost'])->name('admin.showsingelpost');
    Route::get('show/{id}', [Crude_PCR_Controller::class, 'showeditPCR'])->name('admin.showeditPCR');
    Route::post('edit/{id}', [Crude_PCR_Controller::class, 'editPCR'])->name('admin.editPCR');
    Route::post('delete/{id}/{type}', [Crude_PCR_Controller::class, 'deletePCR'])->name('admin.deletePCR');

    
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', [LoginController::class, 'show_login_view'])->name('admin.showlogin');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
    });
