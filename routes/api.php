<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\V1\LoginController;


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

Route::post('/pokemon', [HomeController::class, 'show'])->middleware('auth:sanctum');
Route::post('/showpokedex/{id?}', [HomeController::class, 'showPokedex'])->middleware('auth:sanctum');

Route::post('/login', [LoginController::class,'login'])->name('login');
Route::get('/getuser',[LoginController::class,'me'])->name('me');
