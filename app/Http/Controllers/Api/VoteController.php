<?php

namespace App\Http\Controllers\Api;

use App\Models\Vote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class VoteController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->all();
        $validatedData = Validator::make(
            $data,
            [
                'customer_vote' => 'min:0|max:5',
            ]
        );

        if ($validatedData->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validatedData->errors()
            ]);
        }

        $newVote = Vote::create($data);
        //$newVote = Vote::create($data['customer_vote']);
    }
}
