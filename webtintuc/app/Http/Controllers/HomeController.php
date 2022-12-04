<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categorys=$this->category->getAllCategory();
        return view('client.Categorys.index',compact('categorys'));
    }
}
