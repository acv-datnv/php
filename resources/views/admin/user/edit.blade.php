@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users
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
                    {!! Form::open(array('route'=>array('user.update',$editUser->id),'method'=>'PUT')) !!}
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Quyền</label>
                            <select class="form-control" name="role">
                                @foreach ($allRole as $al)
                                  <option
                                    @if($editUser->roles->id == $al->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$al->id}}">{{$al->name}}
                                  </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" name="name" placeholder="Nhập tên" value="{!! old('txtName',isset($editUser) ? $editUser['name'] : null) !!}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Nhập email" value="{!! old('txtEmail',isset($editUser) ? $editUser['email'] : null) !!}" disabled />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Nhập password" value="{!! old('txtPass',isset($editUser) ? $editUser['password'] : null) !!}" disabled />
                        </div>
                        <button type="submit" class="btn btn-default">Edit user</button>
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
