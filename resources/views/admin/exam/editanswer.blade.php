@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đề thi: {{ $question->exam->code }}
                        <small>Chọn đáp án</small>
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
                    <form action="{{ route('exam_editAnswer', $question->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">

                            <label>Câu hỏi :</label> <label> {!! $question->description !!} </label>

                            <div class="list-group">
                                @foreach ($question->option as $opt)
                                    <div class="list-group-item">
                                        @if($question->type == 1)
                                            <input type="radio" class="float-right" name="radio_answer" value="{{ $opt->id }}"
                                                   @if($opt->id == $question->answer->answer)
                                                   checked="checked"
                                                    @endif/>
                                        @else
                                            @php $answer = explode('-', $question->answer->answer);

                                            @endphp
                                            <input type="checkbox" class="float-right" name="checkbox_answer[]" value="{{ $opt->id }}"
                                                   @foreach($answer as $ans)
                                                   @if($ans == $opt->id)
                                                   checked="checked"
                                                    @break
                                                    @endif
                                                    @endforeach/>
                                        @endif
                                        <span class="text-nowrap">{{ $opt->content }}</span>
                                    </div>
                                @endforeach
                                <input type="hidden" value="{{ $question->answer->id }}" name="idAnswer">
                            </div>
                            <button type="submit" class="btn btn-default">OK</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection

