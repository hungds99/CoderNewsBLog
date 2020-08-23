<?php
if (strlen($_SESSION['login']) == 0) {
    header('location: index.php?c=Admin&a=LoginPage');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>Danh mục | Quản lý</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="plugins/switchery/switchery.min.css">
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
                                    <h4 class="page-title">Quản lý danh mục</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="dashboard.php">Bảng điều khiển</a>
                                        </li>
                                        <li class="active">
                                            Quản lý danh mục
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
                                        <div class="m-b-30">
                                            <a href="add-category.php">
                                                <button id="addToTable" class="btn btn-success waves-effect waves-light">Thêm <i class="mdi mdi-plus-circle-outline"></i></button>
                                            </a>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table m-0 table-colored-bordered table-bordered-primary">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Danh mục</th>
                                                        <th>Mô tả</th>
                                                        <th>Ngày tạo</th>
                                                        <th>Ngày sửa</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($categories as $category) {
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?=$category->id?></th>
                                                            <td><?=$category->CategoryName?></td>
                                                            <td><?=$category->Description?></td>
                                                            <td><?=$category->PostingDate?></td>
                                                            <td><?=$category->UpdationDate?></td>
                                                            <td>
                                                                <a href="index.php?c=Category&a=Edit&id=<?=$category->id?>">
                                                                    <i class="fa fa-pencil" style="color: #29b6f6;"></i>
                                                                </a>
                                                                &nbsp;
                                                                <a href="index.php?c=Category&a=Del&id=<?=$category->id?>"> 
                                                                    <i class="fa fa-trash-o" style="color: #f05050"></i>
                                                                </a> 
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
                            <!--- end row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="demo-box m-t-20">
                                        <div class="m-b-30">
                                            <h4><i class="fa fa-trash-o"></i> Danh mục đã xóa</h4>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table m-0 table-colored-bordered table-bordered-danger">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Danh mục</th>
                                                        <th>Mô tả</th>
                                                        <th>Ngày tạo</th>
                                                        <th>Ngày sửa</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($categoriesdel as $categorydel) {
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?=$categorydel->id?></th>
                                                            <td><?=$categorydel->CategoryName?></td>
                                                            <td><?=$categorydel->Description?></td>
                                                            <td><?=$categorydel->PostingDate?></td>
                                                            <td><?=$categorydel->UpdationDate?></td>
                                                            <td>
                                                                <a href="index.php?c=Category&a=Restore&id=<?=$categorydel->id?>">
                                                                    <i class="fa fa-pencil" style="color: #29b6f6;"></i>
                                                                </a>
                                                                &nbsp;
                                                                <a href="index.php?c=Category&a=ForceDel&id=<?=$categorydel->id?>"> 
                                                                    <i class="fa fa-trash-o" style="color: #f05050"></i>
                                                                </a> 
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
            <script src="plugins/switchery/switchery.min.js"></script>

            <!-- App js -->
            <script src="assets/js/jquery.core.js"></script>
            <script src="assets/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>