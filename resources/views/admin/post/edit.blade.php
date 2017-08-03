@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Post
                        <small>Edit</small>
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
                    {!! Form::open(array('route'=>array('post.update',$editPost->id),'method'=>'PUT')) !!}
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Tác giả</label>
                            <input class="form-control" name="authorName" placeholder="Nhập tác giả" value="{{$editPost->user->name}}" disabled />
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="catId">
                                @foreach ($allCat as $ac)
                                  <option
                                    @if($editPost->category->id == $ac->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$ac->id}}">{{$ac->name}}
                                  </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="title" placeholder="Nhập tiêu đề" value="{!! old('txtTitle',isset($editPost) ? $editPost['title'] : null) !!}" />
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" class="form-control ckeditor">{!! old('txtContent',isset($editPost) ? $editPost['content'] : null) !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <p><img id="displayImage" width="350px" src="uploads/post/{!! old('fImage',isset($editPost) ? $editPost['image'] : null) !!}" alt=""></p>
                            <input type="file" name="fImage" class="form-control" id="btnAddImage" onchange="readURL(this);" />
                        </div>
                        <button type="submit" class="btn btn-default">Edit Post</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    {!! Form::close() !!}
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
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#displayImage').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
