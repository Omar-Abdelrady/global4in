<?php

namespace App\Http\Requests\Admin;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
        $service = Service::query()->where('slug', $this->slug)->first();
        return [
            'name' => "required|max:150|unique:services,name,$service->id",
            'short_description' => 'required',
            'description' => 'required',
            'keywords' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يرجي كتابة اسم الخدمة',
            'name.max' => 'يجب ان لا يزيد الاسم عن 150 حرف',
            'sub_description.required' => 'يرجي كتابة الوصف القصير',
            'description.required' => 'يرجي كتابة وصف الخدمة',
            'keywords.required' => 'يرجي كتابة الكلمات الدلالية'
        ];
    }
}
