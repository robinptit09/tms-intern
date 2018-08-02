@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đề thi
                        <small>Danh sách</small>
                    </h1>
                </div>
                <form class="navbar-form navbar-left" role="search" action="{{ route('exam_list') }}" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Tìm câu hỏi" name="search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                @if (session('message'))
                    <div class="alert alert-success col-lg-12">
                        {{session('message')}}
                    </div>
            @endif
            <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Khóa học</th>
                        <th>Mã đề</th>
                        <th>Số câu hỏi</th>
                        <th>Mức độ</th>
                        <th>Thời gian (phút)</th>
                        <th>Trạng thái</th>
                        <th>Edit</th>
                        <th>Detail</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($exams as $exam)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $exam->id }}</td>
                            <th>{{ $exam->course->name }}</th>
                            <td>{{ $exam->code }}</td>
                            <td>{{ $exam->question->count() }}</td>
                            <td>@switch($exam->level)
                                    @case(1)
                                    Dễ
                                    @break

                                    @case(2)
                                    Trung Bình
                                    @break

                                    @default
                                    Khó
                                @endswitch
                            </td>
                            <td>{{ $exam->time }}</td>
                            <td>@if ($exam->status === 1)
                                    Public
                                @else
                                    Private
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('exam_edit', $exam->id) }}">Sửa</a></td>
                            <td class="center"><i class="fa fa-eye fa-fw"></i> <a href="{{ route('exam_detail', $exam->id) }}">Chi tiết</a></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return window.confirm('Bạn muốn xóa?');" href="{{ route('exam_delete', $exam->id) }}"> Xóa</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $exams->appends($_GET)->links('helpers.pagination') }}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
