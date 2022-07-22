<?php
include('../config/constants.php');
include('login-check.php');
?>


<!-- =====================getting Channel Partner id==================== -->
<!-- ==============================================================-->


<?php

$cp_username = $_SESSION['cp_user'];

$sql = "SELECT * FROM tbl_cp WHERE cp_username='$cp_username'";
$res = mysqli_query($conn, $sql);

if ($res == TRUE) {
  $count = mysqli_num_rows($res);
  if ($count == 1) {
    // echo "Admin Available";
    $row = mysqli_fetch_assoc($res);
    $cp_id = $row['cp_id'];
    $cp_name= $row['cp_name'];
    $verified = $row['verified'];
  } else {
    echo ("<script>location.href = '" . SITEURL . "/cp/login.php';</script>");
  }
}



// =============================Count of Sites==========================
// =================================================================

$site_sql = "SELECT * FROM tbl_sites WHERE cp_id=$cp_id";
$site_res = mysqli_query($conn, $site_sql);
if ($site_res == true) {
  $site_count = mysqli_num_rows($site_res);
}




// =============================Count of Sales==========================
// =====================================================================



$team_sql = "SELECT * FROM tbl_team WHERE cp_id=$cp_id";
$team_res = mysqli_query($conn, $team_sql);
if ($team_res == true) {
  $team_count = mysqli_num_rows($team_res);
}




// ===================Club Sales===========================

$club_sql = "SELECT * FROM tbl_club WHERE cp_id=$cp_id";
$club_res = mysqli_query($conn, $club_sql);
if ($club_res == true) {
  $club_count = mysqli_num_rows($club_res);
  if($club_count>0){
    $club_rows = mysqli_fetch_assoc($club_res);
    $club_incentive = $club_rows["club_incentive"];
  }
}





$sale_sql = "SELECT * FROM tbl_sales WHERE  cp_id=$cp_id";
$sale_res = mysqli_query($conn, $sale_sql);
if ($sale_res == true) {
  $sale_count = mysqli_num_rows($sale_res);
  $sale_count_in_rupees = 0;

  if ($sale_count > 0) {
    while ($rows = mysqli_fetch_assoc($sale_res)) {

      $sale_amount = $rows["sale_amount"];
      $sale_count_in_rupees += (float)$sale_amount;
    }
  } else {
    $sale_count_in_rupees = 0;
  }
} else {
  $sale_count = 0;
}






?>





<!-- =====================Fetch Channel Partner Profile date==================== -->
<!-- ==============================================================-->


<?php

$sql = "SELECT * FROM tbl_cp_profile WHERE cp_id=$cp_id";
$res = mysqli_query($conn, $sql);

if ($res == TRUE) {
  $count = mysqli_num_rows($res);
  if ($count == 1) {
    // echo "Admin Available";
    $row = mysqli_fetch_assoc($res);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $address = $row['address'];
    $birthdate = $row['birthdate'];
    $cp_description = $row['cp_description'];
    $email = $row['email'];
    $number = $row['number'];
    $cp_image = $row['cp_image'];
    $state = $row['state'];
    $club = $row['club'];
  } else {
    $row = mysqli_fetch_assoc($res);

    $first_name = "";
    $last_name = "";
    $address = "";
    $birthdate = "";
    $email = "";
    $number = "";
    $cp_image = "";
  }
}
?>








<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from www.ecommerce-admin.com/demo/page-index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Feb 2022 16:13:57 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>RealEstate Marketing</title>

  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

  <link href="css/bootstrapf9e3.css?v=1.1" rel="stylesheet" type="text/css" />

  <!-- custom style -->

  <link href="css/uif9e3.css?v=1.1" rel="stylesheet" type="text/css" />
  <link href="css/responsivef9e3.css?v=1.1" rel="stylesheet" />

  <!-- iconfont -->
  <link rel="stylesheet" href="fonts/material-icon/css/round.css" />


  <style>
    .suc {
      text-align: center;
      font-size: 20px;
      margin-top: 20px;
      color: #55bb55;
    }

    .fail {

      text-align: center;
      font-size: 20px;
      margin-top: 20px;
      color: red;
    }
  </style>


</head>

<body>

  <b class="screen-overlay"></b>

  <aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
      <a href="index.php" class="brand-wrap" style="font-size: 2vw;text-decoration: none;">
        CP Admin

      </a>
      <div>
        <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i>
        </button>
      </div>
    </div> <!-- aside-top.// -->

    <nav>


    <!-- ============================================== -->
<?php

if($verified){
?>


  <ul class="menu-aside">
    <li class="menu-item active">
      <a class="menu-link" href="index.php"> <i class="icon material-icons md-home"></i>
        <span class="text">Dashboard</span>
      </a>
    </li>
    <li class="menu-item">
      <a class="menu-link" href="properties.php"> <i class="icon material-icons md-house"></i>
        <span class="text">Properties</span>
      </a>
    </li>
    <li class="menu-item">
      <a class="menu-link" href="sales.php"> <i class="icon material-icons md-shopping_cart"></i>
        <span class="text">Sales</span>
      </a>
    </li>
    <li class="menu-item">
      <a class="menu-link" href="add-site.php"> <i class="icon material-icons md-add_box"></i>
        <span class="text">Add Property</span>
      </a>
    </li>
  
  
    <li class="menu-item">
      <a class="menu-link" href="team.php"> <i class="icon material-icons md-comment"></i>
        <span class="text">Team</span>
      </a>
    </li>
  
    <li class="menu-item">
      <a class="menu-link" href="profile.php"> <i class="icon material-icons md-comment"></i>
        <span class="text">Profile</span>
      </a>
    </li>
  
  
  </ul>
<?php
}
else{

  ?>

<ul class="menu-aside">
    <li class="menu-item active">
      <a class="menu-link" href="index.php"> <i class="icon material-icons md-home"></i>
        <span class="text">Dashboard</span>
      </a>
    </li>
  
  
    <li class="menu-item">
      <a class="menu-link" href="profile.php"> <i class="icon material-icons md-comment"></i>
        <span class="text">Profile</span>
      </a>
    </li>
  
  
  </ul>

<?php

}
?>
      <hr>

      <br>
      <br>
    </nav>
  </aside>

  <main class="main-wrap">
    <header class="main-header navbar">
      <div class="col-search">

      </div>
      <div class="col-nav">
        <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="md-28 material-icons md-menu"></i> </button>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link btn-icon" onclick="darkmode(this)" title="Dark mode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
          </li>

          <li class="dropdown nav-item">
            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#"> <img class="img-xs rounded-circle" src="images/profile/<?php if (empty($cp_image)) {
                                                                                                                                    echo "avatar.jpg";
                                                                                                                                  } else {
                                                                                                                                    echo $cp_image;
                                                                                                                                  } ?>" alt="User"></a>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="profile.php">My profile</a>

              <a class="dropdown-item text-danger" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </header>