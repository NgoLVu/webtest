<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\TheLoaiModel;
use App\Http\Requests\CategoryRequest;
class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $category;
    const _Per_Name=4;
    public function __construct(){
        $this->category=new TheLoaiModel();
    }
    public function index()
    {
        $title="Quản Lý thể loại";
        $categorys=$this->category->getAllCategory(self::_Per_Name);
        $errormessage="vui lòng kiểm tra dữ liệu vào";
        return view('admin.Categorys.index',compact('title','categorys','errormessage'));
      //  return view('layouts.client',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Quản Lý Thể loại";
        $errormessage="vui lòng kiểm tra dữ liệu vào";
        return view('admin.Categorys.index',compact('title','errormessage'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $add=[
            $request->Ten
          ];
          $this->category->AddCategory($add);
       //   return view('admin.Categorys.index');
          return redirect()->route('category.index')->with('msg','Them thanh cong');
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
    public function edit(Request $request,$id=0)
    {
 $title="Cập nhập lại tên danh mục";
 $errormessage="vui long kiem tra du lieu vao";
 if(!empty($id)){
  $editCategorys=$this->category->editCategory($id);
  if(!empty($editCategorys[0])){
    $request->session()->put('id',$id);
    $editCategorys=$editCategorys[0];
  }else{
    return redirect()->route('category.index')->with('msg','thể loại khong ton tai');
  }
 }else
 {
  return redirect()->route('category.index')->with('msg','Lien ket khong ton tai');
}

 return view('admin.Categorys.update',compact('title','editCategorys','errormessage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=session('id');
        if(empty($id)){
          return back()->with('msg','Lien ket khong ton tai');
        }
        $rule=[
          'Ten'=>'required'
        ];
        $message=[
          'required'=>'Truong :attribute bat buoc phai nhap',
        ];
        $request->validate($rule,$message);

        $UpdateCates=[
          $request->Ten
        ];
        $this->category->updateCategory($UpdateCates,$id);
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
            $deteteCate=$this->category->EditCategory($id);
            if(!empty($deteteCate[0])){
                $deteteCate=$this->category->DeleteCategory($id);
                if($deteteCate){
                    $msg="Xóa thành công";
                }else {
                    $msg="Không thể xóa ,vui lòng thử lại";
                }
            }else{
                $msg="Liên kết không tồn tại";
            }
            return redirect()->route('category.index')->with('msg',$msg);
        }
    }
}
