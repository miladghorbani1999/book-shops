<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'name' => 'required|bail|min:3|string',
            'price' => 'required|bail|integer',
            'inventory' => 'required|bail|min:1|integer',
            'category' => 'required|bail|string',
            'publication_year' => 'required|bail'
        ];

    }

    public function messages()
    {
        return [

            'name.max' => __('auth.main.max'),
            'name.required' => __('auth.main.required'),
            'name.string' => __('auth.main.string'),
            'price.required' => __('auth.main.required'),
            'price.min' => __('auth.main.min'),
            'price.integer' => __('auth.main.integer'),
            'inventory.required' => __('auth.main.required'),
            'inventory.integer' => __('auth.main.integer'),
            'category.required' => __('auth.main.required'),
            'category.string' => __('auth.main.string'),
            'publication_year.required' => __('auth.main.required'),
        ];
    }
}
