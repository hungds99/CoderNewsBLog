<?php
    session_start();
    include_once SYSTEM_PATH."/Model/Admin/AdminModel.php";

    class AdminController {
        public $adminModel;

        public function __construct()
        {
            $this->adminModel = new AdminModel();
        }

        function LoginPage() {
           require_once SYSTEM_PATH."/View/Admin/Login.php";
        }

        function DoLogin() {
            // Kiểm tra username/email và password  
            if(isset($_POST['username']) && isset($_POST['password'])) {
                $uname = $_POST['username'];
                $password = $_POST['password'];
        
                $checkLogin = $this->adminModel->Login($uname, $password);

                if($checkLogin == 1) {
                    header("location: index.php?c=Dashboard&a=Home");
                }

                if($checkLogin == 2 || $checkLogin == 3) {
                    $error = true; 
                    header("location: index.php?c=Admin&a=LoginPage&e=true");
                }
            }
        }

        function ChangePass() {
            require_once SYSTEM_PATH."/View/Admin/Change-Pass.php";
        }

        function SavePass() {
            if (isset($_POST['submit'])) {
                
                // Mã hóa mật khẩu hiện tại 
                $password = $_POST['password'];
                $options = ['cost' => 12];
                $hashedpass = password_hash($password, PASSWORD_BCRYPT, $options);
                $adminid = $_SESSION['login'];
        
                // Mã hóa mật khẩu mới
                $newpassword = $_POST['newpassword'];
                $newhashedpass = password_hash($newpassword, PASSWORD_BCRYPT, $options);
        
                // Thời gian thay đổi mật khẩu
                // date_default_timezone_set('Asia/Ho_Chi_Minh');
                // $currentTime = date('Y-m-d H:i:s');
                
                $checkAdmin = $this->adminModel->CheckExistAdmin($adminid);

                if ($checkAdmin > 0) {
                    $dbpassword = $checkAdmin['AdminPassword'];

                    // Kiểm tra trùng khớp mật khẩu với mật khẩu cũ
                    if (password_verify($password, $dbpassword)) {
                        $result = $this->adminModel->ChangePassword($newhashedpass, $adminid);
                       
                        if ($result == 1) {
                            header("location: index.php?c=Admin&a=ChangePass&s=true");
                        } else {
                            header("location: index.php?c=Admin&a=ChangePass&e=true");
                        }
                    } else {
                        
                        header("location: index.php?c=Admin&a=ChangePass&e=true");
                    }
                } else {
                    header("location: index.php?c=Admin&a=ChangePass&e=true");
                }
            }
        }

    }