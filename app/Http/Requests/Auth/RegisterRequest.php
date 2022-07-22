<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['bail', 'required', 'string', 'max:255'],
            'last_name' => ['bail', 'required', 'string', 'max:255'],
            'email' => ['bail', 'required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['bail', 'required','unique:users'],
            'password' => ['bail', 'required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function messages()
    {
        return [

            'first_name.max' => __('auth.main.max'),
            'last_name.required' => __('auth.main.required'),
            'last_name.max' => __('auth.main.max'),
            'email.required' => __('auth.main.required'),
            'email.email' => __('auth.main.required'),
            'email.unique:users' => __('auth.main.unique'),
            'phone_number.required' => __('auth.main.required'),
            'phone_number.unique:users' => __('auth.main.unique'),
            'password.required' => __('auth.main.required'),
            'first_name.required' => __('auth.main.required'),
        ];
    }
}
