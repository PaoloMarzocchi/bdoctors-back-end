<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorProfileRequest extends FormRequest
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
            'surname' => 'min:4|max:100',
            'specializations' => 'exists:specializations,id',
            'cv' => 'nullable|file|max:2000',
            'photo' => 'nullable|image|max:255',
            'address' => 'max:255',
            'telephone' => 'max:10',
            'services' => 'max:500',
            'user_id' => 'exists:user,id'
        ];
    }
}
