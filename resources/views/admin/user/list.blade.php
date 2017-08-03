@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users
                        <small>list</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="clearfix"></div>

                @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Password</th>
                        <td>Quyền</td>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listUser as $lu)
                        <tr class="odd gradeX" align="center">
                            <td>{{$lu->id}}</td>
                            <td>{{$lu->name}}</td>
                            <td>{{$lu->email}}</td>
                            <td>{{$lu->password}}</td>
                            <td>{{$lu->roles->name}}</td>
                            <td class="center">
                              {!! Form::open(array('route'=>array('user.destroy',$lu->id),'method'=>'DELETE')) !!}
                              <button type="submit">
                                <i class="fa fa-trash-o  fa-fw"></i>Delete
                              </button>
                              {!! Form::close() !!}
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('user.edit',$lu->id) !!}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{ URL::to('admin/user/export') }}"><button class="btn btn-success">Download Excel xls</button></a>
                <a href="{{ URL::to('admin/user/export') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
                <a href="{{ URL::to('admin/user/export') }}"><button class="btn btn-success">Download CSV</button></a>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection
