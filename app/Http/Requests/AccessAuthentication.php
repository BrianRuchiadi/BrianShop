<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccessAuthentication extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|between:3,30|unique:users',
            'email' => 'bail|required|email|between:5,30|unique:users',
            'password' => 'bail|min:4|required|confirmed',
            'password_confirmation' => 'bail|min:4|required'
        ];
    }
    

}
