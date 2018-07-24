@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đề thi: {{ $exam->code }}
                        <a class="btn btn-info" href="{{ route('exam_addQuestion', $exam->id) }}">Thêm câu hỏi</a>
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
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($exam->question as $ques)
                        <div class="form-group">
                            <label>Câu hỏi {{ $i }}: {!!$ques->description  !!} </label>

                            <div class="list-group">
                                @foreach ($ques->option as $opt)
                                    <div class="list-group-item">
                                        @if($ques->type == 1)
                                            <input type="radio" class="float-right"
                                                   @if($opt->id == $ques->answer->answer)
                                                   checked="checked"
                                                   @endif
                                                   disabled/>
                                        @else
                                            @php $answer = explode('-', $ques->answer->answer);

                                            @endphp
                                            <input type="checkbox" class="float-right"
                                                   @foreach($answer as $ans)
                                                   @if($ans == $opt->id)
                                                   checked="checked"
                                                   @break
                                                   @endif
                                                   @endforeach
                                                   disabled/>
                                        @endif
                                        <span class="text-nowrap">{{ $opt->content }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <a href="{{ route('exam_editQuestion' ,$ques->id) }}" class="btn btn-success">Sửa</a>
                            <a href="{{ route('exam_deleteQuestion', $ques->id) }}" class="btn btn-danger" onclick="window.confirm('Are you sure?')">Xóa</a>
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endforeach

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection

