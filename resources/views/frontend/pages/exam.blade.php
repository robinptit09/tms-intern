@extends('frontend.layout.master')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row carousel-holder">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{ route('exam', $exam->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group"><h3>Khóa học: {{ $exam->course->name }}</h3>
                    </div>
                    <div class="form-group"><h3>Đề thi: {{ $exam->code }}</h3>
                    </div>
                @foreach ($questions as $ques)
                    <div class="form-group">
                        <label> {!!$ques->description  !!}</label>

                        <div class="list-group">
                            @foreach ($ques->option as $opt)
                                <div class="list-group-item">
                                    @if($ques->type == 1)
                                        <input type="radio" class="float-right" name="answer[{{ $ques->id }}][]" value="{{ $opt->id }}"/>
                                    @else
                                        <input type="checkbox" class="float-right" name="answer[{{ $ques->id }}][]" value="{{ $opt->id }}"/>
                                    @endif
                                    <span class="text-nowrap">{{ $opt->content }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                    {{ $questions->appends($_GET)->links('helpers.pagination') }}
                    <div class="form-group">
                    <button type="submit" class="btn btn-success">Nộp Bài</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    </div>
    <!-- end Page Content -->
@endsection