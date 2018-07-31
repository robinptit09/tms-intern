@extends('frontend.layout.master')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row carousel-holder">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    UserName: <strong class="text-nowrap text-">{{ Sentinel::getUser()->first_name }}</strong>
                </div>
                <div class="form-group">
                    Email: <strong class="text-nowrap text-">{{ Sentinel::getUser()->email }}</strong>
                </div>
                <label>Hoạt động</label>
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
                    @foreach($actions as $action)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $action->exam->course->name }}</td>
                        <th>{{ $action->exam->code }}</th>
                        <td>{{ $action->point }}</td>
                        <td>{{ $action->created_at }}</td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-success" href="{{ route('editInfoUser') }}">Thay đổi thông tin</a>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!-- end Page Content -->
@endsection