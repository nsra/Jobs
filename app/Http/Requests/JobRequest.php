<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//مش شرط يكون عامل تسجيل دخول
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'details' => 'required|',
            'category_id' => 'required|max:1',
            'job_type_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'الرجاء ادخال عنوان الوظيفة',
            'details.required' => 'الرجاء ادخال تفاصيل الوظيفة'
        ];
    }
}
