<?php

use App\Http\Controllers\api\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [UserApiController::class, 'index']);
Route::post('user/store', [UserApiController::class, 'store']);
Route::get('edit', [UserApiController::class, 'edit']);
Route::post('update', [UserApiController::class, 'update']);
Route::delete('delete', [UserApiController::class, 'destroy']);