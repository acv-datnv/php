@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Categories
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
                    {!! Form::open(array('route'=>array('category.update',$editCat->id),'method'=>'PUT')) !!}
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" name="name" placeholder="Nhập tên" value="{!! old('txtName',isset($editCat) ? $editCat['name'] : null) !!}" />
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
