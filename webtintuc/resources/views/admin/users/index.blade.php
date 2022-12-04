<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

@extends('layouts.admin')
@section('title')
{{$title}}
@endsection

@section('content')
<h2>{{$title}}</h2>
@if(session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>

    @endif
{{-- <form action="" method="GET" class="mb-3">
    <div class="row">
        <div class="col-3">
            <select class="form-control" name="group_id">
                <option value="0">All</option>
            </select>
        </div>
        <div class="col-3">
            <select name="" id="" class="form-control" class="status">
                <option value="0">tat ca trang thai</option>
                <option value="active" {{request()->status=='active'?'selected':false}} >kich hoat</option>
                <option value="inactive" {{request()->status=='inactive'?'selected':false}}>chua kich hoat</option>
            </select>
        </div>
        <div class="col-4">
            <input type="search" name="keywords" id="" class="form-control" placeholder="sreach" value="{{request()->keywords}}">

        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-secondary btn-block">Sreach</button>
        </div>
    </div>
</form> --}}
<div class="container">
    <a href="#Them" class="btn btn-primary">Thêm mới</a>
<hr/>
    <div class="row">
        <div class="col-12">
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>name</th>
            <th>email</th>
            <th>Group</th>
            <th>password</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>comment</th>
            <th width="5%">Edit</th>
            <th width="5%">Delete</th>
        </tr>
    </thead>
    <tbody>
    @if(!empty($userslist))
            @foreach($userslist as $key=>$item)
                <tr>
                    {{-- <td>{{$key+1}}</td> --}}
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->group_name}}</td>
                    <td style="max-width: 200px;padding: 0"><textarea cols="20" rows="5">{{$item->password}}</textarea></td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>{{$item->comment}}</td>

                    <td><a href="{{route('user.edit',['id'=>$item->id])}}" class="btn btn-warning btn-sm">Edit</a></td>
                    <td><a onclick="return confirm('Ban co chac chac muon xoa khong')" href="{{route('user.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                @endforeach

        @else
                <tr>
                    <td colspan="6">Khong co nguoi dung</td>
                </tr>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-center">{{$userslist->links()}}</div>
</div>
</div>
<div class="py-5" style="margin-top: 10px"></div>
<div class="row border" >
    <div class="col-12">
<form action="{{route('user.create')}}" method="post" id="Them">
    <h1 class="text-center">Thêm mới</h1>
    <div class="mb-2">
        <label for="name">Tên người dùng</label>
        <input type="text" class="form-control" name="name" id="name_id" placeholder="Tên người dùng" value="{{old('name')}}">
        @error('name')
        <span style="color:red;">{{$message}}</span>

        @enderror

    </div>
    <div class="mb-2">
        <label for="name">Email</label>
        <input type="email" class="form-control" name="email" id="name_id" placeholder="Email" value="{{old('email')}}">
        @error('email')
        <span style="color:red;">{{$message}}</span>

        @enderror

    </div>
    <div class="mb-2">
        <label for="name">Nhóm</label>
        <select name="group_id" id="" class="form-control">
            <option value="0">
                Chọn nhóm
            </option>
            {{-- @if (!@empty($allGroups)){ --}}
                @foreach ($allGroups as $item )
                <option value="{{$item->id}}" {{old('groud_id')==$item->id?'selected':false}}>
                    {{$item->Ten}}
                </option>
                @endforeach
            {{-- }
            @endif --}}
        </select>
        @error('group_id')
        <span style="color:red;">{{$message}}</span>
        @enderror

    </div>
    <div class="mb-2">
        <label for="name">Mật khẩu</label>
        <input type="text" class="form-control" name="password" id="pass_id" placeholder="Mật khẩu" value="{{old('password')}}">
        @error('password')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <button type="reset" class="btn btn-primary">Reset</button>
    <a href="{{route('user.index')}}" class="btn btn-warning">Back</a>
    @csrf
</form>
</div>
</div>
</div>
@endsection
