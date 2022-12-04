<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Auth;
use session;
class AuthController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }
    public function getDangnhap(){
         return view('admin.login');
    }
    public function postDangnhap(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32'],
            [
                'email.required'=>'Ban chua nhap email',
                'password.required'=>'Ban chua nhap mat khau',
                'password.min'=>'mat khau phai lon hon 3 ky tu',
                'password.max'=>'mat khau phai nho hon 32 ky tu'
            ]);
        $login=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('home');
        }else
        {
            return redirect()->route('Dangnhap')->with('msg','Dang nhap khong thanh cong');
        }
    }
    public function postLogOut(){
        Auth::logout();
        return redirect()->route('Dangnhap');
    }
}
