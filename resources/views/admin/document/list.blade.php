@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tài liệu
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
                        <th>Khóa học</th>
                        <th>URL</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($documents as $document)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $document->id }}</td>
                            <td><a href="{{ route('document.show',$document->id) }}" >{{ $document->name }}</a></td>
                            <td>{{ $document->course->name }}</td>
                            <td>{{ $document->slug }}</td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Sửa</a></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return window.confirm('Bạn muốn xóa?');" href="#"> Xóa</a></td>
                        </tr>
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
