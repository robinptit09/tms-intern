<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'idCourse' => 'required',
            'code' => 'required|unique:exams,code',
            'numberQuestion' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'idCourse.required' => 'Chọn khóa học',
            'code.required' => 'Mã đề không được trống',
            'code.unique' => 'Mã đề đã tồn tại',
            'numberQuestion.required' => 'Số câu hỏi không được để trống',
            'numberQuestion.numeric' => 'Số câu hỏi phải là số',
            'numberQuestion.min' => 'Số câu hỏi phải không nhỏ hơn 0',
        ];
    }

}
