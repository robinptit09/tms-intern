@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khóa học
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
                        <th>Tên</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($courses as $course)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $count }}</td>
                            <td>{{ $course->name }}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('course_edit', $course->id) }}">Sửa</a></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return window.confirm('Bạn muốn xóa?');" href="{{ route('course_delete', $course->id) }}"> Xóa</a></td>
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
