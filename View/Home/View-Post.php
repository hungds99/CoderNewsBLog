<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    
    <link rel="stylesheet" href="Assets/css/viewpost.css" type="text/css">

    <title>Document</title>
</head>
<body>
    <!-- Header -->
    <?php include('includes/Header.php'); ?>
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
                                <span><i class="far fa-calendar"></i><?=$p["PostingDate"]?></span> 
                                <span><i class="far fa-comment"></i>5</span> 
                                <span><i class="fas fa-eye"></i>10</span>
                            </p>
                            <p class="post-author"> <span><i class="fas fa-at"></i></span> hoangvu</p>
                            <img src="Assets/images/posts/<?=$p["PostImage"]?>" class="post-img" alt="" srcset="">
                            <p class="post-text">
                                <?=$p["PostDetails"]?>
                            </p>
                        </div>
                    <?php
                        }
                        ?>

                        <!-- comment -->
                        <form action="index.php?c=Home&a=ViewPost&id=<?=$_GET['id']?>" method="post">
                            <div class="form-group form-inline">
                                <input type="text" class="form-control cmt_name" name="name" id="cmt_name" placeholder="Nhập tên*">
                                <input type="text" class="form-control cmt_email" name="email" id="cmt_email" placeholder="Nhập Email*">
                            </div>
                            <textarea class="comment-area" name="comment" id="comment-area" ></textarea>
                            
                            <button class="btn btn-danger" id="btn-addcoment" name="submit">Bình luận</button>
                        </form>
                        <!-- end comment -->

                        <!-- list comments -->
                        <div class="comments" id="comments">
                            <?php
                                foreach($comments as $comment) {
                            ?>
                                <div class="comment-item">
                                    <div class="pic">
                                        <img src="Assets/images/users/avatar-1.jpg" alt="">
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
                <!-- end postitem -->
            </div>
    	</div>
    </div>


    <!-- Custom-post -->

    

    <!-- end custom post -->

    <!-- Footer -->
	<?php include('includes/Footer.php'); ?>
	<!-- End -->

    <script src="Assets/js/customhomepage.js"></script>	
    <script src="Assets/js/post/addcomment.js"></script>						
</body>
</html>