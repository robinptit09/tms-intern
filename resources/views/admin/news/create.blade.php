@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin Tức
                        <small>Thêm</small>
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

                    <form action="{{ route('news.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên Bài Viết</label>
                            <input class="form-control" name="title" placeholder="Nhập tên bài viết" value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <label for="category_id">Chọn danh mục:</label>
                            <select class="form-control" id="caregory_id" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nội Dung Bài Viết</label>
                            <textarea class="fotent" id="editor1">{{ old('content') }}</textarea>


                        </div>
                        <button type="submit" class="btn btn-success">Thêm</button>rm-control" name="con

                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
