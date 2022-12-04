<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoaiModel;
use App\Models\LoaiTinModel;
use App\Models\TinTucModel;
use App\Models\SildeModel;
use Auth;
class PageController extends Controller
{
    private $theloai;
    private $loaitin;
    private $slide;
    private $tintuc;
    public function __construct(){
         $this->theloai=new TheLoaiModel();
         $this->slide=new SildeModel();
         $this->loaitin=new LoaiTinModel();
         $this->tintuc=new TinTucModel();
         $theloais=$this->theloai::all();
    }
    public function trangchu(){
        $theloais=$this->theloai::all();
        $slides=$this->slide::all();
        $loaitins=$this->loaitin::all();
        return view('client.pages.home', compact('theloais','slides','loaitins'));
    }
    public function lienhe(){
        $theloais=$this->theloai::all();
        $slides=$this->slide::all();
        return view('client.pages.lienhe',compact('theloais','slides'));
    }
    public function slide(){
        $slides=$this->slide::all();
        return view('client.pages.home',compact('slides'));
    }
    public function loaitin($id){
        $theloais=$this->theloai::all();
        $loaitins=$this->loaitin::find($id);
        $tintucs=$this->tintuc::where('idLoaiTin',$id)->paginate(5);
        return view('client.pages.loaitin',compact('theloais','loaitins','tintucs'));
    }
    public function tintuc($id){
        $tintucs=$this->tintuc::find($id);
        $tinnoibat=$this->tintuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan=$this->tintuc::where('idLoaiTin',$tintucs->idLoaiTin)->take(4)->get();
        return view('client.pages.tintuc',compact('tintucs','tinnoibat','tinlienquan'));
    }
    public function timkiem(Request $request){
        $theloais=$this->theloai::all();
        $tukhoa=$request->tukhoa;
        $tintucs=$this->tintuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")->orWhere('NoiDung','like',"%$tukhoa%")->take(20)->paginate(5);

        return   view('client.pages.timkiem',compact('tukhoa','tintucs','theloais'));
    }
    public function getDangnhap(){
        return view('client.pages.dangnhap');
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

       if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
           return redirect()->route('trangchu');
       }else
       {
           return redirect()->route('Dangnhap_U')->with('msg','Đăng nhập không thành công');
       }
   }
   public function postLogOut(){
       Auth::logout();
       return redirect()->route('trangchu');
   }
}
