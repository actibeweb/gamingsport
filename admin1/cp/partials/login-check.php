
<?php

if(!isset($_SESSION['cp_user'])){
    $_SESSION['no-login-message']="";
    header('location:'.SITEURL.'/cp/login.php');
}

?>