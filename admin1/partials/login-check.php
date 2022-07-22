
<?php

if(!isset($_SESSION['user'])){
    $_SESSION['no-login-message']="";
    header('location:'.SITEURL.'/admin/login.php');
    // echo("<script>location.href = '".SITEURL."/admin/index.php';</script>");
}


?>