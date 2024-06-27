<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UpdateDoctorProfileRequest;
use App\Models\Specialization;
use App\Models\DoctorProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $specializations = Specialization::all();
        return view('profile.edit', [
            'user' => $request->user(),
            'doctorProfile' => $request->user()->doctorProfile,
            'specializations' => $specializations
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, UpdateDoctorProfileRequest $doctorRequest): RedirectResponse
    {
        // Update user informations
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        // Update doctor profile informations
        $doctorProfile = DoctorProfile::find(Auth::id());
        $validated = $doctorRequest->validated();
        $validated['address'] = $doctorProfile->address;
        $doctorProfile->update($validated);
        // dd($doctorRequest->all(), $validated, $doctorProfile->address);

        return Redirect::route('profile.edit')->with('status', 'Account-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $doctorProfile = DoctorProfile::find(Auth::id());

        $user = $request->user();

        Auth::logout();

        $doctorProfile->surname = null;
        $doctorProfile->slug = null;
        $doctorProfile->cv = null;
        $doctorProfile->photo = null;
        $doctorProfile->address = '';
        $doctorProfile->telephone = null;
        $doctorProfile->services = null;
        $doctorProfile->save();

        $user->name = '';
        $user->email = '';
        $user->password = '';
        $user->save();

        //$doctorProfile->delete();
        //$user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
