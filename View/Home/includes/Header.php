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
                            <strong><span>&nbsp;&nbsp;<?= $category->CategoryName ?></span></strong>                       
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
               
                <form class="form-inline" style="margin-top: 6px; position: absolute; right: 110px;" method="get">
                    <input class="form-control mr-sm-2" type="search" name="q" placeholder="Nhập tìm kiếm..." aria-label="Search">
                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
               
                <!-- ============================================= -->
                <!-- 					 End Category 			   -->
                <!-- ============================================= -->

                
            </ul>
        </div>
    </div>
</div>