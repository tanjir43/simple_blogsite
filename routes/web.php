<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\front\IndexController;
use App\Models\Social;
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


Route::get('/',[IndexController::class,'index'])->name('index');

Route::prefix('/admin')->group(function(){
    Route::get('/login',[\App\Http\Controllers\Admin\AdminLoginController::class,'adminLogin'])->name('admin.login');
    Route::post('/login',[AdminLoginController::class,'loginAdmin'])->name('login.admin');
   
    Route::group(['middleware'=>'admin'],function(){
   
        Route::get('/dashboard',[AdminLoginController::class,'adminDashboard'])->name('admin.dashboard');

        Route::get('/profile',[AdminProfileController::class,'adminProfile'])->name('admin.profile');
   
        Route::post('/profile/update/{id}',[AdminProfileController::class,'adminProfileUpdate'])->name('admin.profile.update');
        
        Route::get('/profile/delete-image/{id}',[AdminProfileController::class,'deleteImage'])->name('delete.image');
    
        Route::get('/profile/change-password',[AdminProfileController::class,'changePassword'])->name('change.password');
        
        Route::post('/check-password',[AdminProfileController::class,'checkUserPassword'])->name('check.user.password');
    
        Route::get('/theme',[ThemeController::class,'theme'])->name('theme');

        Route::post('/theme/{id}',[ThemeController::class,'themeUpdate'])->name('theme.update');

        Route::get('/setting',[SettingController::class,'setting'])->name('setting');

        Route::post('/setting/{id}',[SettingController::class,'settingUpdate'])->name('setting.update');
        
        Route::get('/social',[SocialController::class,'social'])->name('social');

        Route::post('/social/{id}',[SocialController::class,'socialUpdate'])->name('social.update');
    
    }); 
    
    Route::get('/logout',[AdminLoginController::class,'adminLogout'])->name('admin.logout');

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
