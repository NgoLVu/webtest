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
<div class="col-6 border">
    <form action="{{route('category.update')}}" method="post">
        @if(session('msg'))
            <div class="alert aler-success">{{session('msg')}}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger text-center">
                <span>{{$errormessage}}</span>
            </div>
        @endif
        <div class="mb-4">
            <label for="name">Tên danh mục</label>
            <input type="text" class="form-control" name="Ten" id="name_id" placeholder="CategoryName" value="{{old('Ten') ?? $editCategorys->Ten}}">
            @error('name')
            <span style="color:red;">{{$message}}</span>

            @enderror

        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('category.index')}}" class="btn btn-warning">Back</a>
        @csrf
    </form>

</div>
</div>
</div>
@endsection
