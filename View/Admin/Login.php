<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Coder News.">
    <meta name="author" content="Dinh Sy Hung">


    <!-- App title -->
    <title>Coder News | Admin Panel</title>

    <!-- App css -->
    <link href="Vendor/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="Vendor/css/core.css" rel="stylesheet" type="text/css" />
    <link href="Vendor/css/components.css" rel="stylesheet" type="text/css" />
    <link href="Vendor/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="Vendor/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="Vendor/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="Vendor/css/responsive.css" rel="stylesheet" type="text/css" />

    <script src="Vendor/js/modernizr.min.js"></script>

</head>


<body class="bg-green" style="background-color: #dced85;">

    <!-- HOME -->
    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="m-t-40 account-pages">
                            <div class="text-center account-logo-box">
                                <h4 class="text-uppercase font-bold m-b-2 text-white">Trang Quản Trị Viên</h4>
                            </div>
                            <div class="account-content" style="background-color: #ffffff;">
                            <?php
                                if(isset($_GET['e'])) {
                                    echo "<small class='text-danger text-center'>Thông tin đăng nhập không đúng !</small>";
                                }
                            ?>
                                <form class="form-horizontal" action="index.php?c=Admin&a=DoLogin" method="post">

                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="text" required="" name="username" placeholder="Username or email" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-xs-12">
                                            <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="login">Đăng Nhập</button>
                                        </div>
                                    </div>

                                </form>

                                <div class="clearfix"></div>

                            </div>
                        </div>
                        <!-- end card-box-->

                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

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

    <!-- App js -->
    <script src="Vendor/js/jquery.core.js"></script>
    <script src="Vendor/js/jquery.app.js"></script>

</body>

</html>