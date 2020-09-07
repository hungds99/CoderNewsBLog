<?php
    include_once SYSTEM_PATH."/Model/Category/CategoryModel.php";
    include_once SYSTEM_PATH."/Model/Post/PostModel.php";
    include_once SYSTEM_PATH."/Model/Comment/CommentModel.php";

    class HomeController {
        public $categoryModel;
        public $postModel;
        public $commentModel;

        function __construct()
        {
            $this->categoryModel = new CategoryModel();
            $this->postModel = new PostModel();
            $this->commentModel = new CommentModel();
        }
        

        function Index() {
            if (isset($_GET['q'])) {
                $search = $_GET['q'];

                $currentPage = empty($_GET["page"]) ? 1 : $_GET["page"];

                $offset = $currentPage*6 - 6;

                $lastPageNumber = $this->postModel->GetLastPageNumberBySearch($search);

                $posts = $this->postModel->GetPostBySearch($search, $offset);

                $postlst = $this->postModel->GetPostLastestBySearch($search);
                $categories = $this->categoryModel->GetCategories();
                require_once SYSTEM_PATH."/View/Home/Post-Category.php";
            } else {
                $categories = $this->categoryModel->GetCategories();

                $posts = $this->postModel->GetLastedPost();

                $randomposts = $this->postModel->GetRandomPost();

                $lastedposts = array();
                $topposts = array();
                $otherposts = array();

                $i = 0;
                foreach($posts as $post) {
                    if( $i == 0) {
                        $lastedposts[] = $post;
                    }

                    if($i == 1 || $i == 2) {
                        $topposts[] = $post;
                    }

                    if($i > 2) {
                        $otherposts[] = $post;
                    }

                    $i++;
                }
                require_once SYSTEM_PATH."/View/Home/Home.php";
            }
        }

        function GetPostCat() {
            $categories = $this->categoryModel->GetCategories();
            if (isset($_GET['id'])) {

                $category_id = intval($_GET['id']);
                $currentPage = empty($_GET["page"]) ? 1 : $_GET["page"];

                $offset = 4*$currentPage-4;

                $lastPageNumber = $this->postModel->GetLastPageNumber($category_id);
                
                $posts = $this->postModel->GetPostByCategory($category_id, $offset);
                $postlst = $this->postModel->GetPostLastestByCategory($category_id);
                require_once SYSTEM_PATH."/View/Home/Post-Category.php";
            }
        }

        function ViewPost() {
            if (isset($_GET['id'])) {
                $post_id = intval($_GET['id']);

                // Cập nhật số lượng lượt xem
                // Cập nhập trước rồi mới load ra
                $this->postModel->UpdateCountView($post_id);

                $post = $this->postModel->GetPost($post_id);
                $comments = $this->commentModel->GetPostComments($post_id);
                $categories = $this->categoryModel->GetCategories();
                
                require_once SYSTEM_PATH."/View/Home/View-Post.php";
            }
        }

        function Comment() {
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $comment = $_POST['comment'];
                $postid = intval($_GET['id']);

                $result = $this->commentModel->AddComment($postid,$name,$email,$comment);

                if ($result == 1) {
                    header("location: index.php?c=Home&a=ViewPost&id=$postid&s=true");
                } else {
                    header("location: index.php?c=Home&a=ViewPost&id=$postid&e=true");
                }
            }
        }
    
}