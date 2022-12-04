<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinTucModel;
use App\Models\LoaiTinModel;
use App\Http\Requests\TinTucRequest;

class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $tintuc;
    const _Per_Name=4;
    public function __construct(){
        $this->tintuc=new TinTucModel();
    }
    public function index()
    {
        $title="Quản Lý tin tức";
        $tintucs=$this->tintuc->getAllTin(self::_Per_Name);
        $errormessage="vui lòng kiểm tra dữ liệu vào";
        return view('admin.tintuc.index',compact('title','tintucs','errormessage'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Quản Lý tin tức";
        $errormessage="vui long kiem tra du lieu vao";
        $allGroups=getAllLoaitin();
        return view('admin.tintuc.create',compact('title','errormessage','allGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TinTucRequest $request)
    {
        $add=[
            $request->TieuDe,
            $request->TomTat,
            $request->NoiDung,
            $request->Hinh,
            // $request->NoiBat,
            $request->idLoaiTin
        ];
        $this->tintuc->AddTin($add);
        return redirect()->route('Tintuc.index')->with('msg','Thêm thành công');

    }

    /**
     * Display the specified resource.
     *
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
    public function edit(Request $request,$id)
    {
        $title="Cập nhập lại tin tức";
        $errormessage="vui long kiem tra du lieu vao";
        if(!empty($id)){
         $editTins=$this->tintuc->editTin($id);
         if(!empty($editTins[0])){
           $request->session()->put('id',$id);
           $editTins=$editTins[0];
         }else{
           return redirect()->route('Tintuc.index')->with('msg','thể loại khong ton tai');
         }
        }else
        {
         return redirect()->route('Tintuc.index')->with('msg','Lien ket khong ton tai');
       }
       $allGroups=getAllLoaitin();
        return view('admin.tintuc.update',compact('title','editTins','errormessage','allGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TinTucRequest $request)
    {
        $id=session('id');
        if(empty($id)){
          return back()->with('msg','Lien ket khong ton tai');
        }
        $Update=[
            'TieuDe'=>$request->TieuDe,
            'TomTat'=>$request->TomTat,
            'NoiDung'=>$request->NoiDung,
            'Hinh'=>$request->Hinh,
            // $request->NoiBat,
            'idLoaiTin'=>$request->idLoaiTin
          ];
        $this->tintuc->updateTin($Update,$id);
        return back()->with('msg','Cap nhap thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!empty($id)){
            $delete=$this->tintuc->editTin($id);
            if(!empty($delete[0])){
               $delete= $this->tintuc->DeleteTin($id);
               if($delete){
                $msg="Xoa in thanh cong";
               }else{
                $msg="Ban khong the xoa tin nay ,vui long thu lai";
               }
            }else{
              $msg="loai tin khong ton tai";
            }
           }else
           {
            $msg="Lien ket khong ton tai";
           }
           return redirect()->route('Tintuc.index')->with('msg',$msg);
    }
}
