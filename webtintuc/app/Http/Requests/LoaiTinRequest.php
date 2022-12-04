<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiTinRequest extends FormRequest
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
            'Ten'=>'required',
        ];
    }
    public function messages(){
        return [
            'required'=>':attribute bat buoc phai nhap'
        ];
    }
    public function attributes(){
        return [
            'Ten'=>'Tên loại tin',
        ];
    }
}
