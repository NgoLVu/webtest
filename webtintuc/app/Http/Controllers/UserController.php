<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;
use App\Models\Group;
use App\Models\User;
use DB;
use Auth;
//use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;

    const _Per_Name=4;
    public function __construct(){
        $this->user=new UserModel();
    }
    public function index()
    {
        $title='Quản lý người dùng';
        $userslist=$this->user->getAllUsers(self::_Per_Name);

        $errormessage="vui long kiem tra du lieu vao";
        $allGroups=getAllGroup();
        return view('admin.users.index',compact('title','userslist','allGroups','errormessage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Quản Lý người dùng";
        $allGroups=getAllGroup();
        $errormessage="vui long kiem tra du lieu vao";
        return view('admin.users.index',compact('title','errormessage','allGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $AddUsers=[
            $request->name,
            $request->email,
            $request->group_id,
            bcrypt($request->password)
        ];
        $this->user->AddUser($AddUsers);
        return redirect()->route('user.index')->with('msg','Them thanh cong');
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
     $title="Cập nhập người dùng";
      $errormessage="vui long kiem tra du lieu vao";
       if(!empty($id)){
  $editUsers=$this->user->editUser($id);;
  if(!empty($editUsers[0])){
    $request->session()->put('id',$id);
    $editUsers=$editUsers[0];
  }else{
    return redirect()->route('user.index')->with('msg','nguoi dung khong ton tai');
  }
 }else
 {
  return redirect()->route('user.index')->with('msg','Lien ket khong ton tai');
 }
 $allGroups=getAllGroup();
 return view('admin.users.update',compact('title','editUsers','errormessage','allGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        $id=session('id');
        if(empty($id)){
          return back()->with('msg','Lien ket khong ton tai');
        }
        $UpdateUsers=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'group_id'=>$request->group_id,
             'updated_at'=>date('Y-m-d H:i:s')
          ];
        $this->user->updateUser($UpdateUsers,$id);
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
            $deleteUsers=$this->user->editUser($id);
            if(!empty($deleteUsers[0])){
               $deleteUsers= $this->user->deleteUser($id);
               if($deleteUsers){
                $msg="Xoa nguoi dung thanh cong";
               }else{
                $msg="Ban khong the xoa nguoi dung nay ,vui long thu lai";
               }
            }else{
              $msg="nguoi dung khong ton tai";

           }}else{
            $msg="Lien ket khong ton tai";
           }
           return redirect()->route('user.index')->with('msg',$msg);
    }
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

        if(Auth::attempt(['email'=>$request->Email,'password'=>$request->Password])){
            return redirect()->route('comment');
        }else
        {
            return redirect()->route('Dangnhap')->with('msg','Dang nhap khong thanh cong');
        }
    }
}
