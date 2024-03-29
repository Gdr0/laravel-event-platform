<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController;
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



Route::get('/', [EventController::class, 'index']) ->name('events.index');
Route::get('events/create', [EventController::class, 'create']) ->name('events.create');
Route::post('/events',[EventController::class,'store'])->name('events.store');
Route :: delete('/events/{id}', [EventController :: class, 'destroy'])-> name('events.destroy');
Route :: get('/events/{id}/edit', [EventController :: class, 'edit'])-> name('events.edit');
Route :: patch('/events/{id}', [EventController :: class, 'update'])-> name('events.update');
Route :: get('/events/{id}', [EventController :: class, 'show'])-> name('events.show');


// // //  //  //  //  







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// 
// 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', [EventController::class, 'index']) ->name('events.index');
    Route::get('events/create', [EventController::class, 'create']) ->name('events.create');
    Route::post('/events',[EventController::class,'store'])->name('events.store');
    Route :: delete('/events/{id}', [EventController :: class, 'destroy'])-> name('events.destroy');
    Route :: get('/events/{id}/edit', [EventController :: class, 'edit'])-> name('events.edit');
    Route :: patch('/events/{id}', [EventController :: class, 'update'])-> name('events.update');
    Route :: get('/events/{id}', [EventController :: class, 'show'])-> name('events.show');
    Route::resource('events', 'EventController');
});

require __DIR__.'/auth.php';
