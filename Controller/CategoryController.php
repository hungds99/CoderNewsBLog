<?php
    session_start();
    include_once SYSTEM_PATH."/Model/Category/CategoryModel.php";
    include_once SYSTEM_PATH."/Model/Post/PostModel.php";

    class CategoryController {
        public $categoryModel;
        public $postModel;

        public function __construct()
        {
            $this->categoryModel = new CategoryModel();
            $this->postModel = new PostModel();
        }

        function Manage() {
            $categories = $this->categoryModel->GetCategories();
            $categoriesdel = $this->categoryModel->GetCategoriesDel();
            require_once SYSTEM_PATH."/View/Admin/Manage-Categories.php";
        }

        function Del() {
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $this->categoryModel->DeleteCategory($id);
                header("location: index.php?c=Category&a=Manage&s=true");
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
                $categories = $this->categoryModel->GetCategory($id);
                require_once SYSTEM_PATH."/View/Admin/Edit-Category.php";
            }
        }

        function Save() {
            if(isset($_POST['submit'])) {
                $categoryName = $_POST['category'];
                $description = $_POST['description'];
                $status = 1;
                $this->categoryModel->AddCategory($categoryName, $description, $status);
                header("location: index.php?c=Category&a=Add&s=true");
            }
        }

        function SaveEdit() {
            if (isset($_POST['edit']) && isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $categoryName = $_POST['category'];
                $description = $_POST['description'];

                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $updationDate = date('Y-m-d H:i:s');

                $this->categoryModel->UpdateCategory($id, $categoryName, $updationDate, $description);
                header("location: index.php?c=Category&a=Edit&id=$id&s=true");
            } else {
                $id = intval($_GET['id']);
                header("location: index.php?c=Category&a=Edit&id=$id&e=true");
            }
        }

        function Add() {
            require_once SYSTEM_PATH."/View/Admin/Add-Category.php";
        }

    }