<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
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
Route::middleware('auth:sanctum','role:admin,user')->get('/app/user', [AuthController::class, 'getUser']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/check', [AuthController::class, 'myApiMethod']);
Route::get('/auth/authenticated-user-data', [AuthController::class, 'authenticatedUserData'])->middleware('auth:api');
Route::middleware('auth:sanctum')->post('/auth/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum','role:admin,user')->apiResource('app/employees', EmployeeController::class);
Route::middleware('auth:sanctum','role:admin,user')->delete('app/delete', [EmployeeController::class,'multilpledelete']);