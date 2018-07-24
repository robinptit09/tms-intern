@extends('frontend.layout.master')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row carousel-holder">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>Khóa học</th>
                        <th>Đề thi</th>
                        <th>Số câu hỏi</th>
                        <th>Mức độ</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exams as $exam)
                        <tr>
                            <td>{{ $exam->course->name }}</td>
                            <td><a href="{{ route('exam',$exam->id) }}">{{ $exam->code }}</a></td>
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
                            <td>Chưa thi</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <!-- end Page Content -->
@endsection