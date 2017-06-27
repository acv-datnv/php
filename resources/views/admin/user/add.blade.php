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
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="clearfix"></div>

            @if(count($errors) > 0)
                @foreach($errors->all() as $er)
                    <div class="alert alert-danger">{{$er}}</div>
                @endforeach
            @endif

            @if(session('er_message'))
                <div class="alert alert-success">{{session('er_message')}}</div>
            @endif

            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{!! route('user.store') !!}" method="POST" enctype="multipart/form-data" class="formAddPost">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="txtName" placeholder="Nhập tên user" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <p class="text-danger" id="email-error"></p>
                        <input type="email" class="form-control" name="txtEmail" placeholder="Nhập email" id="email" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="txtPass" placeholder="Nhập password" />
                    </div>
                    <button type="submit" class="btn btn-default">Add user</button>
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
  <script type="text/javascript">
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });

    $('#email').change(function() {
      var inputData = $('.formAddPost').serialize();
      $.ajax({
          url: "{!! url('/admin/user/checkemail') !!}",
          type: 'POST',
          data: inputData,
          success: function( msg ) {
              if ( msg.status === 'success' ) {
                  $('#email-error').html('Email đã tồn tại!!!');
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
