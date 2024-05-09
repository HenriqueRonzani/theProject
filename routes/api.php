<?php

use App\Http\Controllers\AppController;
use App\Http\Middleware\CorsMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('/getData', [AppController::class, 'getData']);

Route::post('/saveData', [AppController::class, 'saveData']);

Route::post('/editData', [AppController::class, 'editData']);

Route::middleware('auth:sanctum')->get('api/login', [AppController::class, 'login']);
