<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SildeModel;
use App\Http\Requests\SlideRequest;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $slide;
    const _Per_Name=4;
    public function __construct(){
        $this->slide=new SildeModel();
    }
    public function index()
    {
        $title='Quản lý Slide';
        $slidelist=$this->slide->getAllSilde(self::_Per_Name);

        $errormessage="vui long kiem tra du lieu vao";
        return view('admin.slide.index',compact('title','slidelist','errormessage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Quản Lý Slide";
        $errormessage="vui lòng kiểm tra dữ liệu vào";
        return view('admin.Slide.create',compact('title','errormessage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideRequest $request)
    {
        $add=[
            $request->Ten,
            $request->HinhAnh,
            $request->NoiDung,
            $request->link
          ];
          $this->slide->AddSlide($add);
          return redirect()->route('slide.index')->with('msg','Them thanh cong');
    }

    /**
     * Display the specified resource.

     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id=0)
    {
        $title="Cập nhập lại tên slide";
        $errormessage="vui long kiem tra du lieu vao";
        if(!empty($id)){
         $editSlides=$this->slide->editSlide($id);
         if(!empty($editSlides[0])){
           $request->session()->put('id',$id);
           $editSlides=$editSlides[0];
         }else{
           return redirect()->route('category.index')->with('msg','thể loại khong ton tai');
         }
        }else
        {
         return redirect()->route('category.index')->with('msg','Lien ket khong ton tai');
       }

        return view('admin.Slide.update',compact('title','editSlides','errormessage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlideRequest $request)
    {
        $id=session('id');
        if(empty($id)){
          return back()->with('msg','Lien ket khong ton tai');
        }
        $UpdateSlide=[
            'Ten'=>$request->Ten,
            'HinhAnh'=>$request->HinhAnh,
            'NoiDung'=>$request->NoiDung,
            'link'=>$request->link
          ];
          $this->slide->updateSlide($UpdateSlide,$id);
          return back()->with('msg','Cap nhap thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=0)
    {
        if(!empty($id)){
            $deleteSlides=$this->slide->editSlide($id);
            if(!empty($deleteSlides[0])){
               $deleteSlides= $this->slide->DeleteSlide($id);
               if($deleteSlides){
                $msg="Xoa nguoi dung thanh cong";
               }else{
                $msg="Ban khong the xoa nguoi dung nay ,vui long thu lai";
               }
            }else{
              $msg="nguoi dung khong ton tai";
            }
           }else
           {
            $msg="Lien ket khong ton tai";
           }
           return redirect()->route('slide.index')->with('msg',$msg);
    }
}
