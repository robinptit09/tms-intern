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
                                            <input type="radio" class="float-right" name="answer[]" value="{{ $opt->id }}"
                                                   @foreach($question->answer as $ans)
                                                   @if($ans->answer == $opt->id)
                                                   checked="checked"
                                                    @break
                                                    @endif
                                                    @endforeach/>
                                        @else
                                            <input type="checkbox" class="float-right" name="answer[]" value="{{ $opt->id }}"
                                                   @foreach($question->answer as $ans)
                                                   @if($ans->answer == $opt->id)
                                                   checked="checked"
                                                    @break
                                                    @endif
                                                    @endforeach/>
                                        @endif
                                        <span class="text-nowrap">{{ $opt->content }}</span>
                                    </div>
                                @endforeach
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

