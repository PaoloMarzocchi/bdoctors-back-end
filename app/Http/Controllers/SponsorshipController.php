<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;
use App\Http\Requests\StoreSponsorshipRequest;
use App\Http\Requests\UpdateSponsorshipRequest;
use App\Models\DoctorProfile;
use DateInterval;
use DateTime;
use DateTimeInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsorships = Sponsorship::all();
        $user = Auth::user();
        $doctorProfile = $user->doctorProfile;

        // Calculating expiration time of sponsorhips
        $expirationDates = DB::table('doctor_profile_sponsorship')
            ->where('doctor_profile_id', $user->doctorProfile->id)
            ->pluck('expirationDate')
            ->last();

        $expirationDate = Carbon::parse($expirationDates);

        $now = Carbon::now();

        $difference = $now->diff($expirationDate, false);

        $remainingTime = $difference->format('%d days %h hours %i minutes %s seconds');


        return view('admin.sponsorship.index', compact('sponsorships', 'doctorProfile', 'remainingTime'));
    }
    /**
     * Display payment history of sponsorships.
     */
    public function history()
    {
        $user = Auth::user();
        $doctorProfile = $user->doctorProfile;

        $sponsorships = DB::table('sponsorships')
            ->join('doctor_profile_sponsorship', 'sponsorships.id', '=', 'doctor_profile_sponsorship.sponsorship_id')
            ->where('doctor_profile_sponsorship.doctor_profile_id', $doctorProfile->id)
            ->orderBy('doctor_profile_sponsorship.created_at', 'desc')
            ->select('sponsorships.*', 'doctor_profile_sponsorship.created_at as pivot_created_at', 'doctor_profile_sponsorship.expirationDate as pivot_expiration_date')
            ->paginate(5);

        return view('admin.sponsorship.history', compact('sponsorships', 'doctorProfile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSponsorshipRequest $request)
    {

        /* $data = $request->all(); */
        /* dd($request->all()); */
        $user = Auth::user();
        $sponsorships = Sponsorship::all();
        foreach ($sponsorships as $sponsor) {

            if ($request->has('period-' . $sponsor->id) == $sponsor->period && $request->has('price-' . $sponsor->id) == $sponsor->price && $request->has('name-' . $sponsor->id) == $sponsor->name) {
                date_default_timezone_set('Europe/Rome');
                $startDate = date('Y-m-d h:i:s');

                $expirationDate = date("Y-m-d H:i:s", strtotime('+' . $sponsor->period . ' hours'));

                /* $valData = $sponsor; */
                /* foreach ($user->doctorProfile->sponsorships as $userSponsor) {
                    if ($expirationDate=$userSponsor->expirationDate) {
                        $startDate=$userSponsor->expirationDate;
                    }
                } */

                /* dd($startDate, $expirationDate); */

                $user->doctorProfile->sponsorships()->attach($sponsor);
                return to_route('admin.sponsorship.index', compact('sponsorships'))->with('status', 'Transaction confirmed');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSponsorshipRequest $request, Sponsorship $sponsorship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsorship $sponsorship)
    {
        //
    }
}
