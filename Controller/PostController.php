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
            $currentPage = empty($_GET["page"]) ? 1 : $_GET["page"];

            $offset = $currentPage*10 - 10;

            $lastPageNumber = ceil($this->postModel->PostCount() / 10);

            $posts = $this->postModel->GetPosts($offset);
            require_once SYSTEM_PATH."/View/Admin/Manage-Posts.php";
        }

        function Del() {
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $this->postModel->DeletePost($id);
                header("location: index.php?c=Post&a=Manage&s=true");
            }
        }

        function Trash() {
            $posts = $this->postModel->GetTrashPosts();
            require_once SYSTEM_PATH."/View/Admin/Trash-Posts.php";
        }

        function Restore(){
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $this->postModel->RestorePost($id);
                header("location: index.php?c=Post&a=Trash&s=true");
            }
        }

        function ForceDel() {
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $result = $this->postModel->ForceDeletePost($id);
                if($result == 1) {
                    header("location: index.php?c=Post&a=Trash&s=true");
                } else {
                    header("location: index.php?c=Post&a=Trash&e=true");
                }
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
            // Cập nhật bài viết
            if (isset($_POST['update']) && isset($_GET['id'])) {
                    $posttitle = $_POST['posttitle'];
                    $catid = $_POST['category'];
                    $postdetails = $_POST['postdescription'];
                    $arr = explode(" ", $posttitle);
                    $url = implode("-", $arr);
                    $status = 1;
                    $postid = intval($_GET['id']);

                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $UpdationDate = date('Y-m-d H:i:s');

                    $this->postModel->UpdatePost($posttitle, $catid, $postdetails, $url, $status, $postid, $UpdationDate);

                    header("location: index.php?c=Post&a=Edit&id=$postid&s=true");
            }

           // Thêm bài viết mới  
            if (isset($_POST['submit'])) {
                
                $posttitle = $_POST['posttitle'];
                $catid = $_POST['category'];
                $postdetails = $_POST['postdescription'];
                
                $arr = explode(" ", $posttitle);
                $url = implode("-", $arr);
                $imgfile = $_FILES["postimage"]["name"];

                // Lấy đuôi hình ảnh
                $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
                
                // Các đuôi được chấp thuận 
                $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

                // Xác thực hình ảnh
                if (!in_array($extension, $allowed_extensions)) {
                    echo "<script>alert('Định dạng không phù hợp. Chỉ cho phép jpg / jpeg/ png /gif');</script>";
                } else {
                    // Đổi tên hình ảnh
                    $imgnewfile = md5($imgfile) . $extension;

                    // Lưu hình ảnh vào thư mục
                    move_uploaded_file($_FILES["postimage"]["tmp_name"], "Vendor/images/posts/" . $imgnewfile);

                    $status = 1;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $PostingDate = date('Y-m-d H:i:s');
                    $result = $this->postModel->AddPost($posttitle, $catid, $postdetails, $url, $status, $imgnewfile,$PostingDate);
                    
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

        function ChangeImage() {
            if(isset($_GET['id'])) {
                $postid = $_GET['id'];
                $postImage = $this->postModel->GetImage($postid);
                require_once SYSTEM_PATH."/View/Admin/Change-Image.php";
            }
        }

        function SaveImage() {
            if (isset($_POST['update'])) {

                $imgfile = $_FILES["postimage"]["name"];
        
                // Lấy đuôi hình ảnh
                $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        
                // Các đuôi được chấp thuận 
                $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        
                // Các đuôi được chấp thuận 
                if (!in_array($extension, $allowed_extensions)) {
                    echo "<script>alert('Định dạng không phù hợp. Chỉ cho phép jpg / jpeg/ png /gif');</script>";
                } else {
                    // Đổi tên hình ảnh
                    $imgnewfile = md5($imgfile) . $extension;

                    // Lưu hình ảnh vào thư mục
                    move_uploaded_file($_FILES["postimage"]["tmp_name"], "Vendor/images/posts/" . $imgnewfile);
        
                    $postid = intval($_GET['id']);
                    $result = $this->postModel->ChangeImage($imgnewfile, $postid);

                    if ($result == 1) {
                        header("location: index.php?c=Post&a=ChangeImage&id=$postid&s=true");
                    } else {
                        header("location: index.php?c=Post&a=ChangeImage&id=$postid&e=true");
                    }
                }
            }
        }
    }