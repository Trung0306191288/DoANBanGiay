<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Member_Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'ho_ten' => 'required',
            'dia_chi' => 'required',
            'dien_thoai' => 'required|min:10|max:11',
            'email' => 'required',
            'nam_sinh' => 'required',
            'hinh_anh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages() {

        return [
            'hinh_anh.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
            'hinh_anh.max' => 'Ảnh chỉ nhập ảnh có kích thước tối đa 2MB',
            'ho_ten.required' => 'Tên thành viên không được trống',
            'dia_chi.required' => 'Địa chỉ không được trống',
            'dien_thoai.required' => 'Số điện thoại nhập không được trống',
            'dien_thoai.min' => 'Số điện thoại phải có ít nhất 10 số',
            'dien_thoai.max' => 'Số điện thoại không vượt quá 11 số',
            'email.required' => 'Email không được trống',
            'nam_sinh.required' => 'Ngày sinh không được trống',
        ];
    }
}
