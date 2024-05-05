<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MauSacRequest extends FormRequest
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
            'ten_mau_sac' => 'required',
            'ten_ma' => 'required',
        ];
    }

    public function messages() {
        return [
            'ten_mau_sac.required' => 'Tên màu sắc không được trống',
            'ten_ma.required' => 'Mã màu sắc không được trống'
        ];
    }
}
