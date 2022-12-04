    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('trangchu')}}">LaraNews</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#footer">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="{{route('lienhe')}}">Liên hệ</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search" action="timkiem" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}";>

			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search" name="tukhoa">
			        </div>
			        <button type="submit" class="btn btn-default">Tìm kiếm</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                    @if (!Auth::user())
                    <li>
                        <a href="#">Đăng ký</a>
                    </li>
                    <li>
                        <a href="{{route('Dangnhap_U')}}">Đăng nhập</a>
                    </li>
                    @else
                    <li>
                    	<a>
                    		<span class ="glyphicon glyphicon-user"></span>
                    		{{Auth::user()->name}}
                    	</a>
                    </li>

                    <li>
                    	<a href="{{route('postLogOut_U')}}">Đăng xuất</a>
                    </li>
                    @endif
                    {{-- @if((Auth::user()->group_id)==1)
                    <li>
                    <a href="{{route('home')}}">Quản trị</a>
                    </li>
                    @endif --}}

                </ul>
            </div>



            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
