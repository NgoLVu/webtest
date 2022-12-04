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
    <div class="row">
        <div class="col-6 ">
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Thể loại</th>
            <th>Tên loại tin</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xóa</th>
        </tr>
    </thead>
    <tbody>
    @if(!empty($loaitins))
            @foreach($loaitins as $key=>$item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->theloai_name}}</td>
                    <td>{{$item->Ten}}</td>
                    <td><a href="{{route('Loaitin.edit',['id'=>$item->id])}}" class="btn btn-warning btn-sm">Edit</a></td>
                    <td><a onclick="return confirm('Ban co chac chac muon xoa khong')" href="{{route('Loaitin.delete',['id'=>$item->id])}}" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
                @endforeach
        @else
                <tr>
                    <td colspan="6">Không có loại tin này</td>
                </tr>
        @endif
    </tbody>
</table>
<div class="d-flex justify-content-center">{{$loaitins->links()}}</div>
</div>
{{-- Bảng này thêm mới một loại tin--}}
<div class="col-6 border">
<form action="{{route('Loaitin.create')}}" method="post" >
    @csrf
    @if($errors->any())
        <div class="alert alert-danger text-center">
            <span>{{$errormessage}}</span>
        </div>
    @endif
    <div class="text-center">
        <h4>Tạo mới một loại tin</h4>
    </div>
    <div class="mb-3">
        <label for="name">Thể loại</label>
        <select name="idTheLoai" id="" class="form-control">
            <option value="0">
                Chọn thể loại
            </option>
            @if (!@empty($allGroups)){
                @foreach ($allGroups as $item )
                <option value="{{$item->id}}" {{old('idTheLoai')==$item->id?'selected':false}}>
                    {{$item->Ten}}
                </option>
                @endforeach
            }
            @endif
        </select>
        @error('idTheLoai')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="name">Tên loại tin</label>
        <input type="text" class="form-control" name="Ten" id="tenLoaiTin_id" placeholder="Tên loại tin" value="{{old('Ten')}}">
        @error('Ten')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </div>

</form>
</div>
</div>
</div>
@endsection
