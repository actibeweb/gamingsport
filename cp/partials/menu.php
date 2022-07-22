


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