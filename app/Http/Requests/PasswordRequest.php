<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'oldpassword'=>'required',
            'password'=>'required|min:6',
            'password_comfirmation'=>'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'oldpassword.required'=>'Nhập mật khẩu hiện tại',
            'password.required'=>'Nhập mật khẩu mới',
            'password_comfirmation.required'=>'Xác nhận lại mật khẩu',
            'password_comfirmation.same'=>'Mật khẩu xác nhận không khớp',
            'password.min'=>'Độ dài mật khẩu ít nhất 6 kí tự'
        ];
    }
}
