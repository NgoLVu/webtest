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
    <form action="{{route('slide.update')}}" method="post">
        @if(session('msg'))
            <div class="alert aler-success">{{session('msg')}}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger text-center">
                <span>{{$errormessage}}</span>
            </div>
        @endif
        <div class="mb-2">
            <label for="name">Tên slide</label>
            <input type="text" class="form-control" name="Ten" id="name_id" placeholder="Tên slide" value="{{old('Ten')??$editSlides->Ten}}">
            @error('Ten')
            <span style="color:red;">{{$message}}</span>

            @enderror

        </div>
        <div class="mb-2">
            <label for="name">Hình Ảnh</label>
            <input type="url" class="form-control" name="HinhAnh" id="name_id" placeholder="Hình ảnh để dưới dạng url" value="{{old('HinhAnh')??$editSlides->HinhAnh}}">
            @error('HinhAnh')
            <span style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="name">Nội Dung</label>
            <textarea name="NoiDung" class="form-control" id="name_id" cols="50" rows="5" placeholder="Nội Dung" value="{{old('NoiDung')??$editSlides->NoiDung}}"></textarea>
           @error('NoiDung')
            <span style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="name">Link</label>
            <input type="text" class="form-control" name="link" id="pass_id" placeholder="Đường link url" value="{{old('link')??$editSlides->link}}">
            @error('link')
            <span style="color:red;">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('slide.index')}}" class="btn btn-warning">Back</a>
        @csrf
    </form>

</div>
</div>
</div>
@endsection
