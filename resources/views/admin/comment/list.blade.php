@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Comment
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
                        <th>Nội dung</th>
                        <th>Thuộc bài viết</th>
                        <th>Người bình luận</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listComment as $lc)
                        <tr class="odd gradeX" align="center">
                            <td>{{$lc->id}}</td>
                            <td>{{$lc->content}}</td>
                            <td>{{$lc->post->title}}</td>
                            <td>{{$lc->user->name}}</td>
                            <td class="center">
                              {!! Form::open(array('route'=>array('comment.destroy',$lc->id),'method'=>'DELETE')) !!}
                              <button type="submit">
                                <i class="fa fa-trash-o  fa-fw"></i>Delete
                              </button>
                              {!! Form::close() !!}
                            </td>
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
