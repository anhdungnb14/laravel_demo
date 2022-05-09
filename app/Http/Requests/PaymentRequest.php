<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            "name"=>"required",
            "address"=>"required",
            "email"=>"required|email",
            "phone"=>"required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10"
        ];
    }
    public function messages()
    {
        return [
            "name.required"=>"Tên không được để trống",
            "address.required"=>"Địa chỉ không được để trống",
            "email.required"=>"Email không được để trống",
            "email.email"=>"Email không hợp lệ",
            "phone.required"=>"Số điện thoại không được để trống",
            "phone.regex"=>"Số điện thoại không đúng định dạng",
            "phone.min"=>"Số điện thoại tối thiểu 10 số",
            "phone.max"=>"Số điện thoại tối đa 10 số"
        ];
    }
}
