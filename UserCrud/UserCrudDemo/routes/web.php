<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\api\UserApiController;

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

Route::get('/', [UserController::class, 'index']);
Route::get('register', [UserController::class, 'create']);
Route::post('register', [UserController::class, 'store']);
Route::get('delete/{id}', [UserController::class, 'delete']);

Route::get('edit/{id}', [UserController::class, 'edit']);
Route::post('update', [UserController::class, 'update']);



//apis
// Route::get('index', [UserApiController::class, 'index']);
// Route::post('store', [UserApiController::class, 'store']);
// Route::get('edit', [UserApiController::class, 'edit']);
// Route::post('update', [UserApiController::class, 'update']);
// Route::delete('delete', [UserApiController::class, 'destroy']);




 Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

