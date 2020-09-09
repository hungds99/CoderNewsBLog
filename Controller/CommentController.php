<?php
    session_start();
    include_once SYSTEM_PATH."/Model/Comment/CommentModel.php";
    include_once SYSTEM_PATH."/Model/Post/PostModel.php";
    class CommentController {
        public $commentModel;
        public $postModel;

        public function __construct()
        {
            $this->commentModel = new CommentModel();
            $this->postModel = new PostModel();
        }

        function Approve() {
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $this->commentModel->ApproveComment($id);

                // Cập nhật lượt comment tăng
                $postId = $this->commentModel->GetPostIdByCommentId($id);
                $this->postModel->UpdateCountCommentASC($postId['postId']);

                header("location: index.php?c=Comment&a=Disapprove&s=true");
            } else {
                $currentPage = empty($_GET["page"]) ? 1 : $_GET["page"];
                $offset = $currentPage*10 - 10;
                $postTitle = "";
                if(isset($_POST['search'])) {
                    $postTitle = $_POST['search'];
                    $lastPageNumber = ceil($this->commentModel->GetApproveCommentsCountSearch($postTitle) / 10);
                } else {
                    $lastPageNumber = ceil($this->commentModel->GetApproveCommentsCount() / 10);
                }
                $comments = $this->commentModel->GetApproveComments($offset,$postTitle);
                require_once SYSTEM_PATH."/View/Admin/Manage-Comments.php";
            }
        }

        function Disapprove() {
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $this->commentModel->DisapproveComment($id);

                // Cập nhật lượt comment giảm
                $postId = $this->commentModel->GetPostIdByCommentId($id);
                $this->postModel->UpdateCountCommentDESC($postId['postId']);

                header("location: index.php?c=Comment&a=Approve&s=true");
            } else {
                $currentPage = empty($_GET["page"]) ? 1 : $_GET["page"];
                $offset = $currentPage*10 - 10;
                $postTitle = "";
                if(isset($_POST['search'])) {
                    $postTitle = $_POST['search'];
                    $lastPageNumber = ceil($this->commentModel->GetDisApproveCommentsCountSearch($postTitle) / 10);
                } else {
                    $lastPageNumber = ceil($this->commentModel->GetDisApproveCommentsCount() / 10);
                }
                $comments = $this->commentModel->GetDisApproveComments($offset,$postTitle);
                require_once SYSTEM_PATH."/View/Admin/Disapprove-Comments.php";
            }
        }

        function Del() {
            if(isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $this->commentModel->DeleteComment($id);

                 // Cập nhật lượt comment giảm
                if (isset($_GET['pid'])) {
                    $postId = $_GET['pid'];
                    $this->postModel->UpdateCountCommentDESC($postId);
                }

                header("location: index.php?c=Comment&a=Approve&s=true");
            }
        }
    }