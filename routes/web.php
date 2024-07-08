<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', [HomeController::class,'index'])->name('home');
// Route::get('login',[AuthController::class,'login'])->name('login');
// Route::get('register',[AuthController::class,'register'])->name('register');
// Route::post('register', [AuthController::class,'createUser'])->name('register.createuser');
// Route::post('login', [AuthController::class,'checkLogin'])->name('login.checklogin');

// Route::get('logout',[AuthController::class,'logout'])->name('logout');

// Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard')->middleware('admin');



Route::get('/', [HomeController::class,'index'])->name('home');

// showing Blog page
Route::get('blogs', [HomeController::class,'blogs'])->name('blogs');
Route::get('blogs/details/{id}', [HomeController::class,'blogsDetails'])->name('blogs.details');

// Authentication 
Route::get('login', [AuthController::class,'login'])->name('login');
Route::get('register', [AuthController::class,'register'])->name('register');
Route::post('register', [AuthController::class,'createUser'])->name('register.createuser');
Route::post('login', [AuthController::class,'checkLogin'])->name('login.checklogin');
Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {

    // UserController Routes 
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('dashboard/users',[UserController::class,'user'])->name('dashboard.users');
    Route::get('dashboard/users/add',[UserController::class,'showForm'])->name('showform.users');
    Route::post('dashboard/users/add',[UserController::class,'add'])->name('add.users');
    Route::get('dashboard/users/edit/{id}',[UserController::class,'showEdit'])->name('showEdit.users');
    Route::put('dashboard/users/edit/{id}',[UserController::class,'edit'])->name('edit.users');
    Route::delete('dashboard/users/delete/{id}',[UserController::class,'destory'])->name('destory.users');

    // BlogController Routes 
    Route::get('dashboard/blogs',[BlogController::class,'blogs'])->name('dashboard.blogs');
    Route::get('dashboard/blogs/add',[BlogController::class,'showForm'])->name('showform.blogs');
    Route::post('dashboard/blogs/add',[BlogController::class,'add'])->name('add.blogs');
    Route::get('dashboard/blogs/edit/{id}',[BlogController::class,'showEdit'])->name('showEdit.blogs');
    Route::put('dashboard/blogs/edit/{id}',[BlogController::class,'edit'])->name('edit.blogs');
    Route::delete('dashboard/blogs/delete/{id}',[BlogController::class,'destory'])->name('destory.blogs');




    
});
