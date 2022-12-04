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
    <a href="{{route('Tintuc.create')}}" class="btn btn-primary">Thêm mới</a>
<hr/>
    <div class="row">
        <div class="col-12">
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tiêu đề</th>
            <th>Tóm tắt</th>
            <th>Nội dung</th>
            <th>Hình ảnh</th>
            <th>Nổi bật</th>
            <th>Thể loại</th>
            <th width="5%">Edit</th>
            <th width="5%">Delete</th>
        </tr>
    </thead>
    <tbody>
    @if(!empty($tintucs))
            @foreach($tintucs as $key=>$item)
                <tr>
                    {{-- <td>{{$key+1}}</td> --}}
                    <td>{{$item->id}}</td>
                    <td>{{$item->TieuDe}}</td>
                    <td>{{$item->TomTat}}</td>
                    <td style="padding: 0"><textarea cols="30" rows="7">{{$item->NoiDung}}</textarea></td>
                    <td ><img src="{{$item->Hinh}}" alt="" width="100px"></td>
                    <td>{{$item->NoiBat}}</td>
                    <td>{{$item->loaitin_name}}</td>

                    <td><a href="{{route('Tintuc.edit',['id'=>$item->id])}}" class="btn btn-warning btn-sm">Edit</a></td>
                    <td><a onclick="return confirm('Ban co chac chac muon xoa khong')" href="{{route('Tintuc.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                @endforeach

        @else
                <tr>
                    <td colspan="6">Không có tin tức nào</td>
                </tr>
        @endif
    </tbody>
</table>
</div>
</div>
<div class="d-flex justify-content-center">{{$tintucs->links()}}</div>
@endsection
