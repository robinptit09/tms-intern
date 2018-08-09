@extends('frontend.layout.master')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <b>Tất cả các bài viết </b>
                    </div>

                    @foreach($news as $item)
                        @if(isset($item->id))


                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="detail.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="image/320x150.png" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h4>Tên bài viết : {{$item->title}}</h4>
                            <p> Nội dung : {{$item->content}}</p>
                            <a class="btn btn-primary" href="detail.html">View Project <span
                                        class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    @endif
                        @endforeach
                    <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <ul class="pagination">
                                <li>
                                    <a href="#">&laquo;</a>
                                </li>
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li>
                                    <a href="#">4</a>
                                </li>
                                <li>
                                    <a href="#">5</a>
                                </li>
                                <li>
                                    <a href="#">&raquo;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
            </div>

        </div>

    </div>




            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection