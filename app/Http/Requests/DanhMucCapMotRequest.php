<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucCapMotRequest extends FormRequest
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
    public function rules()
    {
        return [
            'ten' => 'required|max:255',
            'tinh_trang' => 'required',
            'hinh_anh' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'ten.required' => 'Vui lòng nhập tên danh mục',
            'ten.max' => 'Tối đa là 255 ký tự',
            'tinh_trang.required' => 'Vui lòng chọn trạng thái',
            'hinh_anh.mimes' => 'Định dạng hình ảnh không đúng',
            'hinh_anh.max' => 'Dung lượng ảnh tối đa là 4MB',
        ];
    }
}
