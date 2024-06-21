<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DoctorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $sponsoredDoctors = DoctorProfile::with('specializations', 'sponsorships', 'user')->whereHas('sponsorships')->get();

        return response()->json([
            'success' => true,
            'sponsoredDoctors' => $sponsoredDoctors,
        ]);
    }


    public function advancedSearch($name)
    {
        // $searchResults = DoctorProfile::with('specializations', 'sponsorships', 'user')->whereRelation('specializations', 'specialization_id', '=', $id)->get();
        $searchResults = DoctorProfile::with('specializations', 'sponsorships', 'user')->whereRelation('specializations', 'name', '=', $name)->get();
        return response()->json(['success' => true, 'searchResults' => $searchResults]);
    }
}
