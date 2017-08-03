@extends('site.layout.index')

@section('meta')
    <meta name="_token" content="{!! csrf_token() !!}" />
@endsection

@section('content')
    <div class="container pb-cmnt-container">
        <div class="row">
            <div class="col-md-9">

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tác giả</th>
                        <th>Category</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Hình ảnh</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX" align="center">
                            <td>{{$findPost->id}}</td>
                            <td>{{$findPost->user->name}}</td>
                            <td>{{$findPost->category->name}}</td>
                            <td>{{$findPost->title}}</td>
                            <td>{{$findPost->content}}</td>
                            <td><img style="max-width: 130px" src="uploads/post/{{$findPost->image}}" alt=""></td>
                        </tr>
                    </tbody>
                </table>

                <div class="detailBox">
                    <div class="titleBox">
                        <label>Comment Box</label>
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                    </div>
                    <div class="actionBox">
                        <ul class="commentList">
                            @include('site.partial.comment')
                        </ul>
                        <div class="panel panel-info" style="margin-bottom: 0">
                            <div class="panel-body">
                                {!! Form::open(array('route'=>array('comment.store'),'method'=>'POST', 'class' => 'form-inline formAddcomment')) !!}
                                    <input type="hidden" value="{{$findPost->id}}" name="postId">
                                    <input type="hidden" value="{{Auth::user()->id}}" name="authorId">
                                    <textarea placeholder="Write your comment here!" class="pb-cmnt-textarea" name="comment"></textarea>
                                    <button class="btn btn-primary" type="submit" id="btn-send">Gửi bình luận</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $('#btn-send').click(function() {
                var inputData = $('.formAddcomment').serialize();

                $.ajax({
                    url: "{!! url('/site/comment') !!}",
                    type: 'POST',
                    data: inputData,
                    success: function( data ) {
                        if (data.success) {
                            $('.commentList').html(data.html);
                        }
                        eval(msg.Script);
                    },
                    error: function( data ) {
                        if ( data.status === 422 ) {
                            toastr.error('Cannot add');
                        }
                    }
                });

                return false;
            });
        });

    </script>
@endsection