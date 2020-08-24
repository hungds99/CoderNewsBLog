<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="Assets/css/customhomepage.css">

    <title>Trang chủ || Tin tức 24h</title>
</head>
<body>


		<div class="main-menu">
        <div class="navbar-head">
            <h1>Coder News</h1>
        </div>
        <div class="navbar-main" id="navbar-main">
            
            <div class="navigation-bar">
                <ul class="nav">
                    <!-- ============================================= -->
                    <!-- 					 Category 				   -->
                    <!-- ============================================= -->
					<?php
					foreach ($categories as $category) {
					?>
						<li class="nav-item">
							<a href="index.php?c=Category&a=Get&id=<?= $category->id ?>" class="nav-link">
								<i class="fab fa-java"></i>
								<span> <?= $category->CategoryName ?></span>                          
							</a>

							<!-- <div class="sub-category">
								<div class="sub-category-item">Java Core</div>
								<div class="sub-category-item">Java OOP</div>
								<div class="sub-category-item">Java 8</div>
							</div> -->

						</li>
					<?php 
					} 
					?>
                    <!-- ============================================= -->
                    <!-- 					 End Category 			   -->
                    <!-- ============================================= -->

                    
                </ul>
            </div>


            


        </div>

    </div>
           
    <div class="main-content">
    	<div class="container-fluid">
    		
    		<div class="row ">
    			<div class="col col-lg-12 ">
    				<h3>Những bài viết mới nhất</h3>
    			</div>
    			
    		</div>

    		<div class="row " style="height: 450px">
    			
    			<div class="col col-lg-7">
					<?php
					foreach($lastedposts as $lstpost) {
					?>
					
						<div class="latest-post">
							<div class="post-pic">
								<img src="Assets/images/posts/<?= $lstpost['PostImage'] ?>" alt="">
							</div>
							<div class="post-details">
								<p> <span><i class="far fa-calendar"></i><?= $lstpost['PostingDate'] ?></span> <span><i class="far fa-comment"></i>5</span> <span><i class="fas fa-eye"></i>10</span></p>

								<h1 class="post-title"><?= $lstpost['title'] ?></h1>

								<p class="post-intro"><?= $lstpost['PostDetails']?></p>
								<button class="btn btn-danger">Read more </button>
							</div>
						</div>
					<?php
					}
					?>

    			</div>	
    			<div class="col col-lg-5 ">
    				
    				<div class="top-post">
    					<?php
							foreach($topposts as $tppost) {
						?>
							<div class="post-item">
								<div class="post-pic">
									<img src="Assets/images/posts/<?= $tppost['PostImage']?>" alt="">
								</div>
								<div class="post-details">
									<p> <span><i class="far fa-calendar"></i><?= $tppost['PostingDate'] ?></span> <span><i class="far fa-comment"></i>5</span><span><i class="fas fa-eye"></i>10</span> </p>
									<h3 class="post-title"><?= $tppost['title'] ?></h3>

									<p class="post-intro"><?= $tppost['PostDetails']?></p>
									<button class="btn btn-danger">Read more </button>
								</div>
							</div>
    					<?php
							}
						?>
    				</div>

    			</div>
    		</div>

    		<div class="row top-view">
    			
				<?php
					foreach($otherposts as $othpost) {
				?>
					<div class="col col-lg-3">
						<div class="post-item">
								<div class="post-pic">
									<img src="Assets/images/posts/<?= $othpost['PostImage']?>" alt="">
								</div>
								<div class="post-details">
									<p> <span><i class="far fa-calendar"></i><?= $othpost['PostingDate'] ?></span> <span><i class="far fa-comment"></i>5</span><span><i class="fas fa-eye"></i>10</span> </p>
									<h3 class="post-title"><?= $othpost['title'] ?></h3>

									<p class="post-intro"><?= $othpost['PostDetails']?></p>
									<button class="btn btn-danger">Read more </button>
								</div>
						</div>
					</div>
				<?php
					}
				?>
    			
    		</div>
    	</div>

    </div>


    <!-- Custom-post -->

    <div class="custom-post">
		<h3>Bài viết dành riêng cho bạn</h3>
		<?php
			foreach($randomposts as $rndpost) {
		?>
    	<div class="post-item">
    		<div class="post-pic">
				<img src="Assets/images/posts/<?= $rndpost['PostImage']?>" alt="">
    		</div>
    		<div class="post-details">
				<p> <span><i class="far fa-calendar"></i><?= $rndpost['PostingDate'] ?></span> <span><i class="far fa-comment"></i>5</span><span><i class="fas fa-eye"></i>10</span> </p>
				<h3 class="post-title"><?= $rndpost['title'] ?></h3>

				<p class="post-intro"><?= $rndpost['PostDetails']?></p>
				<button class="btn btn-danger">Read more </button>
			</div>
    	</div>
		<?php
			}
		?>

    </div>

    <!-- end custom post -->

    <div class="footer">
    	<div class="container">
    		<div class="row">
    			<div class="col col-lg-4">
    				<div>
    					 <h2><strong>Coder News</strong></h2>
    				<p>Address: 33 Xô Viết Nghệ Tĩnh, Hải Châu, Đà Nẵng </p>
    				<p>Phone: +65 11.188.888</p>
    				<p>Email:hoangvu@gmail.com</p>
    				</div>
    			</div>
    			<div class="col col-lg-4">
    				<div>
    					<h2><strong>Danh mục</strong></h2>
    				    <p>Java</p>
    				    <p>Python</p>
    				    <p>Spring</p>
    				    <p>C++</p>
    				</div>
    			</div>
    			<div class="col col-lg-4">
    				<div>
    					<h2><strong>Follow us</strong></h2>
    				<div class="social-icon">
    					<div><i class="fab fa-facebook-f"></i></div>
    					<div><i class="fab fa-instagram"></i></div>
    					<div><i class="fab fa-twitter"></i></div>
    					<div><i class="fab fa-youtube"></i></div>
    				</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <script src="Assets/js/customhomepage.js"></script>							
</body>
</html>