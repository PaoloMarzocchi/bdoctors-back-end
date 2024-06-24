<?php

use App\Models\DoctorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DoctorProfileController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\VoteController;
use App\Http\Controllers\Api\ReviewController;

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

Route::get('doctors', [DoctorProfileController::class, 'index']);
Route::get('doctors/{doctor}', [DoctorProfileController::class, 'show']);

Route::get('research/{specialization}', [DoctorProfileController::class, 'specializationSearch']);

Route::get('advanced-research/{specialization}/{vote}/{review}', [DoctorProfileController::class, 'advancedSearch']);

Route::get('sponsoredDoctors', [DoctorProfileController::class, 'sponsored']);

Route::post('contacts', [MessageController::class, 'store']);
Route::post('votes', [VoteController::class, 'store']);
Route::post('sendReview', [ReviewController::class, 'store']);
