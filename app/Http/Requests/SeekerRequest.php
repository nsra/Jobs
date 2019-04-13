<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeekerRequest extends FormRequest
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
          'name'=>'required|max:50',
          'email'=>'required|email|max:50',
          'mobile'=>'required|max:20',
          'address'=>'required|max:200',
          'gender'=>'required|max:1',
          'dob'=>'required|date',

        ];
    }
    public function messages()
    {
        return [
          'name.required'=>'الرجاء ادخال الاسم',
          'name.max:50'=>'الرجاء ادخال الاسم الصحيح'

        ];
    }
}
