<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;

use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, "homeController"])->name('home');
Route::get('/about', [HomeController::class, "aboutController"])->name('about');
Route::get('/teams', [HomeController::class, "teamController"])->name('teams');
Route::get('/gallery', [HomeController::class, "galleryController"])->name('gallery');
Route::get('/blog', [HomeController::class, "blogController"])->name('blog');
Route::get('/contact', [HomeController::class, "contactController"])->name('contact');


Route::get('/login', [AuthController::class, "loginController"])->name("login");
Route::post("/login", [AuthController::class, "user_loginController"]);
Route::get('/register', [AuthController::class, "registerController"])->name("register");
Route::post('/register', [AuthController::class, "userregisterController"]);

Route::get('/verify/{token}', [AuthController::class, "verifyregisterController"]);

Route::get('/forget-password', [AuthController::class, "forgetController"])->name('forget-password');
Route::post('/forget-password', [AuthController::class, "user_forgetController"]);


Route::get('/reset/{token}', [AuthController::class, "user_reset"]);
Route::post('/reset/{token}', [AuthController::class, "user_reset_save"]);

Route::get('/logout', [AuthController::class, "logout"])->name('logout');



Route::group(['middleware' => 'adminuser'], function() {
    Route::get('panel/dashboard', [DashboardController::class, "adminpanel"]);


    // user routes
    Route::get('panel/user/list', [UserContoller::class, 'user'])->name('user-list');
    
        // user add
        Route::get('panel/user/add', [UserContoller::class, 'add_user'])->name('user_add');
        Route::post('panel/user/add', [UserContoller::class, 'add_user_create']);
        
        // user edit
            Route::get('panel/user/edit/{id}', [UserContoller::class, 'edit_user'])->name('edit_user');
            Route::post('panel/user/edit/{id}', [UserContoller::class, 'update_user'])->name('edit_user');
            
        // delete
            Route::get('panel/user/list/delete/{id}', [UserContoller::class, 'delete_user'])->name('delete_user');

    // category routes
        Route::get('panel/category/list', [CategoryController::class, 'category']);
        
        // category add
            Route::get('panel/category/add', [CategoryController::class, 'add_category'])->name('add_category');
            Route::post('panel/category/add', [CategoryController::class, 'add_category_create']);
        
        // // category edit
            Route::get('panel/category/edit/{id}', [CategoryController::class, 'category_edit'])->name('edit_category');
            Route::post('panel/category/edit/{id}', [CategoryController::class, 'update_category']);
            
        // // category delete
            Route::get('panel/category/list/delete/{id}', [CategoryController::class, 'delete_category'])->name('delete_category');

    // blog Routes
    Route::get('panel/blog/list', [BlogController::class, 'blog']);

        // blog add
        Route::get('panel/blog/add', [BlogController::class, 'add_blog'])->name('add_blog');
        Route::post('panel/blog/add', [BlogController::class, 'add_blog_create']);

        // // blog edit
        Route::get('panel/blog/edit/{id}', [BlogController::class, 'post_edit'])->name('edit_post');
        Route::post('panel/blog/edit/{id}', [BlogController::class, 'update_post']);
        
    // // blog delete
        Route::get('panel/blog/delete/{id}', [BlogController::class, 'delete_post'])->name('delete_post');


    // page Routes
    Route::get('panel/page/list', [PageController::class, 'page']);

        // page add
        Route::get('panel/page/add', [PageController::class, 'add_page'])->name('add_page');
        Route::post('panel/page/add', [PageController::class, 'add_page_create']);

        // page edit
        Route::get('panel/page/edit/{id}', [PageController::class, 'page_edit'])->name('edit_page');
        Route::post('panel/page/edit/{id}', [PageController::class, 'update_page']);
        
        // page delete
        // Route::get('panel/page/delete/{id}', [PageController::class, 'delete_page'])->name('delete_page');
});


Route::get('/{slug}', [HomeController::class, "slugBlogController"]);
