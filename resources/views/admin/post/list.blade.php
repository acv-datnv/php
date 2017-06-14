@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tức
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
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Hình ảnh</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_post as $lp)
                        <tr class="odd gradeX" align="center">
                            <td>{{$lp->id}}</td>
                            <td>{{$lp->title}}</td>
                            <td>{{$lp->content}}</td>
                            <td><img style="max-width: 130px" src="uploads/post/{{$lp->image}}" alt=""></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/post/delete/{{$lp->id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/post/edit/{{$lp->id}}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

@endsection