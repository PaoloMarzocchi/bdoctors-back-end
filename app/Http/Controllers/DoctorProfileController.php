<?php

namespace App\Http\Controllers;

use App\Models\DoctorProfile;
use App\Http\Requests\StoreDoctorProfileRequest;
use App\Http\Requests\UpdateDoctorProfileRequest;
use Illuminate\Support\Facades\Storage;

class DoctorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctorProfile = DoctorProfile::find(1);
        return view('admin.doctorprofile.index', compact('doctorProfile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctorprofile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorProfileRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($request->has('photo')) {
            $validatedRequest['photo'] = Storage::put('uploads', $validatedRequest['photo']);
        }
        $doctorProfile = DoctorProfile::create($validatedRequest);
        return to_route('admin.doctorProfile.index', compact('doctorProfile'))->with('status', 'Add successfully your profile info');
    }

    /**
     * Display the specified resource.
     */
    public function show(DoctorProfile $doctorProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoctorProfile $doctorProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorProfileRequest $request, DoctorProfile $doctorProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoctorProfile $doctorProfile)
    {
        //
    }
}
