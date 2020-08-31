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
            $query = "SELECT tblposts.id As postid,tblposts.PostTitle As title,tblcategory.CategoryName As category FROM tblposts LEFT JOIN tblcategory ON tblcategory.id=tblposts.CategoryId WHERE tblposts.Is_Active=1";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function GetPost($id) {
            // Cập nhật số lượng lượt xem
            // Cập nhập trước rồi mới load ra
            $this->UpdateCountView($id);
            $query = "SELECT tblposts.id as postid,tblposts.CountView, tblposts.CountComment, tblposts.PostingDate,tblposts.PostImage,tblposts.PostTitle as title,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId WHERE tblposts.id='$id' AND tblposts.Is_Active=1";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function GetLastedPost() {
            $query = "SELECT tblposts.id as postid, tblposts.CountView, tblposts.CountComment, tblposts.PostingDate , tblposts.PostDetails,tblposts.PostImage,tblposts.PostTitle as title,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId WHERE tblposts.Is_Active=1 ORDER BY tblposts.PostingDate DESC LIMIT 7";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function GetRandomPost() {
            $query = "SELECT tblposts.id as postid, tblposts.CountView, tblposts.CountComment, tblposts.PostingDate , tblposts.PostDetails,tblposts.PostImage,tblposts.PostTitle as title,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId WHERE tblposts.Is_Active=1 ORDER BY RAND() LIMIT 5";
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

        function AddPost($posttitle, $catid, $postdetails, $url, $status, $imgnewfile) {
            $query = "INSERT INTO tblposts(PostTitle,CategoryId,PostDetails,PostUrl,Is_Active,PostImage) values(n'$posttitle','$catid','$postdetails','$url','$status','$imgnewfile')";
            $result = mysqli_query($this->conn, $query);
            if($result) {
                return 1;
            } else {
                return 2;
            }
        }

        function GetTrashPosts() {
            $query = "SELECT tblposts.id As postid,tblposts.PostTitle As title,tblcategory.CategoryName As category FROM tblposts LEFT JOIN tblcategory ON tblcategory.id=tblposts.CategoryId WHERE tblposts.Is_Active=0";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function RestorePost($postid) {
            $query = "UPDATE tblposts SET Is_Active=1 WHERE id='$postid'";
            $result = mysqli_query($this->conn, $query);
        }

        function ForceDeletePost($postid) {
            $query = "DELETE FROM tblposts WHERE id='$postid'";
            $result = mysqli_query($this->conn, $query);
        }

        function GetImage($postid) {
            $query = "SELECT PostImage,PostTitle FROM tblposts WHERE id='$postid' AND Is_Active=1";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function ChangeImage($imageurl, $postid) {
            $query = "UPDATE tblposts SET PostImage='$imageurl' WHERE id='$postid'";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return 1;
            } else {
                return 2;
            }
        }

        function GetPostByCategory($categoryId) {
            $query = "SELECT tblposts.id as postid, tblposts.CountView, tblposts.CountComment, tblposts.PostingDate,tblposts.PostImage,tblposts.PostTitle as title,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId WHERE tblposts.CategoryId='$categoryId' AND tblposts.Is_Active=1 LIMIT 6";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function GetPostBySearch($search) {
            $query = "SELECT tblposts.id as postid, tblposts.CountView, tblposts.CountComment, tblposts.PostingDate,tblposts.PostImage,tblposts.PostTitle as title,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId WHERE tblposts.PostTitle LIKE '%$search%' AND tblposts.Is_Active=1 LIMIT 6";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function GetPostLastestBySearch($search) {
            $query = "SELECT tblposts.id as postid, tblposts.CountView, tblposts.CountComment, tblposts.PostingDate,tblposts.PostImage,tblposts.PostTitle as title,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId WHERE tblposts.PostTitle LIKE '%$search%' AND tblposts.Is_Active=1 ORDER BY tblposts.PostingDate DESC LIMIT 3";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function GetPostLastestByCategory($categoryId) {
            $query = "SELECT tblposts.id as postid, tblposts.CountView, tblposts.CountComment, tblposts.PostingDate,tblposts.PostImage,tblposts.PostTitle as title,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId WHERE tblposts.CategoryId='$categoryId' AND tblposts.Is_Active=1 ORDER BY tblposts.PostingDate DESC LIMIT 3";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function UpdateCountView($postid){
            $query = "UPDATE tblposts p SET CountView = p.CountView+1 WHERE id='$postid'";
            mysqli_query($this->conn, $query);
        }
    
        function UpdateCountCommentASC($postid){
            $query = "UPDATE tblposts p SET CountComment = p.CountComment+1 WHERE id='$postid'";
            mysqli_query($this->conn, $query);
        }

        function UpdateCountCommentDESC($postid) {
            $query = "UPDATE tblposts p SET CountComment = p.CountComment-1 WHERE id='$postid'";
            mysqli_query($this->conn, $query);
        }

    }