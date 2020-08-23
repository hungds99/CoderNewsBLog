<?php
    session_start();
    include_once SYSTEM_PATH."/Model/Category/CategoryModel.php";
    include_once SYSTEM_PATH."/Model/Post/PostModel.php";

    class DashboardController {
        public $categoryModel;
        public $postModel;

        public function __construct()
        {
            $this->categoryModel = new CategoryModel();
            $this->postModel = new PostModel();
        }

        function Home() {
            // Đếm số lượng danh mục
            $countcat = $this->categoryModel->CategoryCount();

            // Đếm số lượng bài viết
            $countposts = $this->postModel->PostCount();

            // Đếm số lượng bài viết đã xóa
            $countpostsdel = $this->postModel->PostCountDel();
            
            require_once SYSTEM_PATH."/View/Admin/Dashboard.php";
        }
    }