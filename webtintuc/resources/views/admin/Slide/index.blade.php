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
<hr/>
<div class="container">
    <a href="{{route('slide.create')}}" class="btn btn-primary">Thêm mới Slide</a>
    <hr/>
    <div class="row">
        <div class="col-12 ">
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên slide</th>
            <th>Hình ảnh</th>
            <th>Nội dung</th>
            <th>Link</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>
        </tr>
    </thead>
    <tbody>
    @if(!empty($slidelist))
            @foreach($slidelist as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->Ten}}</td>
                    <td><img src="{{$item->HinhAnh}}" alt="" style="height: 80px; width:auto; "></td>
                    <td>{{$item->NoiDung}}</td>
                    <td>{{$item->link}}</td>
                    <td><a href="{{route('slide.edit',['id'=>$item->id])}}" class="btn btn-warning btn-sm">Edit</a></td>
                    <td><a onclick="return confirm('Ban co chac chac muon xoa khong')" href="{{route('slide.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                @endforeach
        @else
                <tr>
                    <td colspan="6">Không có slide này</td>
                </tr>
        @endif
    </tbody>
</table>
</div>
{{-- Bảng này thêm mới một danh mục --}}
</div>
</div>
<div class="d-flex justify-content-center">{{$slidelist->links()}}</div>
@endsection
