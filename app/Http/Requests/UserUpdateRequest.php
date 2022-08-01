<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//điều kiện đẻ có thể gửi yêu cầu đi
        //Nếu là false thì không có quyền gửi yêu cầu 403
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:255',
            'birthday' => 'required|date',
            'user_name' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:255',
            'room_id' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //
        ];
    }
    //cấu hình nội dung mess theo rules bên trên
    public function messages()
    {
        return [
            'name.request'=> 'Bắt buộc phải nhập ',
            'name.min'=>'Tối thiểu 6 kí tự',
            'name.max'=>'Tối đa 255 kí tự',
            'email.email'=>'Email đúng định dạng',
            

        ];

    }
}
