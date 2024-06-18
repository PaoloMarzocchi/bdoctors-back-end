<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Http\Requests\StoreDoctorProfileRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\DoctorProfile;
use App\Models\Specialization;
use Illuminate\Support\Str;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $specializations = Specialization::all();
        return view('auth.register', compact('specializations'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreUserRequest $request, StoreDoctorProfileRequest $doctorRequest): RedirectResponse
    {
        $userValidatedRequest = $request->validated();

        $userValidatedRequest['password'] = Hash::make($userValidatedRequest['password']);

        $user = User::create($userValidatedRequest);

        event(new Registered($user));

        Auth::login($user);

        $doctorValidatedRequest = $doctorRequest->validated();
        $doctorValidatedRequest['user_id'] = Auth::id();

        $slug = Str::slug($request->name . '_' . $doctorRequest->surname);
        $doctorValidatedRequest['slug'] = $slug;

        $doctorProfile = DoctorProfile::create($doctorValidatedRequest);
        if ($doctorRequest->has('specializations')) {
            $doctorProfile->specializations()->attach($doctorValidatedRequest['specializations']);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
