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
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('index', ['name' => 'Samantha']);
// });


Route::get('/', [MainController::class, 'Main']);

Route::get('/signin', [MemberController::class, 'SignIn']);
Route::get('/signup', [MemberController::class, 'SignUp']);
Route::post('/do_signin', [MemberController::class, 'doSignIn']);
Route::post('/do_signup', [MemberController::class, 'doSignUp']);
Route::get('/signout', [MemberController::class, 'doSingOut']);
Route::get('/profile', [MemberController::class, 'Profile']);
Route::get('/history', [MemberController::class, 'History']);

Route::get('/services', [ServiceController::class, 'Main']);
Route::get('/services/{type}', [ServiceController::class, 'ServiceForm']);

Route::get('/payment', [PaymentController::class, 'Main']);

Route::get('/policies', [PolicyController::class, 'Main']);

Route::get('/contact', [ContactController::class, 'Main']);

Route::get('/admin', [AdminController::class, 'Main']);
