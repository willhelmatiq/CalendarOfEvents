<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//PUBLIC ROUTES==============================================================================
Route::get('/', \App\Http\Controllers\WelcomeController::class);
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::resource('categories', \App\Http\Controllers\CategoryController::class);
Route::resource('events', \App\Http\Controllers\MyEventController::class);

require __DIR__.'/auth.php';

//LOGGED IN ROUTES==============================================================================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//ADMINROUTES==============================================================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


