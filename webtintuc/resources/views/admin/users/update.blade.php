@extends('layouts.admin')
@section('title')
{{$title}}
@endsection

@section('content')
<h2>{{$title}}</h2>
<form action="{{route('user.update')}}" method="post">
    @if(session('msg'))
        <div class="alert aler-success">{{session('msg')}}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger text-center">
            <span>{{$errormessage}}</span>
        </div>
    @endif
    <div class="mb-3">
        <label for="name">Tên người dùng</label>
        <input type="text" class="form-control" name="name" id="name_id" placeholder="Tên người dùng" value="{{old('name') ?? $editUsers->name}}" >
        @error('name')
        <span style="color:red;">{{$message}}</span>

        @enderror

    </div>
    <div class="mb-3">
        <label for="name">Email</label>
        <input type="email" class="form-control" name="email" id="name_id" placeholder="Email" value="{{old('email')?? $editUsers->email}}">
        @error('email')
        <span style="color:red;">{{$message}}</span>

        @enderror

    </div>
    <div class="mb-3">
        <label for="name">Nhóm</label>
        <select name="group_id" id="" class="form-control">
            <option value="0">
                Chọn nhóm
            </option>
            @if (!@empty($allGroups))
                @foreach ($allGroups as $item )
                <option value="{{$item->id}}" {{old('groud_id')==$item->id || $editUsers->group_id==$item->id?'selected':false}}>
                    {{$item->Ten}}
                </option>
                @endforeach
            @endif
        </select>
        @error('group_id')
        <span style="color:red;">{{$message}}</span>
        @enderror

    </div>
    <div class="mb-3">
        <label for="name">Mật khẩu</label>
        <input type="text" class="form-control" name="password" id="pass_id" placeholder="Mật khẩu" value="{{old('password')??$editUsers->password}}">
        @error('password')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{route('user.index')}}" class="btn btn-warning">Back</a>
    @csrf
</form>
@endsection
