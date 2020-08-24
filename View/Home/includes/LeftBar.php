<div class="col col-lg-4 ">
    <div class="sidebar_left">

        <!-- input search -->
        <input type="text" class="sidebar_search" placeholder="Search..." >
        <span class="icon_search"><i class="fas fa-search"></i></span>
        <!-- input search -->
        
    <!-- recent post -->
    <h3> <strong>Bài viết gần đây</strong></h3>
    <div class="recent-post">
        <?php
            foreach($postlst as $lpost){
        ?>
            <div class="post-item">
                <div class="post-pic">
                    <img src="Assets/images/posts/<?=$lpost['PostImage']?>" alt="">
                </div>
                <div class="post-details">
                <p> <span><i class="far fa-calendar"></i><?=$lpost['PostingDate']?></span> <span><i class="far fa-comment"></i>5</span><span><i class="fas fa-eye"></i>10</span> </p>
                <h5> <strong><a style="color: black;" href="index.php?c=Home&a=ViewPost&id=<?=$lpost['postid']?>"><?=$lpost['title']?></a></strong> </h5>
                </div>
            </div>
        <?php
            }
        ?>

    </div>
    <!-- end recent post -->

    <!-- tag -->
    <h3><Strong>Tags</Strong></h3>
        <div class="tags">
            <a href="#" class="tag-item">Java</a>
            <a href="#" class="tag-item">Spring</a>
            <a href="#" class="tag-item">Python</a>
            <a href="#" class="tag-item">AI</a>
            <a href="#" class="tag-item">C</a>
        </div>
    <!-- end tag -->

    </div>
    
</div>