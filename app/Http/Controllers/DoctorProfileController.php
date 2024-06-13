<?php

namespace App\Http\Controllers;

use App\Models\DoctorProfile;
use App\Http\Requests\StoreDoctorProfileRequest;
use App\Http\Requests\UpdateDoctorProfileRequest;

class DoctorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreDoctorProfileRequest $request)
    {
        //
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
