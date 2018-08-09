@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin Tức
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

                    <form action="{{ route('news.update',[$news->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Sửa thông tin</label>
                            <input class="form-control" name="title" placeholder="sửa tiêu đề"  value="{{ $news->title }}" />
                            <label>Category</label>
                            <select class="form-control" id="caregory_id" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}} </option>
                                @endforeach
                            </select>

                            <label>Nội Dung Bài Viết</label>
                            <textarea  class="form-control" name="content" id="editor1">{{ empty(old('content')) ? $news->content : old('content') }} </textarea>

                </div>
                        <button type="submit" class="btn btn-success">làm mới</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection