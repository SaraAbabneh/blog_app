<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\loginController;
use App\Http\Controllers\User\UserDashboaredController;
use App\Http\Controllers\User\UserCrude_PCR_Controller;
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

Route::group(['prefix' => 'user', 'middleware' => 'auth:user'], function () {

    Route::get('/',[UserDashboaredController::class,'index'])->name('front.dashboard');
    Route::get('logout',[loginController::class,'logout'])->name('front.logout');
    Route::get('showinfo',[UserDashboaredController::class,'showinfo'])->name('front.showinfo');
    Route::get('addInfo',[UserDashboaredController::class,'addInfo'])->name('front.addInfo');
    Route::post('submitinfo',[UserDashboaredController::class,'submitinfo'])->name('front.submitinfo');

    Route::get('showuserinfo/{id}',[UserDashboaredController::class,'showuserinfo'])->name('front.showuserinfo');
    Route::get('adduserInfo/{id}',[UserDashboaredController::class,'adduserInfo'])->name('front.adduserInfo');
    Route::post('submituserinfo',[UserDashboaredController::class,'submituserinfo'])->name('front.submituserinfo');
    Route::get('showalluser',[UserDashboaredController::class,'showalluser'])->name('front.showalluser');


    Route::get('showamypost',[UserDashboaredController::class,'showmypost'])->name('front.showamypost');
    Route::get('showamycomment',[UserDashboaredController::class,'showamycomment'])->name('front.showamycomment');
    Route::get('showpost/{id}', [UserDashboaredController::class,'showsingelpost'])->name('front.showsingelpost');
    Route::get('show/{id}/{type}', [UserCrude_PCR_Controller::class, 'showeditPCR'])->name('front.showeditPCR');
    Route::post('edit/{id}/{type}', [UserCrude_PCR_Controller::class, 'editPCR'])->name('front.editPCR');
    Route::post('delete/{id}/{type}', [UserCrude_PCR_Controller::class, 'deletePCR'])->name('front.deletePCR');
    Route::get('showedaddform', [UserCrude_PCR_Controller::class, 'showedaddform'])->name('front.showedaddform');
    Route::post('createPCR/{id}/{type}', [UserCrude_PCR_Controller::class, 'createPCR'])->name('front.createPCR');
    Route::post('createPost', [UserCrude_PCR_Controller::class, 'createPost'])->name('front.createPost');

    
});

Route::group(['namespace' => 'User', 'prefix' => 'user', 'middleware' => 'guest:user'], function () {
    Route::get('login', [LoginController::class, 'show_login_view'])->name('front.showlogin');
    Route::post('login', [LoginController::class, 'login'])->name('front.login');
    Route::get('signup', [LoginController::class, 'show_singup_view'])->name('front.showsignup');
    Route::post('signup', [LoginController::class, 'signup'])->name('front.signup');
    });
