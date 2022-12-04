  @extends('layouts.client')
  @section('content')

  <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintucs->TieuDe}}</h1>

                <!-- Author -->
                <p class="lead">
                    {{-- by <a href="#">admin</a> --}}
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$tintucs->Hinh}}" alt="" style="height:350px ;width: 700px">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on:{{$tintucs->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="">{!! $tintucs->NoiDung !!}</p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                @if(isset($nguoidung))
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" action="comment/{{$tintucs->id}}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="NoiDung"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                @endisset
                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach ($tintucs->comment as $cmt)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cmt->user->name}}
                            <small>{{$cmt->created_at}}</small>
                        </h4>
                        {{$cmt->NoiDung}}
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                        @foreach ($tinlienquan as $tlq)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tlq->id}}.html">
                                    <img class="img-responsive" src="{{$tlq->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="#"><b>{{$tlq->TieuDe}}</b></a>
                            </div>
                            <p style="padding-left: 7px;">{{$tlq->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->

                        @endforeach
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                        @foreach ($tinnoibat as $nb)
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$nb->id}}.html">
                                    <img class="img-responsive" src="{{$nb->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="#"><b>{{$nb->TieuDe}}</b></a>
                            </div>
                            <p style="padding-left: 7px;">{{$nb->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->

                        @endforeach
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

  @endsection
