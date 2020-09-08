<?php
if (strlen($_SESSION['login']) == 0) {
    header('location: index.php?c=Admin&a=LoginPage');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Coder News | Quản lý bình luận</title>
        <link href="Vendor/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/core.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/components.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../Assets/switchery/switchery.min.css">
        <script src="Vendor/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include(SYSTEM_PATH."/View/Admin/Includes/Header.php");?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include(SYSTEM_PATH."/View/Admin/Includes/Leftsidebar.php");?>
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
                                        <strong>Thao tác thành công !</strong> 
                                    </div>
                                <?php } ?>

                                <?php if (isset($_GET['e'])) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Có lỗi xảy ra vui lòng thử lại !</strong>
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
                                                        <th>Bài viết</th>
                                                        <th>Ngày đăng</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $count = 1;
                                                    foreach ($comments as $comment) {
                                                        
                                                    ?>

                                                        <tr>
                                                            <th scope="row"><?=$count?></th>
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
                                                                        <a href="index.php?c=Comment&a=Approve&id=<?=$comment['id']?>" title="Xác thực bình luận" onclick="return confirm('Bạn có muốn xác thực bình luận không ?')"><i class="ion-arrow-return-right" style="color: #29b6f6;"></i></a>
                                                                    <?php else : ?>
                                                                        <a href="index.php?c=Comment&a=Disapprove&id=<?=$comment['id']?>" title="Hủy bình luận" onclick="return confirm('Bạn có muốn hủy bình luận không ?')"><i class="ion-arrow-return-right" style="color: #29b6f6;"></i></a>
                                                                <?php endif; ?>
                                                                    &nbsp;
                                                                        <a href="index.php?c=Comment&a=Del&id=<?=$comment['id']?>" title="Xóa bình luận" onclick="return confirm('Bạn có muốn xóa bình luận không ?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a> </td>
                                                        </tr>
                                                    <?php
                                                    $count++;
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
                    <?php include(SYSTEM_PATH."/View/Admin/Includes/Footer.php");?>
                </div>

            </div>
            <!-- END wrapper -->



            <script>
                var resizefunc = [];
            </script>

            <!-- jQuery  -->
            <script src="Vendor/js/jquery.min.js"></script>
            <script src="Vendor/js/bootstrap.min.js"></script>
            <script src="Vendor/js/detect.js"></script>
            <script src="Vendor/js/fastclick.js"></script>
            <script src="Vendor/js/jquery.blockUI.js"></script>
            <script src="Vendor/js/waves.js"></script>
            <script src="Vendor/js/jquery.slimscroll.js"></script>
            <script src="Vendor/js/jquery.scrollTo.min.js"></script>
            <script src="../Assets/switchery/switchery.min.js"></script>

            <!-- App js -->
            <script src="Vendor/js/jquery.core.js"></script>
            <script src="Vendor/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>