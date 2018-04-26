<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNewsReq extends FormRequest
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
            'txtTitle'=>'required',
            'txtContent'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'txtTitle.required'=>'Bạn chưa nhập tiêu đề cho bài viết !',
            'txtContent.required'=>'Nội dung không được để trống !',
        ];
    }
}
