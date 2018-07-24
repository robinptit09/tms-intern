<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required|unique:course,name'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên khóa học không được trống',
            'name.unique' => 'Tên khóa học đã tồn tại'
        ];
    }
}
