<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\CommentDashboardController;
use App\Http\Controllers\BlogPostDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now crWeate something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });
// Route::get('/detail', function () {
//     return view('frontend.detail');
// });



// Auth Route
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'dologin'])->name('login.dologin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Frontend Route
Route::get('/', [BlogsController::class, 'index'])->name('index');
Route::get('/blog/{blog:slug}', [BlogsController::class, 'show'])->name('blog.show');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');


// Backend Route
// Admin 
Route::group(['middleware' => ['auth', 'CekLevel:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/dashboard/blogpost', BlogPostDashboardController::class);
    Route::resource('/dashboard/commnetmanagemnet', CommentDashboardController::class);
    Route::resource('/dashboard/user', UserDashboardController::class);
    Route::resource('/dashboard/changepassword', PasswordController::class);
    
});




