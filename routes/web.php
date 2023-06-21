<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ReportingController;
use App\Models\Quiz;
use Illuminate\Support\Facades\Request;
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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth.redirect');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/register', [AuthController::class, 'register_form'])->name('register.form');
Route::get('/login', [AuthController::class, 'login_form'])->name('login.form');
Route::get('/update', [AuthController::class, 'update_form'])->name('update.form');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::put('/update', [AuthController::class, 'update'])->name('update');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/quizzes/search', [QuizController::class, 'search'])->name('quizzes.search');
Route::get('/quizzes/get', [QuizController::class, 'get'])->name('quizzes.get');

Route::resource('quizzes', QuizController::class);
Route::resource('reportings', ReportingController::class);








