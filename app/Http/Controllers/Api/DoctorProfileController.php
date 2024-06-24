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
            ->orderBy('has_sponsorship', 'desc')
            ->get();

        return response()->json(['success' => true, 'searchResults' => $searchResults]);
    }
}
