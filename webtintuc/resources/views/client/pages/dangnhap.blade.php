 @extends('layouts.client')
 @section('content')
  <!-- Page Content -->
   <div class="container">

    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default panel-primary">
                  <div class="panel-heading">Đăng nhập</div>
                  @if(session('msg'))
                  <div class="alert alert-success text-center">{{session('msg')}}</div>
              @endif
                  <div class="panel-body">
                    <form action="{{route('Dangnhap_U')}}" method="POST">
                        @csrf
                        <div>
                            <label>Email</label>
                              <input type="email" class="form-control" placeholder="Email" name="email"
                              >
                              @error('email')
                              <span style="color: red">{{$message}}</span>
                              @enderror
                        </div>
                        <br>
                        <div>
                            <label>Mật khẩu</label>
                              <input type="password" class="form-control" name="password" placeholder="password">
                              @error('password')
                              <span style="color: red">{{$message}}</span>
                              @enderror
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default btn-primary center-block">Đăng nhập
                        </button>
                    </form>
                  </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->

@endsection
