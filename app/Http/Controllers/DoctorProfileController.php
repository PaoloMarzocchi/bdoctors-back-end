<?php

namespace App\Http\Controllers;

use App\Models\DoctorProfile;
use App\Http\Requests\StoreDoctorProfileRequest;
use App\Http\Requests\UpdateDoctorProfileRequest;
use App\Models\Specialization;
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
        /* dd($doctorProfile); */
        return view('admin.doctorprofile.edit', compact('doctorProfile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorProfileRequest $request, DoctorProfile $doctorProfile)
    {
        $validated = $request->validated();

        /* $slug = Str::slug($request->name, '-'); */
        /* $validated['slug'] = $slug; */
        //dd($validated);
        if ($request->has('photo')) {

            if ($doctorProfile->photo) {
                Storage::delete($doctorProfile->photo);
            }

            $photo_path = Storage::put('photo', $validated['photo']);
            $validated['photo'] = $photo_path;
        }

        if ($request->has('cv')) {

            if ($doctorProfile->cv) {
                Storage::delete($doctorProfile->cv);
            }

            $cv_path = Storage::put('cv', $validated['cv']);
            $validated['cv'] = $cv_path;
        }

        $doctorProfile->update($validated);

        return to_route('admin.doctorProfile.index', compact('doctorProfile'))->with('status', 'Edit successfully your profile info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoctorProfile $doctorProfile)
    {
        if ($doctorProfile->photo) {
            Storage::delete($doctorProfile->preview);
        }
        if ($doctorProfile->cv) {
            Storage::delete($doctorProfile->cv);
        }

        $doctorProfile->delete();

        return to_route('admin.projects.index')->with('status', "Deleted successfully your profile");
    }
}
