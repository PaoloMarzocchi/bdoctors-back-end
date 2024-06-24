<?php

namespace App\Http\Controllers\Api;

use App\Models\Vote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DoctorProfile;


class VoteController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->all();
        $validatedData = Validator::make(
            $data,
            [
                'doctor_profile_id' => 'exists:doctor_profiles,id',
                'vote_id' => 'exists:votes,id',
            ]
        );

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validatedData->errors()
            ]);
        }

        //$newVote = Vote::create($data);
        //$newVote = Vote::create($data['customer_vote']);
        $doctors = DoctorProfile::all();
        $doctor = $doctors->find($data['doctor_profile_id']);

        $doctor->votes()->attach($data);
    }
}
