<?php

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

use App\Http\Controllers\MainController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;

// Route::get('/', function () {
//     return view('index', ['name' => 'Samantha']);
// });

// Root Route
Route::get('/', [MainController::class, 'index']);

// Member Route
Route::get('/signin', [MemberController::class, 'signin']);
Route::get('/signup', [MemberController::class, 'signup']);
Route::post('/do_signin', [MemberController::class, 'do_signin']);
Route::post('/do_signup', [MemberController::class, 'do_signup']);
Route::get('/signout', [MemberController::class, 'do_signout']);
Route::get('/profile', [MemberController::class, 'profile']);
Route::get('/mybooking', [BookingController::class, 'my_booking']);
Route::get('/mybooking/{id}', [BookingController::class, 'my_booking_detail']);

// Sport Route
Route::get('/sport', [SportController::class, 'index']);
Route::get('/sport/{type}', [SportController::class, 'sport_field']);
Route::get('/sport/{type}/form', [SportController::class, 'sport_form']);
Route::get('/sport/{type}/confirm', [SportController::class, 'sport_confirm']);
Route::post('/sport/store', [SportController::class, 'sport_store']);

// Promotion Route
Route::get('/promotion', [PromotionController::class, 'index']);

// Contact Route
Route::get('/contact', [ContactController::class, 'index']);


////////////////////////////////////////
//////// :::: ADMIN ROUTE :::: ////////
//////////////////////////////////////

Route::get('/admin', [AdminController::class, 'index']);

// ADMIN BOOKING LIST
Route::get('/admin/booking', [BookingController::class, 'view']);
Route::get('/admin/booking/{id}', [BookingController::class, 'detail']);
Route::get('/admin/booking/add', [BookingController::class, 'add']);
Route::get('/admin/booking/{id}/edit', [BookingController::class, 'edit']);
Route::post('/admin/booking/{id}/save', [BookingController::class, 'save']);
Route::post('/admin/booking/{id}/delete', [BookingController::class, 'delete']);

// ADMIN SPORT TYPE LIST
Route::get('/admin/sport', [SportController::class, 'view']);
Route::get('/admin/sport/add', [SportController::class, 'add']);
Route::get('/admin/sport/{id}', [SportController::class, 'detail']);
Route::get('/admin/sport/{id}/edit', [SportController::class, 'edit']);
Route::post('/admin/sport/save', [SportController::class, 'save']);
Route::post('/admin/sport/{id}/delete', [SportController::class, 'delete']);

// ADMIN MEMEBER LIST
Route::get('/admin/member', [MemberController::class, 'view']);
Route::get('/admin/member/{id}', [MemberController::class, 'detail']);
Route::get('/admin/member/add', [MemberController::class, 'add']);
Route::get('/admin/member/{id}/edit', [MemberController::class, 'edit']);
Route::post('/admin/member/{id}/save', [MemberController::class, 'save']);
Route::post('/admin/member/{id}/delete', [MemberController::class, 'delete']);

// ADMIN MEMEBER LIST
Route::get('/admin/user', [AdminController::class, 'view']);
Route::get('/admin/user/{id}', [AdminController::class, 'detail']);
Route::get('/admin/user/add', [AdminController::class, 'add']);
Route::get('/admin/user/{id}/edit', [AdminController::class, 'edit']);
Route::post('/admin/user/{id}/save', [AdminController::class, 'save']);
Route::post('/admin/user/{id}/delete', [AdminController::class, 'delete']);
