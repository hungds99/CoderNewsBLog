<?php
if (strlen($_SESSION['login']) == 0) {
    header('location: index.php?c=Admin&a=LoginPage');
} else {
    // if ($_GET['disid']) {
    //     $id = intval($_GET['disid']);
    //     $query = mysqli_query($con, "update tblcomments set status='0' where id='$id'");
    //     $msg = "Bình luận chưa được chập nhận !";
    // }
    // // Code for restore
    // if ($_GET['appid']) {
    //     $id = intval($_GET['appid']);
    //     $query = mysqli_query($con, "update tblcomments set status='1' where id='$id'");
    //     $msg = "Bình luận đã được chấp nhận !";
    // }

    // // Code for deletion
    // if ($_GET['action'] == 'del' && $_GET['rid']) {
    //     $id = intval($_GET['rid']);
    //     $query = mysqli_query($con, "delete from  tblcomments  where id='$id'");
    //     $delmsg = "Bình luận đã bị xóa vĩnh viễn !";
    // }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Coder News | Quản lý bình luận</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Quản lý bình luận chưa xác nhận</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Bảng điều khiển</a>
                                        </li>
                                        <li>
                                            <a href="#">Bình luận</a>
                                        </li>
                                        <li class="active">
                                            Bình luận chưa xác nhận
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-6">

                                <?php if (isset($_GET['s'])) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Thành công !</strong> 
                                    </div>
                                <?php } ?>

                                <?php if (isset($_GET['e'])) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Thất bại</strong>
                                    </div>
                                <?php } ?>


                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="demo-box m-t-20">

                                        <div class="table-responsive">
                                            <table class="table m-0 table-colored-bordered table-bordered-primary">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tên</th>
                                                        <th>Email</th>
                                                        <th width="300">Bình luận</th>
                                                        <th>Trạng thái</th>
                                                        <th>Bài viết / News</th>
                                                        <th>Ngày đăng</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    foreach ($comments as $comment) {
                                                    ?>

                                                        <tr>
                                                            <th scope="row"><?=$comment['postid']?></th>
                                                            <td><?=$comment['name'] ?></td>
                                                            <td><?=$comment['email'] ?></td>
                                                            <td><?=$comment['comment']?></td>
                                                            <td><?php $st = $comment['status'];
                                                                if ($st == '0') :
                                                                    echo "Wating for approval";
                                                                else :
                                                                    echo "Approved";
                                                                endif;
                                                                ?></td>
                                                            <td><a href="index.php?c=Post&a=Edit&id=<?=$comment['postid']?>"><?=$comment['PostTitle']?></a> </td>
                                                            <td><?=$comment['postingDate']?></td>
                                                            <td>
                                                                <?php if ($st == 0) : ?>
                                                                        <a href="index.php?c=Comment&a=Approve&id=<?=$comment['id']?>" title="Approve this comment"><i class="ion-arrow-return-right" style="color: #29b6f6;"></i></a>
                                                                    <?php else : ?>
                                                                        <a href="index.php?c=Comment&a=Disapprove&id=<?=$comment['id']?>" title="Disapprove this comment"><i class="ion-arrow-return-right" style="color: #29b6f6;"></i></a>
                                                                <?php endif; ?>
                                                                    &nbsp;
                                                                    <a type="button" class="btn" data-toggle="modal" data-target="#exampleModal<?=$comment['id']?>" style="padding: 0;"><i class="fa fa-trash-o" style="color: #29b6f6"></i></a>
                                                                         </td>
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="exampleModal<?=$comment['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">                                                                        
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Thông Báo</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    Bạn có muốn tiếp tục xóa không!.
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                                                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$comment['id']?>"> <i class="fa fa-trash-o" style="color: #f05050"></i></a>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                        </tr>
                                                    <?php
                                                    } ?>
                                                </tbody>

                                            </table>
                                        </div>




                                    </div>

                                </div>


                            </div>
                            <!--- end row -->



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="demo-box m-t-20">
                                        <div class="m-b-30">


                                        </div>





                                    </div>

                                </div>


                            </div>


















                        </div> <!-- container -->

                    </div> <!-- content -->
                    <?php include('includes/footer.php'); ?>
                </div>

            </div>
            <!-- END wrapper -->



            <script>
                var resizefunc = [];
            </script>

            <!-- jQuery  -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/detect.js"></script>
            <script src="assets/js/fastclick.js"></script>
            <script src="assets/js/jquery.blockUI.js"></script>
            <script src="assets/js/waves.js"></script>
            <script src="assets/js/jquery.slimscroll.js"></script>
            <script src="assets/js/jquery.scrollTo.min.js"></script>
            <script src="../plugins/switchery/switchery.min.js"></script>

            <!-- App js -->
            <script src="assets/js/jquery.core.js"></script>
            <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>