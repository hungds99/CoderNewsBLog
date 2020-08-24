<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    
    <link rel="stylesheet" href="Assets/css/postbycategory.css" type="text/css">

    <title>Document</title>
</head>
<body>
	<!-- Header -->
	<?php include('includes/Header.php'); ?>
	<!-- End Header -->

           
    <div class="main-content">
    	<div class="container-fluid">
    		
    		<div class="row ">
    			<div class="col col-lg-12 ">
    				<h3>Kết quả theo danh mục : Python</h3>
    			</div>
    		</div>

            <div class="row">
                <!-- Sidebar -->
                <?php include('includes/LeftBar.php'); ?>
                <!-- end sidebar -->

                <!-- postitem -->
                <div class="col col-lg-8 post-items">
                        <div class="grid-container">
                            <?php
                                foreach($posts as $post) { 
                            ?>
                                <!-- Mỗi bài là 1 grid-item -->
                                <div class="grid-item">
                                    <div class="post-item">
                                        <div class="post-pic">
                                            <img src="Assets/images/posts/<?=$post['PostImage']?>" alt="">
                                        </div>
                                        <div class="post-details">
                                            <p> <span><i class="far fa-calendar"></i><?= $post['PostingDate'] ?></span> <span><i class="far fa-comment"></i>5</span><span><i class="fas fa-eye"></i>10</span> </p>
                                            <h3 class="post-title"><?= $post['title'] ?></h3>

                                            <p class="post-intro"><?= $post['PostDetails']?></p>
                                            <button class="btn btn-danger"><a href="index.php?c=Home&a=ViewPost&id=<?= $post['postid'] ?>">Đọc thêm</a></button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                        </div>

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
</body>
</html>