<?php
    include_once SYSTEM_PATH."/Common/DBConfig.php";
    include_once "Post.php";

    class PostModel {
        
        public $conn;

        public function __construct() {
            $this->conn = OpenCon();
        }

        function PostCount() {
            $query = "SELECT * FROM tblposts WHERE Is_Active=1";
            $result = mysqli_query($this->conn, $query);
            $countposts = mysqli_num_rows($result);
            return $countposts;
        }

        function PostCountDel() {
            $query = "SELECT * FROM tblposts WHERE Is_Active=0";
            $sql = mysqli_query($this->conn, $query);
            $countpostsdel = mysqli_num_rows($sql);
            return $countpostsdel;
        }

        function GetPosts() {
            $query = "SELECT tblposts.id As postid,tblposts.PostTitle As title,tblcategory.CategoryName As category FROM tblposts LEFT JOIN tblcategory ON tblcategory.id=tblposts.CategoryId WHERE tblposts.Is_Active=1 ";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function GetPost($id) {
            $query = "SELECT tblposts.id as postid, tblposts.PostImage,tblposts.PostTitle as title,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId WHERE tblposts.id='$id' AND tblposts.Is_Active=1";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function DeletePost($id) {
            $query = "UPDATE tblposts SET Is_Active=0 WHERE id='$id'";
            $result = mysqli_query($this->conn, $query);
        }

        function UpdatePost($posttitle, $catid, $postdetails, $url, $status, $postid) {
            $query = "UPDATE tblposts SET PostTitle='$posttitle',CategoryId='$catid',PostDetails='$postdetails',PostUrl='$url',Is_Active='$status' where id='$postid'";
            $result = mysqli_query($this->conn, $query);
        }
    }