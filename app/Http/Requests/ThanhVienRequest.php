<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanhVienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_member' => 'required',
            'address' => 'required',
            'phone' => 'required|min:10|max:11',
            'email' => 'required',
            'birthday' => 'required',
            'photo_member' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages() {

        return [
            'photo_member.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg',
            'photo_member.max' => 'Ảnh chỉ nhập ảnh có kích thước tối đa 2MB',
            'name_member.required' => 'Tên thành viên không được để trống',
            'address.required' => 'Địa chỉ không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.min' => 'Số điện thoại ít nhất 10 số',
            'phone.max' => 'Số điện thoại không quá 11 số',
            'email.required' => 'Email không được trống',
            'birthday.required' => 'Ngày sinh không được trống',
        ];
    }
}
