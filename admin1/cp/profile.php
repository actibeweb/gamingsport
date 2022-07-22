<?php
include('partials/menu.php');


if (isset($_SESSION['upload'])) {
  echo $_SESSION['upload'];
  unset($_SESSION['upload']);
}
if (isset($_SESSION['add'])) {
  echo $_SESSION['add'];
  unset($_SESSION['add']);
}
if (isset($_SESSION['update'])) {
  echo $_SESSION['update'];

  unset($_SESSION['update']);
}

if (isset($_SESSION['changed-password'])) {

  echo $_SESSION['changed-password'];
  unset($_SESSION['changed-password']);
}

if (isset($_SESSION['pwd-not-match'])) {
  echo $_SESSION['pwd-not-match'];
  unset($_SESSION['pwd-not-match']);
}

if (isset($_SESSION['user-not-found'])) {
  echo $_SESSION['user-not-found'];
  unset($_SESSION['user-not-found']);
}


?>


<!-- ===================PROFILE HTML FORM============================= -->
<!-- ================================================================ -->


<section class="content-main">

  <div class="content-header">
    <h2 class="content-title">Profile </h2>
  </div>


  <div class="card">
    <div class="card-body">
      <div class="row gx-5">

        <div class="col-lg-9">

          <section class="content-body p-xl-4">
            <form method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-8">
                  <div class="row gx-3">
                    <div class="col-6  mb-3">
                      <label class="form-label">First name</label>
                      <input class="form-control" value="<?php echo $first_name; ?>" name="first_name" type="text" placeholder="Type here" required>
                    </div> <!-- col .// -->
                    <div class="col-6  mb-3">
                      <label class="form-label">Last name</label>
                      <input class="form-control" name="last_name" value="<?php echo $last_name; ?>" type="text" placeholder="Type here" required>
                    </div> <!-- col .// -->

                    <div class="col-lg-12  mb-3">
                      <label class="form-label">Description</label>
                      <p class="form-label">Don't use '"/=! characters.</p>
                      <input class="form-control" type="text" value="<?php echo $cp_description; ?>" name="cp_description" placeholder="Type here">
                    </div> <!-- col .// -->

                    <div class="col-lg-6  mb-3">
                      <label class="form-label">Email</label>
                      <input class="form-control" name="email" value="<?php echo $email; ?>" type="email" placeholder="example@mail.com" required>
                    </div> <!-- col .// -->
                    <div class="col-lg-6  mb-3">
                      <label class="form-label">Phone</label>
                      <input class="form-control" name="number" type="tel" value="<?php echo $number; ?>" placeholder="+1234567890" required>
                    </div> <!-- col .// -->
                    <div class="col-lg-12  mb-3">
                      <label class="form-label">Address</label>
                      <input class="form-control" type="text" value="<?php echo $address; ?>" name="address" placeholder="Type here">
                    </div> <!-- col .// -->
                    <div class="col-lg-12  mb-3">
                      <label class="form-label">State</label>
                      <input class="form-control" type="text" value="<?php echo $state; ?>" name="state" placeholder="Type here">
                    </div> <!-- col .// -->
                    <div class="col-lg-6  mb-3">
                      <label class="form-label">Birthday</label>
                      <input class="form-control" value="<?php echo $birthdate; ?>" name="birthdate" type="date">
                    </div>


                  </div> <!-- row.// -->
                </div> <!-- col.// -->
                <aside class="col-lg-4">
                  <figure class="text-lg-center">
                    <img class="img-lg mb-3 img-avatar" src="./images/profile/<?php if (!$cp_image) {
                                                                                echo 'avatar.jpg';
                                                                              } else {
                                                                                echo $cp_image;
                                                                              } ?>" alt="User Photo">
                    <figcaption>
                      <!-- <a class="btn btn-outline-primary" href="#">
                        <i class="icons material-icons md-backup"></i> Upload
                      </a> -->
                      <input class="form-control" name="cp_image" type="file">
                      <input class="form-control" value="<?php echo $cp_id; ?>" name="cp_id" type="hidden">
                      <input class="form-control" value="<?php echo $cp_image; ?>" name="old_cp_image" type="hidden">
                      <input class="form-control" value="<?php echo $first_name; ?>" name="old_first_name" type="hidden">

                    </figcaption>
                  </figure>
                </aside> <!-- col.// -->
              </div> <!-- row.// -->
              <br>
              <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
            </form>

            <hr class="my-5">

            <div class="row" style="max-width:920px">
              <div class="col-md">
                <article class="box mb-3 bg-light">
                  <a class="btn float-end btn-light btn-sm" href="password.php">Change</a>
                  <h6>Password</h6>
                  <small class="text-muted d-block" style="width:70%">You can reset or change your password by clicking here</small>
                </article>
              </div> <!-- col.// -->
            </div> <!-- row.// -->


          </section> <!-- content-body .// -->

        </div> <!-- col.// -->
      </div> <!-- row.// -->

    </div> <!-- card body end// -->
  </div> <!-- card end// -->


