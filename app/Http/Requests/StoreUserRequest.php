<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'email' => 'required|unique|min:4|max:100',
            'password' => 'required|min:8',
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
