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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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

    // Calculating expiration time of sponsorhips
    $expirationDates = DB::table('doctor_profile_sponsorship')
        ->where('doctor_profile_id', $doctorProfile->id)
        ->pluck('expirationDate')
        ->last();

    $expirationDate = Carbon::parse($expirationDates);

    $now = Carbon::now();

    $difference = $now->diff($expirationDate, false);

    $remainingTime = $difference->format('%d days %h hours %i minutes %s seconds');


    return view('dashboard', compact('doctorProfile', 'messages', 'reviews', 'votes', 'average', 'numberVotes', 'remainingTime'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/statistics/index2', [StatisticController::class, 'index2'])->name('admin.statistics.index2');

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

        Route::get('/sponsorship/history', [SponsorshipController::class, 'history']);
        Route::resource('/sponsorship', SponsorshipController::class);
        Route::resource('/reviews', ReviewController::class);

        Route::resource('/statistics', StatisticController::class);
        Route::any('/payment/{sponsorship}', [PaymentController::class, 'token'])->name('token');
    });

require __DIR__ . '/auth.php';


/* ->parameters(['sponsorship' => 'sponsorship:slug']) */
