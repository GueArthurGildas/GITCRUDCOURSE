<?php

use App\Http\Controllers\API\loginColtroller;
use App\Http\Controllers\API\registerController;
use App\Http\Controllers\API\TaskController;
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


Route::prefix("v1")->as("v1")->middleware('auth:sanctum')->group(function () {
    Route::apiResource('tasks',TaskController::class);
});

Route::Post('register',registerController::class);
Route::get('login',loginColtroller::class);