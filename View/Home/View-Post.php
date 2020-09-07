<?php
    if (isset($_GET['s'])) {
        echo "<script type='text/javascript'>alert(' Bình luận thành công. Vui lòng chờ phê duyệt !!!');</script>";
    }

    if (isset($_GET['e'])) {
        echo "<script type='text/javascript'>alert(' Bình luận lỗi. Vui lòng thử lại !!!');</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Vendor/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    
    <link rel="stylesheet" href="Vendor/css/viewpost.css" type="text/css">

    <title>Đọc bài viết || Tin tức 24h</title>
</head>
<body>
    <!-- Header -->
    <?php include(SYSTEM_PATH."/View/Home/Includes/Header.php");?>
    <!-- End Header -->

           
    <div class="main-content">
    	<div class="container-fluid">
            <div class="row">
                <!-- postitem -->
                <div class="post_content">
                    <?php
                        foreach($post as $p) {
                    ?>
                        <div>
                            <h1 class="text text-center post-title"> <Strong><?=$p["title"]?></Strong> </h1>
                            <p>
                                <span><i class="far fa-calendar"></i> <?=$p["PostingDate"]?></span> 
                                <span><i class="far fa-comment"></i> <?=$p["CountComment"]?></span> 
                                <span><i class="fas fa-eye"></i> <?=$p["CountView"]?></span>
                            </p>
                            <p class="post-author"> <span><i class="fas fa-at"></i></span> Admin</p>
                            <img src="Vendor/images/posts/<?=$p["PostImage"]?>" class="post-img" alt="" srcset="" style="width: 100%; height: 100%;">
                            <p class="post-text">
                                <?=$p["PostDetails"]?>
                            </p>
                        </div>
                    <?php
                        }
                        ?>

                        
                </div>
                <!-- end postitem -->
                <div class="post_content" style="margin-top:20px; margin-bottom:20px;">
                    <h4>Nhận xét của bạn về bài viết: </h4>
                    <!-- comment -->
                    <form action="index.php?c=Home&a=Comment&id=<?=$_GET['id']?>" method="post">
                            <div class="form-group form-inline">
                                <input type="text" class="form-control cmt_name" name="name" id="cmt_name" placeholder="Nhập tên*" required>
                                <input type="email" class="form-control cmt_email" name="email" id="cmt_email" placeholder="Nhập Email*" require>
                            </div>
                            <textarea class="comment-area" name="comment" id="comment-area" style="padding: 15px;" required></textarea>
                            
                            <button class="btn btn-danger" id="btn-addcoment" name="submit" type="submit">Bình luận</button>
                        </form>
                        <!-- end comment -->

                        <!-- list comments -->
                        <div class="comments" id="comments">
                            <?php
                                foreach($comments as $comment) {
                            ?>
                                <div class="comment-item">
                                    <div class="pic">
                                        <img src="Vendor/images/users/avatar-1.jpg" alt="">
                                    </div>
                                    <div class="comment-text">
                                        <h4><Strong><?=$comment['name']?></Strong></h4>
                                        <small><?=$comment['postingDate']?></small>
                                        <p><?=$comment['comment']?></p>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                        <!-- end list comments -->
                </div>
            </div>
    	</div>
    </div>


    <!-- Custom-post -->

    

    <!-- end custom post -->

    <!-- Footer -->
	<?php include(SYSTEM_PATH."/View/Home/Includes/Footer.php");?>
	<!-- End -->

    <script src="Vendor/js/customhomepage.js"></script>	
    <!-- <script src="Vendor/js/post/addcomment.js"></script>						 -->
</body>
</html>