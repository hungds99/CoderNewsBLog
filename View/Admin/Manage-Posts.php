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
        <title>Bài viết | Quản lý</title>

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="Assets/morris/morris.css">

        <!-- jvectormap -->
        <link href="Assets/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

        <!-- App css -->
        <link href="Vendor/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/core.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/components.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="Vendor/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="Assets/switchery/switchery.min.css">

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
                                    <h4 class="page-title"> Quản lý bài viết </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php?c=Dashboard&a=Home">Bảng điểu khiển</a>
                                        </li>
                                        <li>
                                            <a href="index.php?c=Post&a=Manage">Bài viết</a>
                                        </li>
                                        <li class="active">
                                            Quản lý bài viết
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

                                    <div class="row m-b-30">
                                        <div class="col-sm-2">
                                            <a href="index.php?c=Post&a=Add">
                                                <button id="addToTable" class="form-control btn btn-success waves-effect waves-light">Thêm <i class="mdi mdi-plus-circle-outline"></i></button>
                                            </a>
                                        </div>
                                        
                                        <div class="col-sm-5"></div>
                                        
                                        <form action="index.php?c=Post&a=Manage" method="POST" name="searchForm">
                                            <div class="col-sm-2">
                                                <select class="form-control" name="category">
                                                    <option value=""> Chọn danh mục </option>
                                                    <?php
                                                        foreach($categories as $category) {
                                                    ?>
                                                        <option value=<?=$category->id?>> <?=$category->CategoryName?> </option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>  
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" placeholder="Nhập tìm kiếm" name="search">
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="submit" class="form-control btn btn-primary" value="Tìm">
                                            </div>
                                        </form>
                                    </div> 

                                    <div class="table-responsive">
                                        <table class="table table-colored table-centered table-inverse m-0">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tiêu đề</th>
                                                    <th>Danh mục</th>
                                                    <th>Ngày tạo</th>
                                                    <th>Ngày sửa</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(count($posts) == 0) {
                                                ?>
                                                    <tr class="text-center">
                                                        <td colspan="6">Không tồn tại kết quả tìm kiếm ...</td>
                                                    </tr>
                                                <?php
                                                    } else {
                                                        $count = 1;
                                                        foreach ($posts as $post) {
                                                ?>
                                                        <tr>
                                                            <td><?=$count?></td>
                                                            <td><b><?=$post['title']?></b></td>
                                                            <td><?=$post['category']?></td>
                                                            <td><?=$post['PostingDate']?></td>
                                                            <td><?=$post['UpdationDate']?></td>
                                                            <td><a href="index.php?c=Post&a=Edit&id=<?=$post['postid']?>"><i class="fa fa-pencil" style="color: #29b6f6;" title="Sửa bài viết"></i></a>
                                                                &nbsp;<a href="index.php?c=Post&a=Del&id=<?=$post['postid']?>" onclick="return confirm('Bạn có muốn xóa bài viết ?')"> <i class="fa fa-trash-o" style="color: #f05050" title="Xóa bài viết"></i></a> </td>
                                                        </tr>
                                                     <?php
                                                        $count++; 
                                                     }
                                                    }
                                                    ?>


                                            </tbody>
                                        </table>
                                       
                                        <?php
                                            if(count($posts) > 0) {
                                        ?>
                                            <div class="pagination">
                                                <ul class="pageNav-main">
                                                    <li> <a href="index.php?c=Post&a=Manage&page=1">First</a></li>
                                                    <li> <a href="index.php?c=Post&a=Manage&page=<?=$currentPage-1?>" <?= ($currentPage==1)?'style="pointer-events:none"':'' ?> ><i class="mdi mdi-chevron-left"></i></a></li>
                                                    <li> <a href="" class="currentPage"><?=$currentPage?></a></li>
                                                    <li> <a href="index.php?c=Post&a=Manage&page=<?=$currentPage+1?>" <?= ($currentPage==$lastPageNumber)?'style="pointer-events:none"':'' ?>><i class="mdi mdi-chevron-right"></i></a></li>
                                                    <li> <a href="index.php?c=Post&a=Manage&page=<?=$lastPageNumber?>">Last</a></li>
                                                </ul>
                                            </div>
                                        <?php
                                            }
                                        ?>
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
        <script src="Assets/switchery/switchery.min.js"></script>

        <!-- CounterUp  -->
        <script src="Assets/waypoints/jquery.waypoints.min.js"></script>
        <script src="Assets/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
        <script src="Assets/morris/morris.min.js"></script>
        <script src="Assets/raphael/raphael-min.js"></script>

        <!-- Load page level scripts-->
        <script src="Assets/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="Assets/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="Assets/jvectormap/gdp-data.js"></script>
        <script src="Assets/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


        <!-- Dashboard Init js -->
        <script src="Vendor/pages/jquery.blog-dashboard.js"></script>

        <!-- App js -->
        <script src="Vendor/js/jquery.core.js"></script>
        <script src="Vendor/js/jquery.app.js"></script>

    </body>

    </html>
<?php } ?>