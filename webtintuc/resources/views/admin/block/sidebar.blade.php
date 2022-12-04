<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


<div class="container">
    <ul class="nav flex-column">
      <li class="nav-item">
            <a class="nav-link" href="{{route('trangchu')}}">Trang Chủ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('category.index')}}">Quản Lý Thể loại</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('Loaitin.index')}}">Quản Lý Loại Tin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('Tintuc.index')}}">Quản Lý Tin Tức</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('slide.index')}}">Quản Lý Slide</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('comment')}}">Quản Lý Comment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.index')}}">Quản lý người dùng</a>
      </li>
      <li class="dropdown">
        <button type="button" class="btn btn-private dropdown-toggle text-primary" data-toggle="dropdown">
            Người dùng:
          </button>
        <div class="dropdown-menu">

            @if(Auth::user())
            <a href="#" class="dropdown-item"><i class="fa fa-user fa-fw"></i>{{Auth::user()->name}}</a>
            {{-- <a href="#" class="dropdown-item"><i class="fa-solid fa-gear"></i>Settings </a> --}}
            <a href="{{route('postLogOut')}}" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
            @endif
        </div>
      </li>
    </ul>
  </div>
