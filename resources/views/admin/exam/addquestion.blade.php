@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Đề thi: {{ $exam->code }}
                        <small>Thêm câu hỏi</small>
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

                    <form action="{{ route('exam_addQuestion',$exam->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Dạng câu hỏi: </label>
                            <label class="radio-inline">
                                <input name="type" value="1" checked="checked" type="radio">Radio button
                            </label>
                            <label class="radio-inline">
                                <input name="type" value="2" type="radio">Checkbox
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Câu hỏi: </label>
                            <textarea class="form-control ckeditor" rows="3" name="description"
                                      required="required">{{old('description')}}</textarea>
                        </div>

                        <div class="form-group" id="insert">
                            <label>Đáp án</label>

                            <div class="list-group-item">
                                <input class="form-control" type="text" name="option[]" required>
                            </div>

                        </div>
                        <button type="button" class=" btn btn-success" id="addAnswer">
                            Thêm đáp án
                        </button>
                        <button type="submit" class="btn btn-default">OK</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

@endsection

@section('script')
    <script>

        $(document).ready(function () {
            $('#addAnswer').click(function () {
                $('#insert').append('<div class="list-group-item"><input class="form-control" type="text" name="option[]" required></div>')
            });
        });

    </script>
@endsection
