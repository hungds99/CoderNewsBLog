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
                $comments = $this->commentModel->GetApproveComments();
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
                $comments = $this->commentModel->GetDisApproveComments();
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