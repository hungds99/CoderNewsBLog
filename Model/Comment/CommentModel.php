<?php
    include_once SYSTEM_PATH."/Common/DBConfig.php";
    include_once "Comment.php";

    class CommentModel {
        
        public $conn;

        public function __construct() {
            $this->conn = OpenCon();
        }

        function GetApproveComments() {
            $query = "SELECT tblcomments.id, tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle,tblcomments.status  FROM  tblcomments JOIN tblposts ON tblposts.id=tblcomments.postId WHERE tblcomments.status=1";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function GetDisApproveComments() {
            $query = "SELECT tblcomments.id, tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle,tblcomments.status  FROM  tblcomments JOIN tblposts ON tblposts.id=tblcomments.postId WHERE tblcomments.status=0";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }
        
        function DeleteComment($id) {
            $query = "DELETE FROM tblcomments WHERE id='$id'";
            $result = mysqli_query($this->conn, $query);
        }

        function ApproveComment($id) {
            $query = "UPDATE tblcomments SET status='1' WHERE id='$id'";
            $result = mysqli_query($this->conn, $query);
        }

        function DisapproveComment($id) {
            $query = "UPDATE tblcomments SET status='0' WHERE id='$id'";
            $result = mysqli_query($this->conn, $query);
        }

        function GetPostComments($post_id) {
            $query = "SELECT name,comment,postingDate FROM tblcomments WHERE postId='$post_id' AND status=1";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function AddComment($postid,$name,$email,$comment) {
            $query = "INSERT INTO tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment',0)";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return 1;
            } else {
                return 2;
            }
        }

        function GetPostIdByCommentId($id){
            $query = "SELECT postId from tblcomments where id = '$id'";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1)[0];
        }
    }