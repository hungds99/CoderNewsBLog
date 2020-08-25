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
        <title>Coder New | Cập nhật hình ảnh</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

        <!-- App css -->
        <link href="Vendor/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/core.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/components.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
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
                                    <h4 class="page-title"> Cập nhật hình ảnh </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php?c=Dashboard&a=Home">Bảng điều khiển</a>
                                        </li>
                                        <li>
                                            <a href="index.php?c=Post&a=Manage"> Bài viết </a>
                                        </li>
                                        <li>
                                            <a href="index.php?c=Post&a=Edit&id=<?=$_GET['id']?>"> Sửa bài viết </a>
                                        </li>
                                        <li class="active">
                                            Cập nhật hình ảnh
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
                        </div>
                        <form name="addpost" action="index.php?c=Post&a=SaveImage&id=<?=$_GET["id"]?>" method="post" enctype="multipart/form-data">
                            <?php
                            foreach ($postImage as $img) {
                            ?>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-6">
                                            <div class="">
                                                <form name="addpost" method="post">
                                                    <div class="form-group m-b-20">
                                                        <label for="exampleInputEmail1">Tiêu đề</label>
                                                        <input type="text" class="form-control" id="posttitle" value="<?=$img['PostTitle']?>" name="posttitle" readonly>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card-box">
                                                                <h4 class="m-b-30 m-t-0 header-title"><b>Ảnh hiện tại</b></h4>
                                                                <img src="Vendor/images/posts/<?=$img['PostImage']?>" width="300" />
                                                                <br />

                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>Thêm ảnh mới</b></h4>
                                                            <input type="file" class="form-control" id="postimage" name="postimage" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Cập nhật</button>
                                                </form>
                                            </div>
                                        </div> <!-- end p-20 -->
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->



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
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="Vendor/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="Vendor/js/jquery.core.js"></script>
        <script src="Vendor/js/jquery.app.js"></script>


        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>



    </body>

    </html>
<?php } ?>