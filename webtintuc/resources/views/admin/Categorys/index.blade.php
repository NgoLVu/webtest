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
<hr/>
<div class="container">
    <div class="row">
        <div class="col-6 ">
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên Thể loại</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>
        </tr>
    </thead>
    <tbody>
    @if(!empty($categorys))
            @foreach($categorys as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    {{-- <td>{{$item->id}}</td> --}}
                    <td>{{$item->Ten}}</td>
                    <td><a href="{{route('category.edit',['id'=>$item->id])}}" class="btn btn-warning btn-sm">Edit</a></td>
                    <td><a onclick="return confirm('Ban co chac chac muon xoa khong')" href="{{route('category.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                @endforeach
        @else
                <tr>
                    <td colspan="6">Không có thể loại này này</td>
                </tr>
        @endif
    </tbody>
</table>
</div>
{{-- Bảng này thêm mới một danh mục --}}
<div class="col-6 border">
<form action="{{route('category.create')}}" method="post" >
    @csrf
    {{-- @if(session('msg'))
        <div class="alert aler-success">{{session('msg')}}</div>
    @endif --}}
    @if($errors->any())
        <div class="alert alert-danger text-center">
            <span>{{$errormessage}}</span>
        </div>
    @endif
    <div class="text-center">
        <h4>Tạo mới một danh mục</h4>
    </div>
    <div class="mb-3">
        <label for="name">Tên danh mục</label>
        <input type="text" class="form-control" name="Ten" id="tenTheLoai_id" placeholder="Tên danh mục" value="{{old('Ten')}}">
        @error('name')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </div>

</form>
</div>
</div>
<div class="d-flex justify-content-center">{{$categorys->links()}}</div>
</div>
@endsection
