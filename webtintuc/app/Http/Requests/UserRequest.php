<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:6|max:32'
        ];
    }
    public function messages(){
        return [
            'required'=>':attribute bat buoc phai nhap',
            'password.min'=>':attribute khong duoc nho hon 6 ky tu',
            'password.max'=>':attribute khong duoc lon hon 32 ky tu',
        ];
    }
    public function attributes(){
        return [
            'name'=>'Tên người dùng',
            'email'=>'Email',
            'password'=>'mật khẩu'
        ];
    }
}
