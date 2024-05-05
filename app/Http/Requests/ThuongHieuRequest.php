<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThuongHieuRequest extends FormRequest
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
     * @return array<string, mixed>
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
            'ten.required' => 'Vui lòng nhập tên thương hiệu',
            'ten.max' => 'Tối đa là 255 ký tự',
            'tinh_trang.required' => 'Vui lòng chọn trạng thái',
            'hinh_anh.mimes' => 'Định dạng hình ảnh không đúng',
            'hinh_anh.max' => 'Dung lượng ảnh tối đa là 2MB',
        ];
    }
}
