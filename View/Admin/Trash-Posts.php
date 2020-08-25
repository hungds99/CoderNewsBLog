<?php
if (strlen($_SESSION['login']) == 0) {
    header('location: index.php?c=Admin&a=LoginPage');
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="Vendor/images/favicon.ico">
        <!-- App title -->
        <title>Bài viết | Bài viết bị xóa</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- jvectormap -->
        <link href="plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

        <!-- App css -->
        <link href="Vendor/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/core.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/components.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="plugins/switchery/switchery.min.css">

        <script src="Vendor/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include(SYSTEM_PATH."/View/Admin/Includes/Header.php");?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include(SYSTEM_PATH."/View/Admin/Includes/Leftsidebar.php");?>


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
                                    <h4 class="page-title">Bài viết bị xóa</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php?c=Dashboard&a=Home">Bảng điều khiển</a>
                                        </li>
                                        <li>
                                            <a href="index.php?c=Post&a=Manage">Bài viết</a>
                                        </li>
                                        <li class="active">
                                            Bài viết bị xóa
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
                                <div class="col-sm-12">
                                    <div class="card-box">


                                        <div class="table-responsive">
                                            <table class="table table-colored table-centered table-inverse m-0">
                                                <thead>
                                                    <tr>

                                                        <th>Tiêu đề</th>
                                                        <th>Danh mục</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach ($posts as $post) {
                                                    ?>
                                                        <tr>
                                                            <td><b><?=$post['title']?></b></td>
                                                            <td><?=$post['category']?></td>

                                                            <td>
                                                                <a href="index.php?c=Post&a=Restore&id=<?=$post['postid']?>" onclick="return confirm('Bạn có muốn khôi phục bài viết không ?')"> <i class="ion-arrow-return-right" title="Khôi phục bài viết"></i></a>
                                                                &nbsp;
                                                                <a href="index.php?c=Post&a=ForceDel&id=<?=$post['postid']?>" onclick="return confirm('Bạn có muốn xóa vĩnh viễn bài viết không ?')"><i class="fa fa-trash-o" style="color: #f05050" title="Xóa vĩnh viễn"></i></a>
                                                            </td>
                                                        </tr>
                                                <?php 
                                                        } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div> <!-- container -->

                    </div> <!-- content -->

                    <?php include(SYSTEM_PATH."/View/Admin/Includes/Footer.php");?>

                </div>


                <!-- ============================================================== -->
                <!-- End Right content here -->
                <!-- ============================================================== -->


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
            <script src="plugins/switchery/switchery.min.js"></script>

            <!-- CounterUp  -->
            <script src="plugins/waypoints/jquery.waypoints.min.js"></script>
            <script src="plugins/counterup/jquery.counterup.min.js"></script>

            <!--Morris Chart-->
            <script src="plugins/morris/morris.min.js"></script>
            <script src="plugins/raphael/raphael-min.js"></script>

            <!-- Load page level scripts-->
            <script src="plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
            <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="plugins/jvectormap/gdp-data.js"></script>
            <script src="plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


            <!-- Dashboard Init js -->
            <script src="Vendor/pages/jquery.blog-dashboard.js"></script>

            <!-- App js -->
            <script src="Vendor/js/jquery.core.js"></script>
            <script src="Vendor/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>