<?php

use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ReviewController;

use App\Http\Controllers\StatisticController;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Models\DoctorProfile;
use App\Models\Message;
use App\Models\Review;
use App\Models\Sponsorship;
use App\Models\Vote;

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

    $doctorProfile = DoctorProfile::find(Auth::id());
    $messages = Message::where('doctor_profile_id', '=', Auth::id())->orderBy('created_at', 'desc')->take(3)->get();
    $reviews = Review::where('doctor_profile_id', '=', Auth::id())->orderBy('created_at', 'desc')->take(3)->get();
    $votes = $doctorProfile->votes;
    $average = 0;
    $numberVotes = 0;

    if (count($votes) > 0) {
        $sum = 0;

        $numberVotes = count($votes);
        foreach ($votes as $vote) {
            $sum += $vote->vote;
        }

        $average = $sum / $numberVotes;
    }


    return view('dashboard', compact('doctorProfile', 'messages', 'reviews', 'votes', 'average', 'numberVotes'));
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

        /*         Route::get('/', function () {
            return view('dashboard');
        }); */

        Route::resource('/doctorProfile', DoctorProfileController::class)->parameters([

            'doctor_profiles' => 'doctor_profile:slug',
        ]);


        Route::resource('/messages', MessageController::class);
        Route::resource('/vote', VoteController::class);

        Route::resource('/sponsorship', SponsorshipController::class);

        Route::resource('/reviews', ReviewController::class);

        Route::resource('/statistics', StatisticController::class);
    });

require __DIR__ . '/auth.php';


Route::any('/payment/{sponsorship}', [PaymentController::class, 'token'])->name('token')->middleware('auth');
