<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoaiTinRequest;
use App\Models\LoaiTinModel;
use App\Models\TheLoaiModel;
use DB;


class LoaitinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $loaitin;
    const _Per_Name=4;
    public function __construct(){
        $this->loaitin=new LoaiTinModel();
    }
    public function index()
    {
        $title='Quản lý loại tin';
        $loaitins=$this->loaitin->getAllLoaiTin(self::_Per_Name);
        $errormessage="vui long kiem tra du lieu vao";
        $allGroups=getAllTheLoai();
        return view('admin.loaitin.index',compact('title','loaitins','errormessage','allGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Quản Lý người dùng";
        $errormessage="vui long kiem tra du lieu vao";
        return view('admin.Loaitin.index',compact('title','errormessage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoaiTinRequest $request)
    {
        $Add=[
            $request->idTheLoai,
            $request->Ten
        ];
        $this->loaitin->AddLoaiTin($Add);
        return redirect()->route('Loaitin.index')->with('msg','Them thanh cong');
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
        $title="Cập nhập lại loại tin";
        $errormessage="vui long kiem tra du lieu vao";
        if(!empty($id)){
         $editLoaitins=$this->loaitin->editLoaiTin($id);
         if(!empty($editLoaitins[0])){
           $request->session()->put('id',$id);
           $editLoaitins=$editLoaitins[0];
         }else{
           return redirect()->route('Loaitin.index')->with('msg','thể loại khong ton tai');
         }
        }else
        {
         return redirect()->route('Loaitin.index')->with('msg','Lien ket khong ton tai');
       }
       $allGroups=getAllTheLoai();
        return view('admin.Loaitin.update',compact('title','editLoaitins','errormessage','allGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LoaiTinRequest $request)
    {
        $id=session('id');
        if(empty($id)){
          return back()->with('msg','Lien ket khong ton tai');
        }
        $Update=[
            'idTheloai'=>$request->idTheLoai,
            'ten'=>$request->Ten,
          ];
        $this->loaitin->updateLoaiTin($Update,$id);
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
            $delete=$this->loaitin->editLoaiTin($id);
            if(!empty($delete[0])){
               $delete= $this->loaitin->DeleteLoaiTin($id);
               if($delete){
                $msg="Xoa loai tin thanh cong";
               }else{
                $msg="Ban khong the xoa loai tin nay ,vui long thu lai";
               }
            }else{
              $msg="loai tin khong ton tai";
            }
           }else
           {
            $msg="Lien ket khong ton tai";
           }
           return redirect()->route('Loaitin.index')->with('msg',$msg);
    }
}
