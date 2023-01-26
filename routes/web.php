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
Route::get('/event/overview', [\App\Http\Controllers\MyEventController::class, 'overview']);


require __DIR__.'/auth.php';

//LOGGED IN ROUTES==============================================================================
Route::middleware(['auth', 'verified'])->group(function (){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
//    Route::get('/', \App\Http\Controllers\WelcomeController::class);
    Route::get('events', [\App\Http\Controllers\HolidayController::class, 'index'])->name('events');
    Route::get('/livewiretest', \App\Http\Controllers\LivewireTestController::class)->name('livewiretest');

    Route::post('events/addparticipant', [\App\Http\Controllers\MyEventController::class, 'addparticipant'])->name('addparticipant');
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::get('countries', [App\Http\Controllers\CountryController::class]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//ADMIN ROUTES==============================================================================
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // admin routes come here
    Route::resource('users', \App\Http\Controllers\UserController::class);
});


