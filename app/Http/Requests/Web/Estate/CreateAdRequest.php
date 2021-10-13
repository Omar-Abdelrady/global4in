<?php

namespace App\Http\Requests\Web\Estate;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdRequest extends FormRequest
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
        if (request()->_method == 'PUT') {
            return [
                'title' => "required|max:200|unique:ads,title,$this->id",
                'advertiser_name' => 'required|max:200',
                'description' => 'required',
                'price' => 'required|max:200',
                'space' => 'required|max:200',
                'address' => 'required',
                'phone' => 'required|max:200',
                'second_phone' => 'required|max:200',
//            'meridians' => 'required',
//            'latitudes' => 'required',
                'sale_or_rent' => 'required',
                'advertiser_email' => 'required',
                'category_id' => 'required',
                'ad_agent_id' => 'required',
                'city_id' => 'required'
            ];
        }

        return [
            'title' => 'required|max:200',
            'advertiser_name' => 'required|max:200',
            'description' => 'required',
            'price' => 'required|max:200',
            'space' => 'required|max:200',
            'address' => 'required',
            'phone' => 'required|max:200',
            'second_phone' => 'required|max:200',
//            'meridians' => 'required',
//            'latitudes' => 'required',
            'sale_or_rent' => 'required',
            'advertiser_email' => 'required',
            'category_id' => 'required',
            'city_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عذرا الاسم مطلوب',
            'title.max' => 'اقصى حد للعنوان 200 حرف',
            'advertiser_name.required' => 'عذرا يجب كتابة اسم صاحب الاعلان',
            'advertiser_name.max' => 'اقصى حد للاسم 200 حرف',
            'description.required' => 'عذرا الوصف مطلوب',
            'price.required' => 'عذرا السعر مطلوب',
            'price.max' => 'اقصى حد للسعر 200 رقم',
            'space.required' => 'عذرا المساحة مطلوبة',
            'space.max' => 'اقصى حد للمساحة هو 200 رقم',
            'address.required' => 'عذرا العنوان التفصيلي مطلوب',
            'phone.required' => 'عذرا رقم الهاتف مطلوب',
            'phone.max' => 'عذرا اقصى حد لرقم الهاتف هو 200 رقم',
            'second_phone.required' => 'عذرا رقم الهاتف الثاني مطلوب',
            'second_phone.max' => 'عذرا اقصى حد لرقم الهاتف الثاني هو 200 رقم',
            'meridians.required' => 'عذرا يجب التأكد من تحديد موقعك علي الخريطة',
            'latitudes.required' => 'عذرا يجب التأكد من تحديد موقعك علي الخريطة',
            'sale_or_rent.required' => 'عذرا يرجي تحديد حالة الاعلان للبيع ام الايجار',
            'advertiser_email.required' => 'عذرا يرجي البريد الالكتروني مطلوب',
            'advertiser_email.max' => 'عذرا اقصى حد للبريد الالكتروني هو 200 حرف',
            'category_id.required' => 'عذرا يرجي اختيار القسم الخاص بالاعلان',
            'ad_agent_id.required' => 'عذرا يرجي اختيار وكيل الاعلان',
            'city_id.required' => 'يرجي اختيار المدينة'
        ];
    }
}
