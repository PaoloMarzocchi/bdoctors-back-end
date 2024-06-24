<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        // validate
        $val_data = Validator::make($data, [
            'doctor_profile_id' => 'required',
            'first_name' => 'max:50',
            'last_name' => 'max:50',
            'email' => 'max:100',
            'review_text' => 'max:500'
        ]);

        // return response json with errors if the validator fails
        if ($val_data->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $val_data->errors()
            ]);
        }

        Review::create($data);

        // return the response
        return response()->json([
            'success' => true,
            'message' => 'Review sent!'
        ]);
    }
}
