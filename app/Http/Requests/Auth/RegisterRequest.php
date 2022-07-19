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
            'first_name' => ['bail','required', 'string', 'max:255'],
            'last_name'  => ['bail','required', 'string', 'max:255'],
            'email'      => ['bail','required', 'string', 'email', 'max:255', 'unique:users'],
           'password'    => ['bail','required', 'confirmed', Rules\Password::defaults()],
        ];
    }
    public function messages(){
        return [

            'first_name.max'      => __('auth.main.max'        ,["text"=>'نام']),
            'last_name.required'  => __('auth.main.required'   ,['text'=>'نام خانوادگی']),
            'last_name.max'       => __('auth.main.max'        ,["text"=>'نام خانوادگی']),
            'email.required'      => __('auth.main.required'   ,['text'=>'ایمیل']),
            'email.email'         => __('auth.main.required'   ,['text'=>'ایمیل']),
            'email.unique:users'  => __('auth.main.unique'     ,['text'=>'ایمیل']),
            'password.required'   => __('auth.main.required'   ,['text'=>'پسورد']),
            'first_name.required' => __('auth.main.required'   ,['text'=>'نام']),
        ];
    }
}
