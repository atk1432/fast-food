<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'required|max:50',
            'phone_number' => 'required|numeric|digits_between:5,20',
            'address' => 'required|max:70',
            'info_for_shipper' => 'nullable|max:100'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {

        return [
            'phone_number.digits_between' => 'Số điện thoại không được quá 20 kí tự.',
            'phone_number.numeric' => 'Số điện thoại phải là các chứ số.',
            'address.max' => 'Địa chỉ không quá 70 kí tự.',
            'info_for_shipper.max' => 'Thông tin cho người giao hàng không quá 100 kí tự.'
        ];

    }

}
