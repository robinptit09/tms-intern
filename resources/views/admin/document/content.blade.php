@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                {{--<embed src='{{ asset("admin_asset/document/$document->path") }}' width="1000px" height="1000px"/>--}}
                <iframe src='{{ asset("admin_asset/document/$document->path") }}' style="width: 100%;height: 100%;border: none;"></iframe>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection

