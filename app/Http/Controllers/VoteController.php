<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Http\Requests\StoreVoteRequest;
use App\Http\Requests\UpdateVoteRequest;
use App\Models\DoctorProfile;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
        $doctorProfile = $user->doctorProfile;
        $votes = $user->doctorProfile->votes;

        $sum = 0;
        $numberVotes = count($votes);
        foreach ($votes as $vote) {
            $sum += $vote->vote;
        }
        $average = $sum / $numberVotes;

        return view('admin.vote.index', compact('votes', 'average', 'doctorProfile', 'numberVotes'));
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
    public function store(StoreVoteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoteRequest $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
