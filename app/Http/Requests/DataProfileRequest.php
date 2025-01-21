<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataProfileRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'username.required' => 'Username field is required',
            'phone.required' => 'Phone field is required',
            'address.required' => 'Address field is required',
            'city.required' => 'City field is required',
            'state.required' => 'State field is required',
            'username.string' => 'Username must be text',
            'phone.string' => 'Phone must be text',
            'address.string' => 'Address must be text',
            'city.string' => 'City must be text',
            'state.string' => 'State must be text',
            'username.max' => 'Username cannot exceed 255 characters',
            'phone.max' => 'Phone cannot exceed 255 characters',
            'address.max' => 'Address cannot exceed 255 characters',
            'city.max' => 'City cannot exceed 255 characters',
            'state.max' => 'State cannot exceed 255 characters',
        ];
    }
}
