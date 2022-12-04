@extends('layouts.client')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('client.block.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>{{$loaitins->Ten}}</b></h4>
                    </div>
                    @foreach ($tintucs as $key)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="tintuc/{{$key->id}}.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="{{$key->Hinh}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3>{{$key->TieuDe}}</h3>
                            <p>{{$key->TomTat}}</p>
                            <a class="btn btn-primary" href="tintuc/{{$key->id}}.html">Xem Thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    @endforeach
                    <!-- /.row -->
                    {{-- Phân trang --}}
                    <div class="d-flex justify-content-center" style="text-align: center;">{{$tintucs->links()}}</div>

                </div>
            </div>

        </div>

    </div>
    <!-- end Page Content -->

    @endsection
