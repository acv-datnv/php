@extends('site.layout.index')

@section('content')

<div class="container pb-cmnt-container">
    <div class="row">
        <div class="col-md-9">

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
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listPost as $lp)
                    <tr class="odd gradeX" align="center">
                        <td>{{$lp->id}}</td>
                        <td>{{$lp->user->name}}</td>
                        <td>{{$lp->category->name}}</td>
                        <td>{{$lp->title}}</td>
                        <td>{{$lp->content}}</td>
                        <td><img style="max-width: 130px" src="uploads/post/{{$lp->image}}" alt=""></td>

                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('post-site.show',$lp->id) !!}">Detail</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection