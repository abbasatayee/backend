<?php

use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum','role:admin,user')->get('/user', [AuthController::class, 'getUser']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/check', [AuthController::class, 'myApiMethod']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);