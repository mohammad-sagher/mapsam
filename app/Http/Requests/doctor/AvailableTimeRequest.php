<?php

namespace App\Http\Requests\doctor;

use Illuminate\Foundation\Http\FormRequest;

class AvailableTimeRequest extends FormRequest
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

            'day' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'duration' => 'required|integer',
        ];
    }
    public function messages(): array
    {
        return [
            'day.required' => 'The day field is required.',
            'start_time.required' => 'The start time field is required.',
            'end_time.required' => 'The end time field is required.',
            'duration.required' => 'The duration field is required.',
        ];
    }
}
