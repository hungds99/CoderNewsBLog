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
            $sql = mysqli_query($this->conn, $query);
            $countposts = mysqli_num_rows($sql);
            return $countposts;
        }

        function PostCountDel() {
            $query = "SELECT * FROM tblposts WHERE Is_Active=0";
            $sql = mysqli_query($this->conn, $query);
            $countpostsdel = mysqli_num_rows($sql);
            return $countpostsdel;
        }
    }