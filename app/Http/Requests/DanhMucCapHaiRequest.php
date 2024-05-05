<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucCapHaiRequest extends FormRequest
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
            'cap_mot_san_pham' => 'required',
            'ten_cap_hai' => 'required',
            'hinh_anh_cap_hai' =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
        ];
    }

    public function messages() {
        return [
            'cap_mot_san_pham.required' => 'Tên danh mục không được trống',
            'ten_cap_hai.required' => 'Vui lòng nhập tên danh mục',
            'hinh_anh_cap_hai.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
            'hinh_anh_cap_hai.max' => 'Ảnh chỉ nhập ảnh có kích thước bé hơn 2MB',
        ];
    }
}
