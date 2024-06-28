<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\DoctorProfile;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::where('doctor_profile_id', '=', Auth::id())->orderBy('created_at', 'desc')->paginate(8);
        $messageNumber = count($messages);
        $doctor = DoctorProfile::find(Auth::id());
        // dd($messages);
        /* $messages['created_at']->format('d F Y'); */

        return view('admin.messages.index', compact('messages', 'messageNumber', 'doctor', 'formattedMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
