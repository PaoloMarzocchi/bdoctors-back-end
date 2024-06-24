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
        $doctor = DoctorProfile::with('specializations', 'sponsorships', 'user', 'votes')->where('slug', $slug)->first();
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
        $sponsoredDoctors = DoctorProfile::with('specializations', 'sponsorships', 'user', 'votes')->whereHas('sponsorships')->get();

        return response()->json([
            'success' => true,
            'sponsoredDoctors' => $sponsoredDoctors,
        ]);
    }


    public function specializationSearch($name)
    {
        // $searchResults = DoctorProfile::with('specializations', 'sponsorships', 'user')->whereRelation('specializations', 'specialization_id', '=', $id)->get();


        //SELEZIONATI PER SPECIALIZZAZIONE ORDINATI PER SPONSORSHIP
        $searchResults = DoctorProfile::with('specializations', 'sponsorships', 'user', 'votes')->whereRelation('specializations', 'name', '=', $name)->leftJoin('doctor_profile_sponsorship', 'doctor_profiles.id', '=', 'doctor_profile_sponsorship.doctor_profile_id')
            ->select('doctor_profiles.*', DB::raw('IF(doctor_profile_sponsorship.sponsorship_id IS NOT NULL, 1, 0) as has_sponsorship'))
            ->orderBy('has_sponsorship', 'desc')->distinct()
            ->get();

        return response()->json(['success' => true, 'searchResults' => $searchResults]);
    }


    public function advancedSearch($specialization, $minAverageVote, $minTotalReviews)
    {

        // dd($specialization, $vote, $review);

        // SELEZIONATI PER SPECIALIZZAZIONE ORDINATI PER SPONSORSHIP
        $searchResults = DoctorProfile::with('specializations', 'sponsorships', 'user', 'votes', 'reviews')->whereRelation('specializations', 'name', '=', $specialization)->whereRelation('votes', 'vote', '=', $minAverageVote)->leftJoin('doctor_profile_sponsorship', 'doctor_profiles.id', '=', 'doctor_profile_sponsorship.doctor_profile_id')
            ->select('doctor_profiles.*', DB::raw('IF(doctor_profile_sponsorship.sponsorship_id IS NOT NULL, 1, 0) as has_sponsorship'))
            ->orderBy('has_sponsorship', 'desc')->distinct()
            ->get(); //questa è quella corretta!!


        // $searchResults = DoctorProfile::with('specializations', 'sponsorships', 'user', 'votes', 'reviews')
        //     ->whereRelation('specializations', 'name', '=', $specialization)
        //     ->leftJoin('doctor_profile_sponsorship', 'doctor_profiles.id', '=', 'doctor_profile_sponsorship.doctor_profile_id')
        //     ->leftJoin('doctor_profile_vote', 'doctor_profiles.id', '=', 'votes.doctor_profile_id')
        //     ->leftJoin('reviews', 'doctor_profiles.id', '=', 'reviews.doctor_profile_id')
        //     ->select(
        //         'doctor_profiles.*',
        //         DB::raw('IF(doctor_profile_sponsorship.sponsorship_id IS NOT NULL, 1, 0) as has_sponsorship'),
        //         DB::raw('AVG(votes.vote) as average_vote'),
        //         DB::raw('COUNT(reviews.id) as total_reviews')
        //     )
        //     ->groupBy('doctor_profiles.id')
        //     ->having('average_vote', '>=', $minAverageVote)
        //     ->having('total_reviews', '>=', $minTotalReviews)
        //     ->orderBy('has_sponsorship', 'desc')
        //     ->orderBy('average_vote', 'desc')
        //     ->distinct()
        //     ->get();

        return response()->json(['success' => true, 'searchResults' => $searchResults]);
    }
}
