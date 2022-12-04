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
<div class="col-10 border">
    <form action="{{route('Loaitin.update')}}" method="post">
        @if(session('msg'))
            <div class="alert aler-success">{{session('msg')}}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger text-center">
                <span>{{$errormessage}}</span>
            </div>
        @endif
        <div class="text-center">
            <h4>Cập nhập loại tin</h4>
        </div>
        <div class="mb-3">
            <label for="name">Thể loại</label>
            <select name="idTheLoai" id="" class="form-control">
                <option value="0">
                    Chọn thể loại
                </option>
                @if (!@empty($allGroups)){
                    @foreach ($allGroups as $item )
                    <option value="{{$item->id}}" {{old('idTheLoai')==$item->id || $editLoaitins->idTheLoai==$item->id?'selected':false}}>
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
            <input type="text" class="form-control" name="Ten" id="tenLoaiTin_id" placeholder="Tên loại tin" value="{{old('Ten')??$editLoaitins->Ten}}">
            @error('Ten')
            <span style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('Loaitin.index')}}" class="btn btn-warning">Back</a>
        @csrf
    </form>

</div>
</div>
</div>
@endsection
