<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'passwordAgain' => 'required|same:password',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Nhập dúng định dạng email',
            'email.unique' => 'Email đã được đăng ký',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu có ít nhất 6 ký tự',
            'passwordAgain.required' => 'Vui lòng nhập mật khẩu xác nhận',
            'passwordAgain.same' => 'Mật khẩu xác nhận không đúng',
        ];
    }
}
