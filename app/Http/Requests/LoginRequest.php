<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|min:6|max:32',
            'password' => 'required|min:6',

        ];
    }
    public function messages()
    {
        //key là key của rule.dk
        return [
            'email.required' => 'Email bắt buộc nhâp',
            'email.email' => 'Email phải đúng định dạng',
            'email.min' => 'Email must be at least 6 characters',
            'email.max' => 'Email must be at most 32 characters',
            'password.required' => 'Password bắt buộc nhập',
            'password.min' => 'Password must be at least 6 characters',
        ];
    }
}
