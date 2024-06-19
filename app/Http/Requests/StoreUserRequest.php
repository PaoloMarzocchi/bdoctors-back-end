<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:4|max:100',
            'email' => 'required|unique:users|min:4|max:100',
            'password' => ['required', min(8)->mixedCase()->numbers()->symbols()],
            'surname' => 'required',
            'cv' => 'nullable|file|max:2000',
            'photo' => 'nullable|image|max:255',
            'address' => 'required|max:255',
            'telephone' => 'max:10',
            'services' => 'max:500',
            'user_id' => 'exists:user,id',
            'specializations' => 'required|exists:specializations,id'
        ];

        /* Password rules:
            - At least one lowercase letter (a – z)
            - At least one uppercase letter (A – Z)
            - At least one number (0 – 9)
            - At least one symbol (@, $, !, %, *, ?, &, ^, #)
        */
    }
}
