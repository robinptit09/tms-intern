<?php

namespace App\Http\Requests\Exam;

use Illuminate\Foundation\Http\FormRequest;

class AddExamRequest extends FormRequest
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
            'time' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'idCourse.required' => 'Chọn khóa học',
            'code.required' => 'Mã đề không được trống',
            'code.unique' => 'Mã đề đã tồn tại',
            'time.unique' => 'Chọn thời gian',
            'time.numeric' => 'Thời gian phải là số',
            'time.min' => 'Thời gian tối thiểu 1 phút',
        ];
    }

}
