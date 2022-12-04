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
<div class="row" >
    <div class="col-12">
<form action="{{route('Tintuc.create')}}" method="post" id="Them">
    <h1 class="text-center">Thêm mới</h1>
    <div class="mb-2">
        <label for="name">Tiêu đề</label>
        <input type="text" class="form-control" name="TieuDe" id="name_id" placeholder="Tiêu đề" value="{{old('TieuDe')}}">
        @error('TieuDe')
        <span style="color:red;">{{$message}}</span>

        @enderror

    </div>
    <div class="mb-2">
        <label for="name">Tóm tắt</label>
        <input type="text" class="form-control" name="TomTat" id="name_id" placeholder="Tóm tắt" value="{{old('TomTat')}}">
        @error('TomTat')
        <span style="color:red;">{{$message}}</span>

        @enderror

    </div>
    <div class="mb-2">
        <label for="name">Nội Dung</label>
        <textarea name="NoiDung" class="form-control" id="name_id" cols="50" rows="5" placeholder="Nội Dung" value="{{old('NoiDung')}}"></textarea>
       @error('NoiDung')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-2">
        <label for="name">Hình Ảnh</label>
        <input type="url" class="form-control" name="Hinh" id="name_id" placeholder="Hình ảnh để dưới dạng url" value="{{old('Hinh')}}">
        @error('Hinh')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="name">Loại tin</label>
        <select name="idLoaiTin" id="" class="form-control">
            <option value="0">
                Chọn loại tin
            </option>
            {{-- @if (!@empty($allGroups)) --}}
                @foreach ($allGroups as $item )
                <option value="{{$item->id}}" {{old('idLoaiTin')==$item->id?'selected':false}}>
                    {{$item->Ten}}
                </option>
                @endforeach
            {{-- @endif --}}
        </select>
        @error('idLoaiTin')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    <button type="reset" class="btn btn-primary">Reset</button>
    <a href="{{route('Tintuc.index')}}" class="btn btn-warning">Back</a>
    @csrf
</form>
</div>
</div>
@endsection
