<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinTucRequest extends FormRequest
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
            'TieuDe'=>'required',
            'TomTat'=>'required',
            'NoiDung'=>'required',
            'Hinh'=>'required',
         //   'NoiBat'=>'required',
            'idLoaiTin'=>'required'
        ];
    }
    public function messages(){
        return [
            'required'=>':attribute bắt buộc phải nhập',
          //  'loaitin_name.required'=>':attribute bắt buộc phải chọn'
        ];
    }
    public function attributes(){
        return [
            'TieuDe'=>'Tiêu đề',
            'TomTat'=>'Tóm tắt',
            'NoiDung'=>'Nội Dung',
            'Hinh'=>'Hình ảnh',
           // 'NoiBat'=>'Nổi bật'
           'idLoaiTin'=>'Loại tin'
        ];
    }
}
