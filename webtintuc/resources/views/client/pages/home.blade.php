@extends('layouts.client')
@section('content')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
        @include('client.block.slide')
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            @include('client.block.menu')
            <div class="col-md-9">
	            <div class="panel panel-default">
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
                        @foreach ($theloais as $key)
                        @if (count($key->loaitin)>0)
					        <div class="row-item row">
		                	<h3>
		                		<a href="category.html">{{$key->Ten}}</a> |
                                @foreach ($key->loaitin as $lt)
		                		<small><a href="loaitin/{{$lt->id}}.html"><i>{{$lt->Ten}}</i></a>/</small>
                                @endforeach
		                	</h3>
                            <?php
                            $data=$key->tintuc->take(5);
                            $tin1=$data->shift();
                            ?>
		                	<div class="col-md-8 border-right">
		                		<div class="col-md-5">
			                        <a href="tintuc/ @if(isset($tin1)) {{$tin1['id']}} @endif.html">
			                            <img class="img-responsive" src="
                                        @if(isset($tin1))
                                        {{$tin1['Hinh']}}
                                        @endif
                                        "
                                        alt="">
			                        </a>
			                    </div>

			                    <div class="col-md-7">
			                        <h3>
                                        @if(isset($tin1))
                                        {{$tin1['TieuDe']}}
                                        @endif
                                    </h3>
			                        <p>
                                         @if(isset($tin1))
                                        {{$tin1['TomTat']}}
                                        @endif
                                    </p>
			                        <a class="btn btn-primary" href="tintuc/ @if(isset($tin1)) {{$tin1['id']}} @endif.html">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
								</div>

		                	</div>
                            {{-- @endforeach --}}

							<div class="col-md-4">
                                @foreach ($data->all() as $tintuc)
								<a href="tintuc/{{$tintuc['id']}}.html">
									<h4>
										{{-- <span class="glyphicon glyphicon-list-alt"></span> --}}
										{{$tintuc['TieuDe']}}
									</h4>
								</a>
                                @endforeach
							</div>

							<div class="break"></div>
		                    </div>
                            {{-- @endforeach --}}
                        @endif
                        @endforeach
		                <!-- end item -->

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>

    <!-- end Page Content -->

    @endsection
