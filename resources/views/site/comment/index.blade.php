<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    @yield('meta')
    <title>Site</title>
    <base href="{{asset('')}}}">

    <!-- Bootstrap Core CSS -->
    <link href="admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">


    <div class="container pb-cmnt-container">
        <div class="row">
            <div class="col-md-9">

                <div class="detailBox">
                    <div class="titleBox">
                        <label>Comment Box</label>
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                    </div>
                    <div class="actionBox">
                        <ul class="commentList">
                            <li>
                                <div class="commenterImage">
                                    <img src="http://placekitten.com/45/45" />
                                </div>
                                <div class="commentText">
                                    <p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p>
                                    <span class="date sub-text">on March 5th, 2014</span>
                                </div>
                            </li>
                        </ul>
                        <div class="panel panel-info" style="margin-bottom: 0">
                            <div class="panel-body">
                                <form class="form-inline">
                                    <textarea placeholder="Write your comment here!" class="pb-cmnt-textarea" name="comment"></textarea>
                                    <button class="btn btn-primary" type="button" id="btn-send">Gửi bình luận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .pb-cmnt-container {
            font-family: Lato;
            margin-top: 100px;
        }

        .pb-cmnt-textarea {
            resize: none;
            padding: 15px;
            height: 130px;
            width: 100%;
            border: 1px solid #F2F2F2;
        }

        .detailBox {
            border:1px solid #bbb;
        }
        .titleBox {
            background-color:#fdfdfd;
            padding:10px;
        }
        .titleBox label{
            color:#444;
            margin:0;
            display:inline-block;
        }

        .actionBox .form-group * {
            width:100%;
        }
        .taskDescription {
            margin-top:10px 0;
        }
        .commentList {
            padding:0;
            list-style:none;
            max-height:200px;
            overflow:auto;
        }
        .commentList li {
            margin:0;
            margin-top:10px;
        }
        .commentList li > div {
            display:table-cell;
        }
        .commenterImage {
            width:30px;
            margin-right:5px;
            height:100%;
            float:left;
        }
        .commenterImage img {
            width:100%;
            border-radius:50%;
        }
        .commentText p {
            margin:0;
        }
        .sub-text {
            color:#aaa;
            font-family:verdana;
            font-size:11px;
        }
        .actionBox {
            border-top:1px dotted #bbb;
            padding:10px;
        }
    </style>

    @yield('content')

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="admin_assets/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="admin_assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="admin_assets/dist/js/sb-admin-2.js"></script>

<!-- DataTables JavaScript -->
<script src="admin_assets/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="admin_assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });

    });
</script>
<script type="text/javascript" language="javascript" src="admin_assets/ckeditor/ckeditor.js" ></script>
@yield('script')
</body>

</html>
