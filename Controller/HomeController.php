<?php
include "./Common/DBConfig.php";

class HomeController {

    function Index() {
        // require_once SYSTEM_PATH."/View/Home/Home.php";

        require_once SYSTEM_PATH."/View/Home/CustomHomePage.php";
    }
 
}