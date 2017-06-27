@extends('admin.layout.index')

@section('meta')
<meta name="_token" content="{!! csrf_token() !!}" />
@endsection

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
                        <th>Tác giả</th>
                        <th>Category</th>
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
                            <td>{{$lp->user->name}}</td>
                            <td>{{$lp->category->name}}</td>
                            <td>{{$lp->title}}</td>
                            <td>{{$lp->content}}</td>
                            <td><img style="max-width: 130px" src="uploads/post/{{$lp->image}}" alt=""></td>
                            <td class="center">
                              {!! Form::open(['method' => 'DELETE', 'class' => 'formDeletePost', 'action' => ['PostController@destroy', $lp->id]]) !!}
                                {!! Form::button( '<i class="fa fa-trash fa-lg"></i>', ['type' => 'submit', 'class' => 'text-danger btnDeletePost', 'data-id' => $lp->id ] ) !!}
                              {!! Form::close() !!}
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('post.edit',$lp->id) !!}">Edit</a></td>
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

@section('script')
  <script type="text/javascript">
  $(document).ready(function() {

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });

    $('.btnDeletePost').on('click', function(e) {
      var obj = $(this);
      var inputData = $('.formDeletePost').serialize();
      var dataId = $(this).attr('data-id');
      $.ajax({
          url: "{!! url('/admin/post') !!}" + "/" + dataId,
          type: 'POST',
          data: inputData,
          success: function( msg ) {
              if ( msg.status === 'success' ) {
                  $(obj).closest("tr").remove();
              }
              eval(msg.Script);
          },
          error: function( data ) {
              if ( data.status === 422 ) {
                  toastr.error('Cannot delete');
              }
          }
      });

      return false;
    });
  });

  </script>
@endsection
