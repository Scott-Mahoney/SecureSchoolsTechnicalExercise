<?php

use App\Http\Controllers\Classes\ClassController;
use App\Http\Controllers\Employees\EmployeesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//We'd normally apply an auth guard to ensure the user is logged in and authenticated here
//I'll skip this step for the purpose of this technical test
// Route::middleware('auth:api')->group(function () {
//     ... routes here
// });
Route::get('/schools/{id}/employees', EmployeesController::class);
Route::get('/schools/{id}/classes/{class_id}', ClassController::class);