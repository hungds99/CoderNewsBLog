<?php
    include_once SYSTEM_PATH."/Model/Category/CategoryModel.php";
    include_once SYSTEM_PATH."/Model/Post/PostModel.php";

    class HomeController {
        public $categoryModel;
        public $postModel;

        function __construct()
        {
            $this->categoryModel = new CategoryModel();
            $this->postModel = new PostModel();
        }
        

        function Index() {
            // require_once SYSTEM_PATH."/View/Home/Home.php";
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
            require_once SYSTEM_PATH."/View/Home/CustomHomePage.php";
        }

        function GetPostCat() {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                
            }
        }
    
}