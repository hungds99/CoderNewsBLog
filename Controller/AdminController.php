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

    }