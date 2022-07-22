
<?php

if(!isset($_SESSION['member_user'])){
    $_SESSION['no-login-message']="";
    header('location:'.SITEURL.'/member/login.php');
}

?>