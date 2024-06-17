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
    public function store(Request $request, StoreDoctorProfileRequest $doctorRequest): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email', 'min:4', 'max:100', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::min(8)->mixedCase()->numbers()->symbols()]

            /*
            Password validation rules:
                - At least 8 characters
                - At least one lowercase and one uppercase letter (A-z)
                - At least one number (0-9)
                - At least one symbol ('@', '$', '!', '%', '*', '?', '&')
            */
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $validatedRequest = $doctorRequest->validated();
        $validatedRequest['user_id'] = Auth::id();

        $slug = Str::slug($request->name . '_' . $doctorRequest->surname);
        $validatedRequest['slug'] = $slug;

        $doctorProfile = DoctorProfile::create($validatedRequest);
        if ($doctorRequest->has('specializations')) {
            $doctorProfile->specializations()->attach($validatedRequest['specializations']);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
