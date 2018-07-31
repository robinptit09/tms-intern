@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bài thi
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Khóa học</label>
                            <select class="form-control" name="idCourse" id="">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Mã đề thi</label>
                            <input class="form-control" name="code" placeholder="Nhập mã đề" value="{{old('code')}}" required="required"/>
                        </div>
                        <div class="form-group">
                            <label>Mức độ</label>
                            <select class="form-control" name="level" id="">
                                <option value="1">Dễ</option>
                                <option value="2">Trung Bình</option>
                                <option value="3">Khó</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thời gian thi (phút)</label>
                            <input class="form-control" name="time" placeholder="Nhập thời gian" value="{{old('time')}}" required="required"/>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <label class="radio-inline">
                                <input name="status" value="0" checked="checked" type="radio">Private
                            </label>
                            <label class="radio-inline">
                                <input name="status" value="1" type="radio">Public
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection

