<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StuRegisterRequest extends FormRequest
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
            'phone'=>'numeric',
            'tutor_id'=>'exists:tutors,id',
            'subject_id'=>'exists:subjects,id',
        ];
    }
    public function messages()
    {
        return [
            'phone.numeric'=>'Số điện thoại không hợp lệ vui lòng nhập lại !',
            'tutor_id.exists'=>'Mã gia sư không tồn tại !',
            'subject_id.exists'=>'Môn học này chưa mở !'
        ];
    }
}
