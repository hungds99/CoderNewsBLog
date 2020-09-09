<?php
    include_once SYSTEM_PATH."/Common/DBConfig.php";
    include_once "Comment.php";

    class CommentModel {
        
        public $conn;

        public function __construct() {
            $this->conn = OpenCon();
        }

        function GetApproveComments($offset,$post) {
            $query = "SELECT tblcomments.id, tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle,tblcomments.status  FROM  tblcomments JOIN tblposts ON tblposts.id=tblcomments.postId WHERE tblcomments.status=1 AND tblposts.PostTitle LIKE '%$post%' LIMIT 10 offset $offset";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function GetApproveCommentsCount() {
            $query = "SELECT tblcomments.id, tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle,tblcomments.status  FROM  tblcomments JOIN tblposts ON tblposts.id=tblcomments.postId WHERE tblcomments.status=1";
            $result = mysqli_query($this->conn, $query);
            return mysqli_num_rows($result);
        }

        function GetApproveCommentsCountSearch($post) {
            $query = "SELECT tblcomments.id, tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle,tblcomments.status  FROM  tblcomments JOIN tblposts ON tblposts.id=tblcomments.postId WHERE tblcomments.status=1 AND tblposts.PostTitle LIKE '%$post%'";
            $result = mysqli_query($this->conn, $query);
            return mysqli_num_rows($result);
        }

        function GetDisApproveComments($offset, $post) {
            $query = "SELECT tblcomments.id, tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle,tblcomments.status  FROM  tblcomments JOIN tblposts ON tblposts.id=tblcomments.postId WHERE tblcomments.status=0 AND tblposts.PostTitle LIKE '%$post%' LIMIT 10 offset $offset";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function GetDisApproveCommentsCount() {
            $query = "SELECT tblcomments.id, tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle,tblcomments.status  FROM  tblcomments JOIN tblposts ON tblposts.id=tblcomments.postId WHERE tblcomments.status=0";
            $result = mysqli_query($this->conn, $query);
            return mysqli_num_rows($result);
        }

        function GetDisApproveCommentsCountSearch($post){
            $query = "SELECT tblcomments.id, tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle,tblcomments.status  FROM  tblcomments JOIN tblposts ON tblposts.id=tblcomments.postId WHERE tblcomments.status=0 AND tblposts.PostTitle LIKE '%$post%'";
            $result = mysqli_query($this->conn, $query);
            return mysqli_num_rows($result);
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

        function GetCommentsApproveByPostTitle($post) {
            $query = "SELECT tblcomments.id, tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle,tblcomments.status  FROM  tblcomments JOIN tblposts ON tblposts.id=tblcomments.postId AND tblposts.PostTitle LIKE '%$post%' WHERE tblcomments.status=1";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function GetCommentsDisApproveByPostTitle($post) {
            $query = "SELECT tblcomments.id, tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle,tblcomments.status  FROM  tblcomments JOIN tblposts ON tblposts.id=tblcomments.postId AND tblposts.PostTitle LIKE '%$post%' WHERE tblcomments.status=0";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }
    }