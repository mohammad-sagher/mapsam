<?php

namespace App\Http\Requests\admin\doctor;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRegisterRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:doctors,email',
            'phone'=>'required|unique:doctors,phone',
            'address'=>'required|string|max:255',
            'speciality'=>'required|string|max:255',
            'password'=>'required|min:8',
            'confirm_password'=>'required|min:8',
        ];
    }
    public function messages():array{
        return [
            'name.required'=>'Name is required',
            'email.required'=>'Email is required',
            'phone.required'=>'Phone is required',
            'address.required'=>'Address is required',
            'speciality.required'=>'Speciality is required',
            'password.required'=>'Password is required',
            'confirm_password.required'=>'Confirm Password is required',
        ];
    }
}
