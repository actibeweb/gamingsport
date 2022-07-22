<?php
include('partials/menu.php');
?>

<?php
if (isset($_SESSION['add '])) {
    echo $_SESSION['add '];
    unset($_SESSION['add ']);
}

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}





// =======================Get Site Id===============================
// ===========================================================

$site_id = $_GET['site_id'];



// =======================Fetch Site Data===============================
// ===========================================================


$sql = "SELECT * FROM tbl_sites WHERE site_id=$site_id";
$res = mysqli_query($conn, $sql);

if ($res == TRUE) {
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        // echo "Admin Available";
        $row = mysqli_fetch_assoc($res);
        $site_id = $row['site_id'];
        $site_title = $row["site_title"];
        $site_about = $row["site_about"];
        $site_prize = $row["site_prize"];
        $site_city = $row["site_city"];
        $site_state = $row["site_state"];
        $site_country = $row["site_country"];
        $site_address = $row["site_address"];
        $site_category = $row["site_category"];
        $site_image = $row["site_image"];
        $site_area = $row["site_area"];
        $site_video = $row["site_video"];
        $site_ameneties = $row["site_ameneties"];
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




<!-- =====================HTML FORM =============================== -->
<!-- ===================================================================== -->



<section class="content-main" style="max-width:1200px">
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="content-header">
            <h2 class="content-title">Edit Site</h2>
        </div>

        <div class="row mb-4">
            <div class="col-xl-8 col-lg-8">
                <div class="card mb-4">

                    <div class="card-body">

                        <div class="mb-4">
                            <label for="product_title" class="form-label">Property title</label>
                            <input type="text" placeholder="Type here" value="<?php echo $site_title; ?>" name="site_title" class="form-control" id="product_title">
                        </div>
                        <div class="mb-4">
                            <label for="product_brand" class="form-label">Address</label>
                            <input type="text" placeholder="Type here" value="<?php echo $site_address; ?>" name="site_address" class="form-control" id="product_brand">
                        </div>
                        <div class="row gx-3">
                            <div class="col-md-4  mb-3">
                                <label for="product_sku" class="form-label">City</label>
                                <input type="text" name="site_city" value="<?php echo $site_city; ?>" placeholder="Type here" class="form-control" id="product_sku">
                            </div>
                            <div class="col-md-4  mb-3">
                                <label for="product_color" class="form-label">State</label>
                                <input type="text" name="site_state" value="<?php echo $site_state; ?>" placeholder="Type here" class="form-control" id="product_color">
                            </div>
                            <div class="col-md-4  mb-3">
                                <label for="product_size" class="form-label">Country</label>
                                <input type="text" name="site_country" value="<?php echo $site_country; ?>" placeholder="Type here" class="form-control" id="product_size">
                            </div>
                        </div>

                    </div>
                </div> <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <label class="form-label">Description</label>
                            <textarea placeholder="Type here" name="site_about" class="form-control" row="4"><?php echo $site_about; ?></textarea>
                        </div>
                    </div>
                </div> <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <label class="form-label">Property Image</label>
                            <img class="form-control" src="./images/sites/<?php echo $site_image; ?>" alt="">
                            <input class="form-control" name="site_image" type="file">
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <label class="form-label">Property Video</label>
                            <video class="form-control" src="./images/sites/<?php echo $site_video; ?>" autoplay controls></video>
                            <input class="form-control" name="file" type="file">
                        </div>
                    </div>
                </div> <!-- card end// -->
            </div> <!-- col end// -->
            <aside class="col-xl-4 col-lg-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="form-label">Price (INR)</label>
                            <input type="text" name="site_prize" value="<?php echo $site_prize; ?>" placeholder="Type here" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Area (Sq-Ft)</label>
                            <input type="text" name="site_area" value="<?php echo $site_area; ?>" placeholder="Type here" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Property category</label>
                            <select class="form-select" name="site_category">
                                <option value="House">House</option>
                                <option value="<?php echo $site_category; ?>" selected><?php echo $site_category; ?></option>
                                <option value="Apartment">Apartment</option>
                                <option value="Villas">Villas</option>
                                <option value="Commercial">Commercial</option>
                                <option value="Office">Office</option>
                                <option value="Garage">Garage</option>
                            </select>
                        </div>


                        <hr>
                        <h5 class="mb-3">Ameneties</h5>

                        <?php
                        $site_ameneties_array = explode(',', $site_ameneties);

                        $sa_length = sizeof($site_ameneties_array);
                        $sa_var = 0;
                        foreach ($site_ameneties_array as $amenety) {
                            $sa_var++;
                            if ($sa_var == $sa_length) {
                            } else {

                        ?>
                                <div class="form-check">
                                    <input class="form-check-input" name="ameneties[]" type="checkbox" value="<?php echo $amenety; ?>" id="product-cat" checked>
                                    <label class="form-check-label" for="product-cat"><?php echo $amenety; ?> </label>
                                </div>

                        <?php
                            }
                        }

                        ?>




                    </div>
                </div> <!-- card end// -->
            </aside> <!-- col end// -->
        </div> <!-- row end// -->


        <div class="content-footer">
            <input type="hidden" value="<?php echo $cp_id; ?>" placeholder="Type here" name="cp_id" class="form-control">
            <input type="hidden" value="<?php echo $site_id; ?>" placeholder="Type here" name="site_id" class="form-control">
            <input type="hidden" value="<?php echo $site_image; ?>" placeholder="Type here" name="old_site_image" class="form-control">
            <input type="hidden" value="<?php echo $site_video; ?>" placeholder="Type here" name="old_site_video" class="form-control">
            <button type="submit" name="submit" class="btn btn-primary">Update now</a>

        </div>
    </form>


</section> <!-- content-main end// -->




<!-- ===============Footer================= -->

<?php
include('partials/footer.php');
?>





<!-- ===============================Store Form Data============================== -->
<!-- ============================================================================ -->


<?php


if (isset($_POST['submit'])) {

    $site_title = $_POST["site_title"];
    $site_about = $_POST["site_about"];
    $site_prize = $_POST["site_prize"];
    $site_city = $_POST["site_city"];
    $site_state = $_POST["site_state"];
    $site_country = $_POST["site_country"];
    $site_address = $_POST["site_address"];
    $site_category = $_POST["site_category"];
    $cp_id =  $_POST["cp_id"];
    $site_id = $_POST["site_id"];
    $site_area = $_POST["site_area"];
    $old_site_image = $_POST["old_site_image"];
    $old_site_video = $_POST["old_site_video"];




    // ===============ameneties array to string==================================


    $site_ameneties_array = $_POST['ameneties'];
    $site_ameneties = "";
    if ($site_ameneties_array != null && is_array($site_ameneties_array)) {
        foreach ($site_ameneties_array as $site_amenety) {
            $site_ameneties .= $site_amenety . ", ";
        }
    }



    // ==============Add Video============================
    // ====================================================

    $maxsize = 5242880;


    if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
        $name = $_FILES['file']['name'];
        $target_dir = "./images/sites/";
        $target_file = $target_dir . $_FILES["file"]["name"];
        $target_name =  $_FILES["file"]["name"];


        // Select file type
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");

        // Check extension
        if (in_array($extension, $extensions_arr)) {

            // Check file size
            if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                $_SESSION['message'] = "File too large. File must be less than 5MB.";
            } else {
                // Upload
                move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
            }
        } else {
            $_SESSION['message'] = "Invalid file extension.";
        }
    } else {
        $target_name = $old_site_video;
    }





    // =============Add site Image=========================================
    // ======================================================================

    if ($_FILES['site_image']['size'] > 0) {


        $site_image = $_FILES['site_image']['name'];
        $temp_img_name = $_FILES['site_image']['tmp_name'];

        $folder = './images/sites/';
        $ext = end(explode('.', $site_image));

        $site_image = "Site_Number_" . rand(000, 999) . '.' . $ext;

        $upload = move_uploaded_file($temp_img_name, $folder . $site_image);

        if ($upload == FALSE) {

            $_SESSION['add'] = "<h1 class='fail'>Property Details is not updated!! Please try later!!</h1>";
            echo ("<script>location.href = '" . SITEURL . "/cp/properties.php';</script>");
            die();
        }
    } else {


        $site_image = $old_site_image;
    }






    // ================================Sql Update Query========================================
    // =================================================================================


    $sql = "UPDATE tbl_sites SET
         site_title='$site_title',
         site_prize='$site_prize',
         site_about='$site_about',
         site_state='$site_state',
         site_city='$site_city',
         site_address='$site_address',
         site_country='$site_country',
         site_category='$site_category',
         site_image='$site_image',
         site_ameneties='$site_ameneties',
         site_video='$target_name',
         site_area='$site_area',
         cp_id=$cp_id
         WHERE site_id=$site_id
    ";

    $res = mysqli_query($conn, $sql);


    if ($res == TRUE) {
        $_SESSION['add'] = "<h1 class='suc'>Property Details Updated successfully!!</h1>";
        echo ("<script>location.href = '" . SITEURL . "/cp/properties.php';</script>");
    } else {

        $_SESSION['add'] = "<h1 class='fail'>Property Details is not updated!! Please try later!!</h1>";
        echo ("<script>location.href = '" . SITEURL . "/cp/properties.php';</script>");
    }
}
?>