<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DoctorProfile;
use Illuminate\Http\Request;

class DoctorProfileController extends Controller
{
    public function index()
    {
        $doctors = DoctorProfile::with('specializations', 'sponsorships', 'user')->paginate(8);
        return response()->json(
            [
                'succcess' => true,
                'doctors' => $doctors,
            ]
        );
    }

    public function show($id)
    {
        $doctor = DoctorProfile::with('specializations', 'sponsorships', 'user')->where('id', $id)->first();
        if ($doctor) {
            return response()->json([
                'success' => true,
                'doctor' => $doctor,
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
        $sponsoredDoctors = DoctorProfile::with('specializations', 'sponsorships', 'user')->whereHas('sponsorships')->get();

        return response()->json([
            'success' => true,
            'sponsoredDoctors' => $sponsoredDoctors,
        ]);
    }

    public function advancedSearch($id)
    {
        $searchResults = DoctorProfile::with('specializations', 'sponsorships', 'user')->has('specializations', '=', $id)->get();

        return response()->json([
            'success' => true,
            'searchResults' => $searchResults,
        ]);
    }
}
