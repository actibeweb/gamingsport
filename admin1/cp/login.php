<?php
include('../config/constants.php');



$error = NULL;

if (isset($_SESSION['username'])) {
  header("Location: index.php");
}

?>






<?php

if (isset($_SESSION['login'])) {

  echo $_SESSION['login'];
  unset($_SESSION['login']);
}
if (isset($_SESSION['no-login-message'])) {

  echo $_SESSION['no-login-message'];
  unset($_SESSION['no-login-message']);
}
?>





<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from www.ecommerce-admin.com/demo/page-account-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Feb 2022 16:14:22 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Channel Partner Admin : Real Estates's Marketing</title>

  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

  <link href="css/bootstrapf9e3.css?v=1.1" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="fonts/material-icon/css/round.css" />

  <!-- custom style -->
  <link href="css/uif9e3.css?v=1.1" rel="stylesheet" type="text/css" />
  <link href="css/responsivef9e3.css?v=1.1" rel="stylesheet" />

</head>

<body>

  <b class="screen-overlay"></b>

  <main>
    <header class="main-header navbar">
      <div class="col-brand">
      <a href="index.php" class="brand-wrap" style="font-size: 2vw;text-decoration: none;">
        CP Admin

      </a>
      </div>
      <div class="col-nav">
        <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="md-28 material-icons md-menu"></i> </button>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link btn-icon" onclick="darkmode(this)" title="Dark mode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
          </li>
         
        </ul>
      </div>
    </header>

    <section class="content-main">

      <!-- ============================ COMPONENT LOGIN   ================================= -->
      <div class="card shadow mx-auto" style="max-width: 380px; margin-top:100px;">
        <div class="card-body">
          <h4 class="card-title mb-4">Sign in</h4>
          <form method="POST" action="">

            <div class="mb-3">
              <input class="form-control" name="cp_username" placeholder="Username" type="text">
            </div> <!-- form-group// -->
            <div class="mb-3">
              <input class="form-control" name="cp_password" placeholder="Password" type="password">
            </div> <!-- form-group// -->

            <div class="mb-3">
            
            </div>
            <!-- form-group form-check .// -->
            <div class="mb-4">
              <button type="submit" name="submit" class="btn btn-primary w-100"> Login </button>
            </div> <!-- form-group// -->
          </form>



        </div> <!-- card-body.// -->
      </div> <!-- card .// -->


      <!-- ============================ COMPONENT LOGIN  END.// ================================= -->

    </section> <!-- content-main end// -->
  </main>

  <script>
    if (localStorage.getItem("darkmode")) {
      var body_el = document.body;
      body_el.className += 'dark';
    }
  </script>

  <script src="js/jquery-3.5.0.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- Custom JS -->
  <script src="js/scriptc619.js?v=1.0"></script>

</body>

<!-- Mirrored from www.ecommerce-admin.com/demo/page-account-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Feb 2022 16:14:22 GMT -->

</html>





<?php


if (isset($_POST['submit'])) {


  $cp_username = $_POST['cp_username'];
  $cp_password = md5($_POST['cp_password']);
  // $cp_password=$_POST['cp_password'];

  $sql = "SELECT * FROM tbl_cp WHERE cp_username='$cp_username' AND cp_password='$cp_password'";
  $res = mysqli_query($conn, $sql);

  if($res==TRUE){
    $count=mysqli_num_rows($res);
    if ($count == 1) {
      $_SESSION['login'] = "Login Sucessfull";
      $_SESSION['cp_user'] = $cp_username;


      echo ("<script>location.href = '" . SITEURL . "/cp/';</script>");
    } else {
  
      $_SESSION['login'] = "Login UNSucessfull";
      echo ("<script>location.href = '" . SITEURL . "/cp/login.php';</script>");
    }

    
    
  }
  
}

?>