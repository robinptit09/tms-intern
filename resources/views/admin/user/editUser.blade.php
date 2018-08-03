@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

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

                <form action="{{ route('user_update', [$user->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>FirstName</label>
                        <input class="form-control" name="first_name" placeholder="Nhập firstname" value="{{ $user->first_name }}" />
                        <label>LastName</label>
                        <input class="form-control" name="last_name" placeholder="Nhập lastname" value="{{ $user->last_name }}" />
                        <label>Email</label>
                        <input class="form-control" name="email" placeholder="Nhập lastname" value="{{ $user->email }}" />

                    </div>
                    <button type="submit" class="btn btn-success">Edit</button>

                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection