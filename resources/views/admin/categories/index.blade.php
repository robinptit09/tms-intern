@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <p class="page-header">
                        <small style="color: #0000cc ;font-size: 30px">Danh Sách Danh Mục</small>
                        <a href="{{route('categories.create')}}" class="btn btn-success" style="float: right">Thêm
                        </a>
                    </p>

                </div>

                @if (session('message'))
                    <div class="alert alert-success col-lg-12">
                        {{session('message')}}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Danh Mục</th>
                        <th style="text-align: center">Action</th>
                    </tr>

                    </thead>
                    <tbody>

                    @foreach ($categories as $category)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $category->id }}</td>
                            <td style="text-align: left">{{ $category->name }}</td>
                            <td class="center">
                                <a href="{{route('categories.edit',[$category->id])}}">Edit</a>&nbsp; |&nbsp;
                                <a href="{{route('categories.destroy',[$category->id])}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


@endsection
