<?php

use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        Route::get('/', function () {
            return view('dashboard');
        });

        Route::resource('/doctorProfile', DoctorProfileController::class)->parameters([

            'doctor_profiles' => 'doctor_profile:slug',
        ]);


        Route::resource('/messages', MessageController::class);
        Route::resource('/vote', VoteController::class);

        Route::resource('/sponsorship', SponsorshipController::class);

        Route::resource('/reviews', ReviewController::class);

    });

require __DIR__ . '/auth.php';
