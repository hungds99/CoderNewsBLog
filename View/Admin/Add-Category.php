<?php
if (strlen($_SESSION['login']) == 0) {
    header('location: index.php?c=Admin&a=LoginPage');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Danh mục | Thêm danh mục</title>

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
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php include(SYSTEM_PATH."/View/Admin/Includes/Leftsidebar.php");?>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Thêm danh mục</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php?c=Dashboard&a=Home">Bảng điều khiển</a>
                                        </li>
                                        <li>
                                            <a href="index.php?c=Category&a=Manage">Danh mục</a>
                                        </li>
                                        <li class="active">
                                            Thêm danh mục
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Thêm danh mục </b></h4>
                                    <hr />

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
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal" action="index.php?c=Category&a=Save" name="category" method="post">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Danh mục</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" value="" name="category" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Mô tả</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" rows="5" name="description" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">
                                                        <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                            Thêm
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include(SYSTEM_PATH."/View/Admin/Includes/Footer.php");?>

            </div>
        </div>

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

        <!-- App js -->
        <script src="Vendor/js/jquery.core.js"></script>
        <script src="Vendor/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>