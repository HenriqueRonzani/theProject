<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])
->name('dashboard')
->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard')
->middleware(['auth', 'verified']);

Route::resource('datas', DataController::class)
->only(['index', 'store'])
->middleware(['auth', 'verified']);

Route::patch('datas/update', [Datacontroller::class, 'update'])
->name('datas.update')
->middleware(['auth', 'verified']);

Route::delete('datas/delete', [DataController::class, 'destroy'])
->name('datas.destroy')
->middleware(['auth', 'verified']);

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
require __DIR__.'/auth.php';
