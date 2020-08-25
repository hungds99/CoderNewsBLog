<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Vendor/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="Vendor/css/customhomepage.css">

	<!-- Common function -->
	<?php include(SYSTEM_PATH."/View/Home/Includes/Common.php");?>
	<!--  -->

    <title>Trang chủ || Tin tức 24h</title>
</head>
<body>     

	<!-- Header -->
	<?php include(SYSTEM_PATH."/View/Home/Includes/Header.php");?>
	<!-- End Header -->

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
								<img src="Vendor/images/posts/<?= $lstpost['PostImage'] ?>" alt="">
							</div>
							<div class="post-details">
								<p> <span><i class="far fa-calendar"></i> <?= $lstpost['PostingDate'] ?></span> <span><i class="far fa-comment"></i> 5</span> <span><i class="fas fa-eye"></i> 10</span></p>

								<h4 class="post-title"><?= $lstpost['title'] ?></h4>

								<p class="post-intro">
									<?php
										echo SplitStr($lstpost['PostDetails'],300);
									?>
								</p>
								<button class="btn btn-danger"><a href="index.php?c=Home&a=ViewPost&id=<?= $lstpost['postid'] ?>">Đọc thêm</a></button>
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
									<img src="Vendor/images/posts/<?= $tppost['PostImage']?>" alt="">
								</div>
								<div class="post-details">
									<p> <span><i class="far fa-calendar"></i> <?= $tppost['PostingDate'] ?></span> <span><i class="far fa-comment"></i> 5</span><span><i class="fas fa-eye"></i> 10</span> </p>
									<h4 class="post-title"><?= $tppost['title'] ?></h4>

									<p class="post-intro">
										<?php
											echo SplitStr($tppost['PostDetails'],300);
										?>
									</p>
									<button class="btn btn-danger"><a href="index.php?c=Home&a=ViewPost&id=<?= $tppost['postid'] ?>">Đọc thêm</a></button>
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
									<img src="Vendor/images/posts/<?= $othpost['PostImage']?>" alt="">
								</div>
								<div class="post-details">
									<p> <span><i class="far fa-calendar"></i> <?= $othpost['PostingDate'] ?></span> <span><i class="far fa-comment"></i> 5</span> </p>
									<h4 class="post-title"><?= $othpost['title'] ?></h4>

									<p class="post-intro">
										<?php
											echo SplitStr($othpost['PostDetails'],200);
										?>
									</p>
									<button class="btn btn-danger"><a href="index.php?c=Home&a=ViewPost&id=<?= $othpost['postid'] ?>">Đọc thêm</a></button>
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
				<img src="Vendor/images/posts/<?= $rndpost['PostImage']?>" alt="">
    		</div>
    		<div class="post-details">
				<p> <span><i class="far fa-calendar"></i> <?= $rndpost['PostingDate'] ?></span> <span><i class="far fa-comment"></i> 5</span><span><i class="fas fa-eye"></i> 10</span> </p>
				<h4 class="post-title"><?= $rndpost['title'] ?></h4>

				<p class="post-intro">
					<?php
						echo SplitStr($rndpost['PostDetails'],450);
					?>
				</p>
				<button class="btn btn-danger"><a href="index.php?c=Home&a=ViewPost&id=<?= $rndpost['postid'] ?>">Đọc thêm</a></button>
			</div>
    	</div>
		<?php
			}
		?>

    </div>

    <!-- end custom post -->

	<!-- Footer -->
	<?php include(SYSTEM_PATH."/View/Home/Includes/Footer.php");?>
	<!-- End -->

    <script src="Vendor/js/customhomepage.js"></script>							
</body>
</html>