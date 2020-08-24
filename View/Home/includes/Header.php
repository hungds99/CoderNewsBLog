<div class="main-menu">
    <div class="navbar-head">
        <h1><a href="index.php">Coder News</a></h1>
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
                        <a href="index.php?c=Home&a=GetPostCat&id=<?= $category->id ?>" class="nav-link">
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