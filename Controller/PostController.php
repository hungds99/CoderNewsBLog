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

           // For adding post  
            if (isset($_POST['submit'])) {
                
                $posttitle = $_POST['posttitle'];
                $catid = $_POST['category'];
                $postdetails = $_POST['postdescription'];
                
                $arr = explode(" ", $posttitle);
                $url = implode("-", $arr);
                $imgfile = $_FILES["postimage"]["name"];

                // get the image extension
                $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
                // allowed extensions
                $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
                // Validation for allowed extensions .in_array() function searches an array for a specific value.
                if (!in_array($extension, $allowed_extensions)) {
                    echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
                } else {
                    //rename the image file
                    $imgnewfile = md5($imgfile) . $extension;
                    // Code for move image into directory
                    move_uploaded_file($_FILES["postimage"]["tmp_name"], "assets/images/posts/" . $imgnewfile);

                    $status = 1;
                    $result = $this->postModel->AddPost($posttitle, $catid, $postdetails, $url, $status, $imgnewfile);
                    if ($result == 1) {
                        header("location: index.php?c=Post&a=Add&s=true");
                    } else {
                        header("location: index.php?c=Post&a=Add&e=true");
                    }
                }
            }
        }

        function Add() {
            $categories = $this->categoryModel->GetCategories();
            require_once SYSTEM_PATH."/View/Admin/Add-Post.php";
        }
    }