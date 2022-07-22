<?php
include('../config/constants.php');
include('login-check.php');
?>


<!-- =====================getting Channel Partner id==================== -->
<!-- ==============================================================-->


<?php

$member_username = $_SESSION['member_user'];

$sql = "SELECT * FROM tbl_team WHERE member_username='$member_username' ";
$res = mysqli_query($conn, $sql);

if ($res == TRUE) {
  $count = mysqli_num_rows($res);
  if ($count == 1) {
    // echo "Admin Available";
    $row = mysqli_fetch_assoc($res);
    $member_id = $row['member_id'];
    $cp_id = $row['cp_id'];
    $current_sale = $row['current_sale'];
  } else {
    echo ("<script>location.href = '" . SITEURL . "/member/login.php';</script>");
  }
}



// =============================Count of Sites==========================
// =================================================================

// $site_sql="SELECT * FROM tbl_sites WHERE member_id=$member_id";
//     $site_res=mysqli_query($conn,$site_sql);
// if($site_res==true){
// 	$site_count=mysqli_num_rows($site_res);
// }


// =============================Count of Sales==========================
// =================================================================

$sale_sql = "SELECT * FROM tbl_sales WHERE member_username='$member_username' AND cp_id=$cp_id";
$sale_res = mysqli_query($conn, $sale_sql);
if ($sale_res == true) {
  $sale_count = mysqli_num_rows($sale_res);
  $sale_count_in_rupees = 0;

  if ($sale_count > 0) {
    while ($rows = mysqli_fetch_assoc($sale_res)) {

      $member_profit = $rows["member_profit"];
      $sale_count_in_rupees += (float)$member_profit;
    }
  }else{
    $sale_count_in_rupees=0;

  }


} else {
  $sale_count = 0;
}








?>





<!-- =====================Fetch Channel Partner Profile date==================== -->
<!-- ==============================================================-->


<?php

$sql = "SELECT * FROM tbl_team WHERE member_username='$member_username'";
$res = mysqli_query($conn, $sql);

if ($res == TRUE) {
  $count = mysqli_num_rows($res);
  if ($count == 1) {
    // echo "Admin Available";
    $row = mysqli_fetch_assoc($res);
    $member_name = $row['member_name'];
    $member_address = $row['member_address'];
    $member_email = $row['member_email'];
    $member_phone = $row['member_phone'];
    $member_image = $row['member_image'];
  } else {
    $row = mysqli_fetch_assoc($res);

    $member_name = "";
    $member_address = "";
    $member_email = "";
    $member_number = "";
    $member_image = "";
  }
}
?>


<?php

$sql = "SELECT * FROM tbl_team WHERE member_username='$member_username' ";
$res = mysqli_query($conn, $sql);

if ($res == TRUE) {
	$count = mysqli_num_rows($res);
	if ($count == 1) {

		$row = mysqli_fetch_assoc($res);
		$level_id = $row['level_id'];

		// Get data for particuular level

		$level_sql = "SELECT * FROM tbl_business_plan WHERE level=$level_id";
		$level_res = mysqli_query($conn, $level_sql);

		if ($level_res == TRUE) {
			$level_count = mysqli_num_rows($level_res);
			if ($level_count == 1) {

				$level_row = mysqli_fetch_assoc($level_res);
				$level = $level_row['level'];
				$position = $level_row['position'];
				$incentive = $level_row['incentive'];
				$target = $level_row['target'];
				$salary = $level_row['salary'];



			} else {

				$level = 0;
				$position = '------';
				$incentive = 0;
				$target = 0;
				$salary = 0;

			
			}
		}
	} else {
		echo ("<script>location.href = '" . SITEURL . "/member/login.php';</script>");
	}

}


// ====================Check target and current sale ==========================


if($level != 11){
  
  $int_current = (float)$current_sale;
  $int_target = (float)$target;
  $new_level= $level +1;
  
  if($int_current >= $int_target){
  
     // Upgrade Level plus one  and current sale to Zero
  
     $sql="UPDATE tbl_team  SET
           current_sale='0',
           level_id=$new_level
           WHERE member_username='$member_username'
      ";
  
  
      $res= mysqli_query($conn,$sql) ;
  
  
  
      if($res==TRUE){
  
          $_SESSION['add']="true";
          echo("<script>location.href = '".SITEURL."/member/index.php';</script>");
  
      }
      else{
          $_SESSION['add']="false";
          echo("<script>location.href = '".SITEURL."/member/index.php';</script>");
      }
  
  
  }

}

?>




<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from www.ecommerce-admin.com/demo/page-index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Feb 2022 16:13:57 GMT -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>RealEstate - Marketing</title>

  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="css/bootstrapf9e3.css?v=1.1" rel="stylesheet" type="text/css" />

  <!-- custom style -->

  <link href="css/uif9e3.css?v=1.1" rel="stylesheet" type="text/css" />
  <link href="css/responsivef9e3.css?v=1.1" rel="stylesheet" />

  <!-- iconfont -->
  <link rel="stylesheet" href="fonts/material-icon/css/round.css" />

  <style>

    .suc{
      text-align: center;
    font-size: 20px;
    margin-top: 20px;
    color: #55bb55;
    }

    .fail{

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
        Member Admin

      </a>
      <div>
        <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i>
        </button>
      </div>
    </div> <!-- aside-top.// -->

    <nav>
      <ul class="menu-aside">
        <li class="menu-item active">
          <a class="menu-link" href="index.php"> <i class="icon material-icons md-home"></i>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li class="menu-item">
          <a class="menu-link" href="business.php"> <i class="icon material-icons md-house"></i>
            <span class="text">Your Business</span>
          </a>
        </li>
        <li class="menu-item">
          <a class="menu-link" href="sales.php"> <i class="icon material-icons md-shopping_cart"></i>
            <span class="text">Sales</span>
          </a>
        </li>
        <li class="menu-item">
          <a class="menu-link" href="profile.php"> <i class="icon material-icons md-person"></i>
            <span class="text">Profile</span>
          </a>
        </li>


      </ul>
      <hr>

      <br>
      <br>
    </nav>
  </aside>

  <main class="main-wrap">
    <header class="main-header navbar">
      <div class="col-search">
        <form class="searchform">
          <div class="input-group">
            <input list="search_terms" type="text" class="form-control" placeholder="Search term">
            <button class="btn btn-light bg" type="button"> <i class="material-icons md-search"></i>
            </button>
          </div>
          <datalist id="search_terms">
            <option value="Products">
            <option value="New orders">
            <option value="Apple iphone">
            <option value="Ahmed Hassan">
          </datalist>
        </form>
      </div>
      <div class="col-nav">
        <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="md-28 material-icons md-menu"></i> </button>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link btn-icon" onclick="darkmode(this)" title="Dark mode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
          </li>

          <li class="dropdown nav-item">
            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#"> <img class="img-xs rounded-circle" src="../cp/images/team/<?php if (empty($member_image)) {
                                                                                                                                        echo "avatar.jpg";
                                                                                                                                      } else {
                                                                                                                                        echo $member_image;
                                                                                                                                      } ?>" alt="User"></a>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="profile.php">My profile</a>

              <a class="dropdown-item text-danger" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </header>