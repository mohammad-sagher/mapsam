<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataProfileActiveRequest extends FormRequest
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
            'Recent_badges' => 'required|string|max:255',
            'recent_activity' => 'required|string|max:255',
            'hobbies' => 'required|string|max:255',
            'about' => 'required|string|max:255',
            //
        ];

    }
    public function messages(): array
    {
        return [
            'recent_badges.required' => 'Recent badges is required',
            'recent_activity.required' => 'Recent activity is required',
            'hobbies.required' => 'Hobbies is required',
            'about.required' => 'About is required',
        ];
    }
}
