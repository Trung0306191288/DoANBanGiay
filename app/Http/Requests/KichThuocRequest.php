<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KichThuocRequest extends FormRequest
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
            'ten_kich_thuoc' => 'required',
        ];
    }

    public function messages() {
        return [
            'ten_kich_thuoc.required' => 'vui lòng nhập tên kích thước !',
        ];
    }
}
