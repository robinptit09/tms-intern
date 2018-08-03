<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('index') }}">Trang chủ</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Khóa Học
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($courses as $course)
                            <li><a href="#">{{ $course->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="#">Tin Tức</a></li>
                <li><a href="#">Tài Liệu</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Thi Online
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($courses as $course)
                            <li><a href="{{ route('listCourse', $course->id) }}">{{ $course->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            {{--<form class="navbar-form navbar-left" role="search">--}}
                {{--<div class="form-group">--}}
                    {{--<input type="text" class="form-control" placeholder="Search">--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-default">Submit</button>--}}
            {{--</form>--}}

            <ul class="nav navbar-nav pull-right">


                @if ($user = Sentinel::getUser())
                    <li>
                        <a href="{{ route('user') }}"><span class="glyphicon glyphicon-user"></span> {{$user->first_name}}</a>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}">Đăng xuất</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('register') }}">Đăng ký</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">Đăng nhập</a>
                    </li>
                @endif


            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
