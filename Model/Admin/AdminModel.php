<?php
    include_once SYSTEM_PATH."/Common/DBConfig.php";
    include_once "Admin.php";

    class AdminModel {
        
        public $con;

        public function __construct() {
            $this->con = OpenCon();
        }

        function Login($username, $password) {
            $query = "SELECT AdminUserName,AdminEmailId,AdminPassword FROM tbladmin WHERE (AdminUserName='$username' || AdminEmailId='$username')";
            $sql = mysqli_query($this->con, $query);
            $num = mysqli_fetch_array($sql);
            if ($num > 0) {
                $hashpassword = $num['AdminPassword']; // Mật khẩu mã hóa từ DB (Hashed password)
        
                // Kiểm tra mật khẩu
                if (password_verify($password, $hashpassword)) {
                    $_SESSION['login'] = $_POST['username'];
                    return 1; // Đăng nhập thành công
                } else {
                    return 2; // Sai mật khẩu
                }
            }
            // Admin không tồn tại trong DB
            else {
                return 3; 
            }
        }

        function ChangePassword($newhashedpass, $adminid) {
            $query = "UPDATE tbladmin SET AdminPassword='$newhashedpass' WHERE AdminUserName='$adminid'";
            $result = mysqli_query($this->con, $query);
            if($result) {
                return 1;
            } else {
                return 2;
            }
        }

        function CheckExistAdmin($adminid) {
            $query = "SELECT AdminPassword FROM tbladmin WHERE AdminUserName='$adminid' || AdminEmailId='$adminid'";
            $result = mysqli_query($this->con, $query);
            return mysqli_fetch_array($result);
        }

    }