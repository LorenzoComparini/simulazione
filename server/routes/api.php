<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\LanguageController;
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

Route::get('/jobs', [JobController::class, 'list']);
Route::get('/languages', [LanguageController::class, 'list']);
Route::get('/jobs/{id}', [JobController::class, 'detail']);
Route::post('/jobs', [JobController::class, 'create']);
Route::post('/jobs/edit/{id}', [JobController::class, 'edit']);
Route::delete('/jobs/{id}', [JobController::class, 'delete']);
