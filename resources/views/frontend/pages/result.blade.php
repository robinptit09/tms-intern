@extends('frontend.layout.master')

@section('content')

    <div class="container">

        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr class="text-center">
                    <th>Khóa học</th>
                    <th>Mã đề</th>
                    <th>Điểm</th>
                    <th>Ngày thi</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $check->exam->course->name }}</td>
                        <th>{{ $check->exam->code }}</th>
                        <td>{{ $check->point }}</td>
                        <td>{{ $check->created_at }}</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        <!-- end slide -->
    </div>

@endsection