<?php

namespace App\Http\Controllers;

use App\Models\DoctorProfile;
use App\Http\Requests\StoreDoctorProfileRequest;
use App\Http\Requests\UpdateDoctorProfileRequest;
use App\Models\Specialization;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctorProfile = DoctorProfile::find(Auth::id());
        return view('admin.doctorprofile.index', compact('doctorProfile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = Specialization::all();
        return view('admin.doctorprofile.create', compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorProfileRequest $request)
    {
        $validatedRequest = $request->validated();
        if ($request->has('cv')) {
            $validatedRequest['cv'] = Storage::put('uploads', $validatedRequest['cv']);
        }
        if ($request->has('photo')) {
            $validatedRequest['photo'] = Storage::put('uploads', $validatedRequest['photo']);
        }

        $validatedRequest['user_id'] = Auth::id();

        $doctorProfile = DoctorProfile::create($validatedRequest);

        return to_route('admin.doctorProfile.index', compact('doctorProfile'))->with('status', 'Add successfully your profile info');
    }

    /**
     * Display the specified resource.
     */
    public function show(DoctorProfile $doctorProfile)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoctorProfile $doctorProfile)
    {
        /* dd($doctorProfile); */
        $specializations = Specialization::all();
        return view('admin.doctorprofile.edit', compact('doctorProfile', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorProfileRequest $request, DoctorProfile $doctorProfile)
    {
        $validated = $request->validated();

        if ($request->has('photo')) {
            /*  dd($doctorProfile->photo); */
            if ($doctorProfile->photo) {
                /* dd('dovrebbe eliminarla'); */
                Storage::delete($doctorProfile->photo);
            }
            $validated['photo'] = Storage::put('uploads', $validated['photo']);
        }

        if ($request->cv) {

            if ($doctorProfile->cv) {
                Storage::delete($doctorProfile->cv);
            }

            $cv_path = Storage::put('cv', $validated['cv']);
            $validated['cv'] = $cv_path;
        }

        $doctorProfile->update($validated);

        if ($request->has('specializations')) {
            $doctorProfile->specializations()->sync($validated['specializations']);
        }
        return to_route('admin.doctorProfile.index')->with('status', 'Profile information updated');

        /* return to_route('admin.doctorProfile.index', compact('doctorProfile'))->with('status', 'Edit successfully your profile info'); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoctorProfile $doctorProfile)
    {
        if ($doctorProfile->photo) {
            Storage::delete($doctorProfile->photo);
        }
        if ($doctorProfile->cv) {
            Storage::delete($doctorProfile->cv);
        }

        $doctorProfile->update(['cv' => null, 'photo' => null, 'telephone' => null, 'services' => null]);

        return to_route('dashboard')->with('status', "Your Profile info was deleted successfully");
    }
}
