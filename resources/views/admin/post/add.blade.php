@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Post
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
                <form action="{!! route('post.store') !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tác giả</label>
                        <input class="form-control" name="txtAuth" placeholder="Nhập tác giả" value="{{Auth::user()->name}}" disabled />
                        <input type="hidden" name="txtUser" value="{{Auth::user()->id}}">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="slcCategory">
                            @if(count($all_cat) > 0)
                              @foreach ($all_cat as $ac)
                                <option value="{{$ac->id}}">{{$ac->name}}</option>
                              @endforeach
                            @else
                              <option>Hãy tạo category trước khi viết bài</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="txtTitle" placeholder="Nhập tiêu đề" />
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="txtContent" class="form-control ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="fImage" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-default">Add Post</button>
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
