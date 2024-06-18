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
            'password' => 'required',
            'surname' => 'required',
            'cv' => 'nullable|file|max:2000',
            'photo' => 'nullable|image|max:255',
            'address' => 'required|max:255',
            'telephone' => 'max:10',
            'services' => 'max:500',
            'user_id' => 'exists:user,id',
            'specializations' => 'required|exists:specializations,id'
        ];

        /* ToDo:
        
            - Add regex rule for password validation when form in completed:
                English uppercase characters (A – Z)
                English lowercase characters (a – z)
                Base 10 digits (0 – 9)
                Non-alphanumeric (For example: !, $, #, or %)
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!$#%]).*$/'

            - Add password docnfirmation rule when form is completed
        */
    }
}
