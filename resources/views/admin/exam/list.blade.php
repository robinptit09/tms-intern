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

                @if (session('message'))
                    <div class="alert alert-success col-lg-12">
                        {{session('message')}}
                    </div>
            @endif
            <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Khóa học</th>
                        <th>Mã đề</th>
                        <th>Số câu hỏi</th>
                        <th>Mức độ</th>
                        <th>Trạng thái</th>
                        <th>Edit</th>
                        <th>Detail</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($exams as $exam)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $count }}</td>
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
                        @php
                            $count++;
                        @endphp
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
