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

// Route::get('/', function () {
//     return view('layout');
// });
Route::get('/', [App\Http\Controllers\DefaultController::class, 'home'])->name('home');
Route::get('/questions', [App\Http\Controllers\QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/form', [App\Http\Controllers\QuestionController::class, 'form'])->name('questions.form');
Route::post('/questions', [App\Http\Controllers\QuestionController::class, 'store'])->name('questions.store');
Route::get('/users/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
Route::post('/users/signin', [App\Http\Controllers\UserController::class, 'signin'])->name('signin');
Route::post('/users', [App\Http\Controllers\UserController::class, 'signup'])->name('signup');
Route::get('/users/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/questions/{id}/answers', [App\Http\Controllers\AnswerController::class, 'store'])->name('answers.store');
Route::get('/users/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');





