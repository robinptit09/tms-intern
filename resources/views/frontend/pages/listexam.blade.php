@extends('frontend.layout.master')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row carousel-holder">
            <div class="col-md-6">
                <form class="navbar-form navbar-left" role="search" action="{{ route('listCourse',$id) }}" method="GET">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <input type="text" class="form-control" placeholder="Search" name="search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
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
                            <td>
                                @foreach($action as $act)
                                    @if($act->idExam == $exam->id)
                                        Đã thi
                                        @break
                                    @endif
                                @endforeach
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $exams->appends($_GET)->links('helpers.pagination') }}
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5"><strong>Top điểm</strong>
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>Đề thi</th>
                        <th>Họ Tên</th>
                        <th>Điểm</th>
                        <th>Ngày thi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($maxPoint as $max)
                        <tr>
                            <td>{{ $max->exam->code }}</td>
                            <td>{{ $max->user->first_name }} {{ $max->user->last_name }}</td>
                            <td>{{ $max->point }}</td>
                            <td>{{ $max->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end Page Content -->
@endsection