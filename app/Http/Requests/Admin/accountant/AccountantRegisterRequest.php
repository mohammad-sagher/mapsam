<?php

namespace App\Http\Requests\admin\accountant;

use Illuminate\Foundation\Http\FormRequest;

class AccountantRegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:accountants,email',
            'password' => 'required|min:8',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',


        ];


    }
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'phone.required' => 'Phone is required',
            'address.required' => 'Address is required',
        ];
    }
}