</section> <!-- content-main end// -->


<?php
include('partials/footer.php');
?>




<!-- -------------------------  -->
<!-- ================Update Profile============ -->

<?php


if (isset($_POST['submit'])) {
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $email = $_POST["email"];
  $state = $_POST["state"];
  $number = $_POST["number"];
  $birthdate = $_POST["birthdate"];
  $cp_description = $_POST["cp_description"];
  $address = $_POST["address"];
  $cp_id = $_POST["cp_id"];
  $old_cp_image = $_POST["old_cp_image"];
  $old_first_name = $_POST["old_first_name"];


  // Upload Image Into local
  // =======================================

  if ($_FILES['cp_image']['size'] > 0) {


    // Delete Old Profile Image If Exist
    // ==================================

    $filePath = "./images/profile/" . $old_cp_image;
    if (file_exists($filePath)) {
      unlink($filePath);
    } else {
      echo "File does not exists";
    }


    // Upload New Image Locally
    // ===================================


    $cp_image = $_FILES['cp_image']['name'];
    $temp_img_name = $_FILES['cp_image']['tmp_name'];

    $folder = './images/profile/';
    $ext = end(explode('.', $cp_image));

    $cp_image = "CP_Profile_" . rand(000, 999) . '.' . $ext;

    $upload = move_uploaded_file($temp_img_name, $folder . $cp_image);



    // check if image upload Sucessfull
    // =============================================

    if ($upload == FALSE) {

      $_SESSION['upload'] = "Failed to upload Image!! Try Again";
      echo ("<script>location.href = '" . SITEURL . "/cp/profile.php';</script>");
      die();
    }
  } else {
    $cp_image = $old_cp_image;
  }



  // ========================Check if Profile already Exist ===============
  // =============================================================================


  if (empty($old_first_name)) {


    // =================Insert New Profile Data==========================
    // ===========================================================
    $sql = "INSERT INTO tbl_cp_profile SET
      first_name='$first_name',
      last_name='$last_name',
      email='$email',
      state='$state',
      number='$number',
      address='$address',
      birthdate='$birthdate',
      cp_image='$cp_image', 
      cp_description='$cp_description',
      cp_id=$cp_id
      ";



    $res = mysqli_query($conn, $sql);



    if ($res == TRUE) {



      // =======================Verify Profile =======================

      $verify_sql = "UPDATE tbl_cp SET
        verified=1
        WHERE cp_id=$cp_id
        ";

      $verify_res = mysqli_query($conn, $verify_sql);


      $_SESSION['add'] = "<h1 class='suc'>Done!! Profile Updated!!</h1>";
      echo ("<script>location.href = '" . SITEURL . "/cp/profile.php';</script>");
    } else {

      $_SESSION['add'] = "<h1 class='fail'>Sorry!! Try again</h1>";
      echo ("<script>location.href = '" . SITEURL . "/cp/profile.php';</script>");
    }
  } else {




    // Upload Old Profile Data=============================================
    // =====================================================================

    $sql = "UPDATE tbl_cp_profile SET
      first_name='$first_name',
      last_name='$last_name',
      email='$email',
      state='$state',
      number='$number',
      address='$address',
      birthdate='$birthdate',
      cp_description='$cp_description',
      cp_image='$cp_image'
      WHERE cp_id=$cp_id
      ";



    $res = mysqli_query($conn, $sql);



    if ($res == TRUE) {


      

      // =======================Verify Profile =======================

      $verify_sql = "UPDATE tbl_cp SET
        verified=1
        WHERE cp_id=$cp_id
        ";

      $verify_res = mysqli_query($conn, $verify_sql);


      $_SESSION['update'] = "<h1 class='suc'>Profile Updated!!</h1>";
      echo ("<script>location.href = '" . SITEURL . "/cp/profile.php';</script>");
    } else {

      $_SESSION['update'] = "<h1 class='fail'>Profile not Updated!! Try Again<h1>";
      echo ("<script>location.href = '" . SITEURL . "/cp/profile.php';</script>");
    }
  }
}
?>