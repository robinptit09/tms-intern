@extends('frontend.layout.master')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row carousel-holder">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                <form action="{{ route('editInfoUser') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        UserName:
                        <input class="form-control" name="first_name" required="required" value="{{ Sentinel::getUser()->first_name }}" placeholder="Username" />
                    </div>
                    <div class="form-group">
                        Email:
                        <input type="email" class="form-control" name="email" required="required" value="{{Sentinel::getUser()->email}}" readonly/>
                    </div>
                    <label>Change password</label>
                    <div class="form-group">
                        New:
                        <input type="password" class="form-control" name="password" required="required" />
                    </div>
                    <div class="form-group">
                        Re-type new:
                        <input type="password" class="form-control" name="passwordAgain" required="required"/>
                    </div>
                    <input type="submit" class="btn btn-success" value="OK">
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!-- end Page Content -->
@endsection