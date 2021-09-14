<?php

namespace App\Http\Requests\Admin\Estate;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateAgentsRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'phone' => 'required|max:50'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'عذرا الاسم مطلوب',
          'name.max' => 'اقصى عدد حروف للاسف هو 100 حرف',
          'email.required' => 'عذرا البريد الالكتروني مطلوب',
          'email.max' => 'اقصى عدد حروف للبريد هو 100 حرف',
          'phone.required' => 'عذرا رقم الهاتف مطلوب',
          'phone.max' => 'اقصى عدد حروف رقم الهاتف هو 50 رقم',
        ];
    }
}
