<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DoctorProfile;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorProfileController extends Controller
{
    public function index()
    {
        $doctors = DoctorProfile::with('specializations', 'sponsorships', 'user')->paginate(8);
        return response()->json(
            [
                'succcess' => true,
                'doctors' => $doctors,
                //what if we pass Auth / User
            ]
        );
    }

    public function show($slug)
    {
        $user = Auth::user();

        $doctor = DoctorProfile::with(['specializations', 'sponsorships', 'reviews' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }, 'user', 'votes'])
            ->where('slug', $slug)->first();

        if ($doctor) {
            return response()->json([
                'success' => true,
                'doctor' => $doctor,
                'user' => $user,
            ]);
        } else {
            return response()->json(
                [
                    'success' => false,
                    'response' => 'Error 404',
                ]
            );
        }
    }

    public function sponsored()
    {
        $sponsoredDoctors = DoctorProfile::with('specializations', 'sponsorships', 'user', 'reviews', 'votes')->whereHas('sponsorships')->get();

        return response()->json([
            'success' => true,
            'sponsoredDoctors' => $sponsoredDoctors,
        ]);
    }


    public function specializationSearch($name)
    {
        // $searchResults = DoctorProfile::with('specializations', 'sponsorships', 'user')->whereRelation('specializations', 'specialization_id', '=', $id)->get();


        //SELEZIONATI PER SPECIALIZZAZIONE ORDINATI PER SPONSORSHIP

        $searchResults = DoctorProfile::with('specializations', 'sponsorships', 'user', 'votes', 'reviews')
            ->whereRelation('specializations', 'name', '=', $name)
            ->leftJoin('doctor_profile_sponsorship', 'doctor_profiles.id', '=', 'doctor_profile_sponsorship.doctor_profile_id')
            ->select('doctor_profiles.*', DB::raw('IF(MAX(doctor_profile_sponsorship.sponsorship_id IS NOT NULL), 1, 0) as has_sponsorship'))
            ->groupBy('doctor_profiles.id')
            ->orderBy('has_sponsorship', 'desc')
            ->paginate(4);

        dd($searchResults);

        return response()->json(['success' => true, 'searchResults' => $searchResults]);
    }


    public function advancedSearch($specialization, $minAverageVote, $minTotalReviews)
    {

        $query = DoctorProfile::with('specializations', 'sponsorships', 'user', 'votes', 'reviews')
            ->join('users', 'doctor_profiles.user_id', '=', 'users.id')
            ->leftJoin(
                'doctor_profile_sponsorship',
                'doctor_profiles.id',
                '=',
                'doctor_profile_sponsorship.doctor_profile_id'
            )
            ->select(
                'doctor_profiles.*',
                DB::raw('(SELECT AVG(votes.vote) FROM votes JOIN doctor_profile_vote ON votes.id = doctor_profile_vote.vote_id WHERE doctor_profile_vote.doctor_profile_id = doctor_profiles.id) as average_vote'),
                DB::raw('(SELECT COUNT(*) FROM reviews WHERE reviews.doctor_profile_id = doctor_profiles.id) as review_count'),
                DB::raw('IF(MAX(doctor_profile_sponsorship.sponsorship_id IS NOT NULL), 1, 0) as has_sponsorship')
            );

        if ($specialization != 'null') {
            $query->join('doctor_profile_specialization', 'doctor_profiles.id', '=', 'doctor_profile_specialization.doctor_profile_id')
                ->join('specializations', 'doctor_profile_specialization.specialization_id', '=', 'specializations.id')
                ->where('specializations.name', $specialization);
        }

        if ($minAverageVote != 'null') {
            $query->having('average_vote', '>=', $minAverageVote);
        }

        if ($minTotalReviews != 'null') {
            $query->having('review_count', '>=', $minTotalReviews);
        }

        $query->groupBy('doctor_profiles.id')
            ->orderBy('has_sponsorship', 'desc');

        $searchResults = $query->paginate(4);
        dd($searchResults);

        return response()->json(['success' => true, 'searchResults' => $searchResults]);
    }
}
