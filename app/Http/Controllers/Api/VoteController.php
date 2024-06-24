<?php

namespace App\Http\Controllers\Api;

use App\Models\Vote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DoctorProfile;
use Illuminate\Support\Facades\Log;


class VoteController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Incoming request:', $request->all());

        try {
            $data = $request->all();
            $validatedData = Validator::make(
                $data,
                [
                    'doctor_profile_id' => 'required|exists:doctor_profiles,id',
                    'vote_id' => 'required|exists:votes,id',
                ]
            );

            if ($validatedData->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validatedData->errors()
                ], 400);
            }

            $doctor = DoctorProfile::find($data['doctor_profile_id']);

            if (!$doctor) {
                return response()->json([
                    'success' => false,
                    'message' => 'Doctor not found'
                ], 404);
            }

            $doctor->votes()->attach($data['vote_id'], ['created_at' => now(), 'updated_at' => now()]);

            return response()->json([
                'success' => true,
                'message' => 'Vote added successfully'
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error processing request:', ['exception' => $e]);

            return response()->json([
                'success' => false,
                'message' => 'Internal Server Error'
            ], 500);
        }
    }
}
