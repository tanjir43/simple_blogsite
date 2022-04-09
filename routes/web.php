<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Front\FrontendController;
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

Route::get('about-us',[FrontendController::class,'about'])->name('about');

Route::get('/testimonial',[FrontendController::class,'testimonial'])->name('testimonial');

Route::get('/blog',[FrontendController::class,'blog'])->name('blog');

Route::get('/blog-details/{slug}', [FrontendController::class, 'blogDetails'])->name('blog.details');

Route::get('/category/{slug}',[FrontendController::class,'categoryBlog'])->name('category.blog');

Route::get('/pricings', [FrontendController::class,'pricings'])->name('pricings');

Route::get('/all-project',[FrontendController::class,'projects'])->name('proj');

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
    
        //Bnaner section

        Route::get('/banners',[BannerController::class,'index'])->name('banner.index');
        Route::get('/banner/add',[BannerController::class,'bannerAdd'])->name('banner.add');
        Route::post('/banner/store',[BannerController::class,'store'])->name('banner.store');
        Route::get('/banner/edit/{id}',[BannerController::class,'edit'])->name('banner.edit');
        Route::post('/banner/update/{id}',[BannerController::class,'update'])->name('banner.update');
        Route::post('/delete-banner/{id}',[BannerController::class,'delete'])->name('banner.delete');
 
        //About section
 
        Route::get('/about',[PagesController::class,'index'])->name('about.index');
        Route::get('/about/add',[PagesController::class,'aboutAdd'])->name('about.add');
        Route::post('/about/store',[PagesController::class,'store'])->name('about.store');
        Route::get('/about/edit/{id}',[PagesController::class,'edit'])->name('about.edit');
        Route::post('/about/update/{id}',[PagesController::class,'update'])->name('about.update');
        Route::post('/delete-about/{id}',[PagesController::class,'delete'])->name('about.delete');

        // Designation route 

        Route::get('/designation',[DesignationController::class,'index'])->name('designation.index');
        Route::post('/designation/store',[DesignationController::class,'store'])->name('designation.store');
        Route::get('/designation/edit/{id}',[DesignationController::class,'edit'])->name('designation.edit');
        Route::post('/designation/update/{id}',[DesignationController::class,'update'])->name('designation.update');
        Route::post('/delete-designation/{id}',[DesignationController::class,'delete'])->name('designation.delete');
    
        // Team section

        Route::get('/team',[TeamController::class,'index'])->name('team.index');
        Route::get('/team/add',[TeamController::class,'teamAdd'])->name('team.add');
        Route::post('/team/store',[TeamController::class,'store'])->name('team.store');
        Route::get('/team/edit/{id}',[TeamController::class,'edit'])->name('team.edit');
        Route::post('/team/update/{id}',[TeamController::class,'update'])->name('team.update');
        Route::post('/delete-team/{id}',[TeamController::class,'delete'])->name('team.delete');

        //Testimonial section

        Route::get('/testimonial',[TestimonialController::class,'index'])->name('testimonial.index');
        Route::get('/testimonial/add',[TestimonialController::class,'testimonialAdd'])->name('testimonial.add');
        Route::post('/testimonial/store',[TestimonialController::class,'store'])->name('testimonial.store');
        Route::get('/testimonial/edit/{id}',[TestimonialController::class,'edit'])->name('testimonial.edit');
        Route::post('/testimonial/update/{id}',[TestimonialController::class,'update'])->name('testimonial.update');
        Route::post('/delete-testimonial/{id}',[TestimonialController::class,'delete'])->name('testimonial.delete');
 
        //Category section

        Route::get('/categories',[CategoryController::class,'index'])->name('category.index');
        Route::get('/category/add',[CategoryController::class,'categoryAdd'])->name('category.add');
        Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
        Route::post('/delete-category/{id}',[CategoryController::class,'delete'])->name('category.delete');
        
        //Tag Controller
        
        Route::get('/tags',[TagController::class,'index'])->name('tag.index');
        Route::get('/tag/add',[TagController::class,'tagAdd'])->name('tag.add');
        Route::post('/tag/store',[TagController::class,'store'])->name('tag.store');
        Route::get('/tag/edit/{id}',[TagController::class,'edit'])->name('tag.edit');
        Route::post('/tag/update/{id}',[TagController::class,'update'])->name('tag.update');
        Route::post('/delete-tag/{id}',[TagController::class,'delete'])->name('tag.delete');
        
        //Blog section

        Route::get('/blogs',[BlogController::class,'index'])->name('blog.index');
        Route::get('/blog/add',[BlogController::class,'blogAdd'])->name('blog.add');
        Route::post('/blog/store',[BlogController::class,'store'])->name('blog.store');
        Route::get('/blog/edit/{id}',[BlogController::class,'edit'])->name('blog.edit');
        Route::post('/blog/update/{id}',[BlogController::class,'update'])->name('blog.update');
        Route::post('/delete-blog/{id}',[BlogController::class,'delete'])->name('blog.delete');

        //Pricings section

        Route::get('/pricings',[PricingController::class,'index'])->name('pricing.index');
        Route::get('/pricing/add',[PricingController::class,'pricingAdd'])->name('pricing.add');
        Route::post('/pricing/store',[PricingController::class,'store'])->name('pricing.store');
        Route::get('/pricing/edit/{id}',[PricingController::class,'edit'])->name('pricing.edit');
        Route::post('/pricing/update/{id}',[PricingController::class,'update'])->name('pricing.update');
        Route::post('/delete-pricing/{id}',[PricingController::class,'delete'])->name('pricing.delete');

        //Project section

        Route::get('/projects',[ProjectController::class,'index'])->name('project.index');
        Route::get('/project/add',[ProjectController::class,'projectAdd'])->name('project.add');
        Route::post('/project/store',[ProjectController::class,'store'])->name('project.store');
        Route::get('/project/edit/{id}',[ProjectController::class,'edit'])->name('project.edit');
        Route::post('/project/update/{id}',[ProjectController::class,'update'])->name('project.update');
        Route::post('/delete-project/{id}',[ProjectController::class,'delete'])->name('project.delete');

    
    }); 
    
    Route::get('/logout',[AdminLoginController::class,'adminLogout'])->name('admin.logout');

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
