<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'oldpassword' => 'required',
            'password' => 'required|min:4|confirmed',
        ];
    }
    public function messages()
    {
        return [
            "oldpassword.required"=>"الرجاء ادخل كلمة المرور الحالية",
                       "password.required"=>"الرجاء ادخل كلمة المرور الجديدة",
                       "password.min"=>"كلمة المرور الجديدة على الاقل 4 احرف",
                       "password.confirmed"=>"تأكيد كلمة المرور يجب ان يطابق الكلمة الجديدة"
        ];
    }
}
