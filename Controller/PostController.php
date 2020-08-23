<?php
    session_start();
    include_once SYSTEM_PATH."/Model/Category/CategoryModel.php";
    include_once SYSTEM_PATH."/Model/Post/PostModel.php";

    class PostController {
        public $categoryModel;
        public $postModel;

        public function __construct()
        {
            $this->categoryModel = new CategoryModel();
            $this->postModel = new PostModel();
        }

        function Manage() {
            $posts = $this->postModel->GetPosts();
            require_once SYSTEM_PATH."/View/Admin/Manage-Posts.php";
        }

        function Del() {
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $this->postModel->DeletePost($id);
                header("location: index.php?c=Post&a=Manage&s=true");
            }
        }

        function Restore(){
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $this->categoryModel->RestoreCategory($id);
                header("location: index.php?c=Category&a=Manage&s=true");
            }
        }

        function ForceDel() {
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $this->categoryModel->ForceDeleteCategory($id);
                header("location: index.php?c=Category&a=Manage&s=true");
            }
        }

        function Edit() {
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $post = $this->postModel->GetPost($id);
                $categories = $this->categoryModel->GetCategories();
                require_once SYSTEM_PATH."/View/Admin/Edit-Post.php";
            }
        }

        function Save() {
            if (isset($_POST['update']) && isset($_GET['id'])) {
                    $posttitle = $_POST['posttitle'];
                    $catid = $_POST['category'];
                    $postdetails = $_POST['postdescription'];
                    $arr = explode(" ", $posttitle);
                    $url = implode("-", $arr);
                    $status = 1;
                    $postid = intval($_GET['id']);

                    $this->postModel->UpdatePost($posttitle, $catid, $postdetails, $url, $status, $postid);

                    header("location: index.php?c=Post&a=Edit&id=$postid&s=true");
            }

            if(isset($_POST['submit'])) {
                $categoryName = $_POST['category'];
                $description = $_POST['description'];
                $status = 1;
                $this->categoryModel->AddCategory($categoryName, $description, $status);
                header("location: index.php?c=Category&a=Add&s=true");
            }
        }

        function Add() {
            require_once SYSTEM_PATH."/View/Admin/Add-Category.php";
        }
    }