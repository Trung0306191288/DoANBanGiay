<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'photo_product' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_gallery' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name_product' => 'required',
            'cate_product' => 'required',
            'sup_product' => 'required',
        ];
    }

    public function messages() {
        return [
            'photo_product.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
            'photo_product.max' => 'Ảnh chỉ nhập ảnh có kích thước nhỏ hơn 2MB',
            'photo_gallery.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
            'photo_gallery.max' => 'Ảnh chỉ nhập ảnh có kích thước nhpr hơn 2MB',
            'name_product.required' => 'Vui lòng nhập tên sản phẩm',
            'cate_product.required' => 'Bạn chưa chọn danh mục sản phẩm',
            'sup_product.required' => 'Bạn chưa chọn thương hiệu',
        ];
    }
}
