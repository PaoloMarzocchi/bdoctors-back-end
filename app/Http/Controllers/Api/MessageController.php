<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [

            'doctor_profile_id' => 'required',
            'sender_first_name' => 'required|min:2',
            'sender_last_name' => 'required|min:5',
            'email' => 'required|email',
            'message_text' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'data' => $data,
            ]);
        };

        $newMessage = Message::create($data);
    }
}
