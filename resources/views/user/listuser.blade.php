@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <p class="page-header">
                        <small style="color: #0000cc ;font-size: 30px">List User</small>
                        <a href="{{url('user/create')}}">
                        <input type="button" name="CreatUser" value="CreatUser" style=" with: 80px ; height: 35px;float: right;color: #FFFFFF ;background-color: #31b131">
                        </a>
                    </p>

                </div>

                @if (session('message'))
                    <div class="alert alert-success col-lg-12">
                        {{session('message')}}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" >
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Email</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th style="text-align: center">Action</th>
                        <th style="text-align: center">Thông tin chi tiết User</th>
                    </tr>

                    </thead>
                    <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($users as $user)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $count }}</td>
                            <th>{{ $user->email }}</th>
                            <td style="text-align: left">{{ $user->first_name }}</td>
                            <td style="text-align: left">{{ $user->last_name }}</td>
                            <td class="center"><a href="user/editUser">Edit</a> &nbsp;| &nbsp;<a href="{{route('user_delete',$user->id)}}">Delete</a></td>
                            <td class="center"><a href="aa">Xem</a> </td>


                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach

                    </tbody>
                </table>


@endsection
