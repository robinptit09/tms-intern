@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Môn học
                        <small>Thêm</small>
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

                    @if (session('mess'))
                        <div class="alert alert-success">
                            {{session('mess')}}
                        </div>
                    @endif

                    <form action="" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Khoa</label>
                            <select class="form-control" name="TheLoai">
                                <option value="Công nghệ thông tin">Công nghệ thông tin</option>
                                <option value="Điện tử">Điện tử</option>
                                <option value="Viễn thông">Công nghệ thông tin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên môn học</label>
                            <input class="form-control" name="Ten" placeholder="Nhập tên loại tin" value="{{old('Ten')}}"/>
                        </div>
                        <button type="submit" class="btn btn-default">Add</button>
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
