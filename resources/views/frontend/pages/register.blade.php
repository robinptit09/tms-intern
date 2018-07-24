@extends('frontend.layout.master')

@section('content')

    <div class="container">

        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Đăng ký tài khoản</div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('register') }}" method="POST">
                            {{ csrf_field() }}
                            <div>
                                <label>Họ tên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Username" name="first_name" aria-describedby="basic-addon1" required>
                            </div>
                            <br>

                            <div>
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" required>
                            </div>
                            <br>
                            <div>
                                <label>Nhập mật khẩu <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" placeholder="Password" name="password" aria-describedby="basic-addon1" required>
                            </div>
                            <br>
                            <div>
                                <label>Nhập lại mật khẩu <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="passwordAgain" aria-describedby="basic-addon1" required>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-success" value="Đăng ký">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>

@endsection