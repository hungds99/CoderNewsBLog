<?php
    include_once SYSTEM_PATH."/Common/DBConfig.php";
    include_once "Category.php";

    class CategoryModel {
        
        public $conn;

        public function __construct() {
            $this->conn = OpenCon();
        }

        function CategoryCount() {
            $query = "SELECT * FROM tblcategory WHERE Is_Active=1";
            $result = mysqli_query($this->conn, $query);
            $countcat = mysqli_num_rows($result);
            return $countcat;
        }

        function GetCategories() {
            $query = "SELECT id, CategoryName, Description, PostingDate,UpdationDate, Is_Active FROM tblcategory WHERE Is_Active=1";
            $result = mysqli_query($this->conn, $query);

            $categories = [];

            while($data = mysqli_fetch_array($result)){
                $categories[] = new Category($data[0], $data[1],$data[2],$data[3],$data[4],$data[5]);
            }

            return $categories;
        }

        function GetCategoriesDel() {
            $query = "SELECT id, CategoryName, Description, PostingDate,UpdationDate, Is_Active FROM tblcategory WHERE Is_Active=0";
            $result = mysqli_query($this->conn, $query);

            $categoriesdel = [];

            while($data = mysqli_fetch_array($result)){
                $categoriesdel[] = new Category($data[0], $data[1],$data[2],$data[3],$data[4],$data[5]);
            }

            return $categoriesdel;
        }

        function DeleteCategory($id) {
            $query = "UPDATE tblcategory SET Is_Active=0 WHERE id='$id'";
            $result = mysqli_query($this->conn, $query);
        }

        function RestoreCategory($id) {
            $query = "UPDATE tblcategory SET Is_Active=1 WHERE id='$id'";
            $result = mysqli_query($this->conn, $query);
        }

        function ForceDeleteCategory($id) {
            $query = "DELETE FROM tblcategory WHERE id='$id'";
            $result = mysqli_query($this->conn, $query);
        }

        function GetCategory($id) {
            $query = "SELECT id, CategoryName, Description, PostingDate,UpdationDate, Is_Active FROM tblcategory WHERE Is_Active=1 AND id='$id'";
            $result = mysqli_query($this->conn, $query);
            return $result->fetch_all(1);
        }

        function UpdateCategory($id, $categoryName, $updationDate, $description) {
            $query = "UPDATE tblcategory SET CategoryName='$categoryName', UpdationDate='$updationDate', Description='$description' WHERE id='$id'";
            $result = mysqli_query($this->conn, $query);
        }

        function AddCategory($categoryName, $description, $status, $PostingDate) {
            $query = "INSERT INTO tblcategory(CategoryName,PostingDate,Description,Is_Active) VALUES ('$categoryName','$PostingDate','$description','$status')";
            $result = mysqli_query($this->conn, $query);
        }

    }