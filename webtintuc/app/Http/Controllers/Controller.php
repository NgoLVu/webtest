<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function _construct(){
        $this->DangNhap();
        if(Auth::check()){
            view::share('nguoidung',Auth::user());
         }

    }
    function ktrDangNhap(){
        // @if(Auth::user())
        if(Auth::check()){
            View::share('user_login',Auth::user());
        }
    }

}
