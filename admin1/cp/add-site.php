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
?>






<!-- =====================HTML FORM =============================== -->
<!-- ===================================================================== -->



<section class="content-main" style="max-width:1200px">
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="content-header">
            <h2 class="content-title">Add Site</h2>
        </div>

        <div class="row mb-4">
            <div class="col-xl-8 col-lg-8">
                <div class="card mb-4">

                    <div class="card-body">

                        <div class="mb-4">
                            <label for="product_title" class="form-label">Property title</label>
                            <input type="text" placeholder="Type here" name="site_title" class="form-control" id="product_title" required>
                        </div>
                        <div class="mb-4">
                            <label for="product_brand" class="form-label">Address</label>
                            <input type="text" placeholder="Type here" name="site_address" class="form-control" id="product_brand" required>
                        </div>
                        <div class="row gx-3">
                            <div class="col-md-4  mb-3">
                                <label for="product_sku" class="form-label">City</label>
                                <input type="text" name="site_city" placeholder="Type here" class="form-control" id="product_sku" required>
                            </div>
                            <div class="col-md-4  mb-3">
                                <label for="product_color" class="form-label">State</label>
                                <input type="text" name="site_state" placeholder="Type here" class="form-control" id="product_color" required>
                            </div>
                            <div class="col-md-4  mb-3">
                                <label for="product_size" class="form-label">Country</label>
                                <input type="text" name="site_country" placeholder="Type here" class="form-control" id="product_size" required>
                            </div>
                        </div>

                    </div>
                </div> <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <label class="form-label">Description</label>
                            <textarea placeholder="Type here" name="site_about" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                </div> <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <label class="form-label">Property Image</label>
                            <input class="form-control" name="site_image" type="file" required>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <label class="form-label">Property Video</label>
                            <input class="form-control" name="file" type="file" >
                        </div>
                    </div>
                </div> <!-- card end// -->
            </div> <!-- col end// -->
            <aside class="col-xl-4 col-lg-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="form-label">Price (INR)</label>
                            <input type="text" name="site_prize" placeholder="Type here" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Area (sq-ft)</label>
                            <input type="text" name="site_area" placeholder="Type here" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Property category</label>
                            <select class="form-select" name="site_category">
                                <option value="Land">Land</option>    
                                <option value="House">House</option>
                                <option value="Apartment">Apartment</option>
                                <option value="Villas">Villas</option>
                                <option value="Commercial">Commercial</option>
                                <option value="Office">Office</option>
                            </select>
                        </div>


                        <hr>
                        <h5 class="mb-3">Ameneties</h5>
                        <div class="form-check">
                            <input class="form-check-input" name="ameneties[]" type="checkbox" value="Security" id="product-cat">
                            <label class="form-check-label" for="product-cat">Security </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ameneties[]" type="checkbox" value="Park " id="product-cat-1">
                            <label class="form-check-label" for="product-cat-1">Park </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ameneties[]" type="checkbox" value="Garden" id="product-cat-2">
                            <label class="form-check-label" for="product-cat-2"> Garden </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ameneties[]" type="checkbox" value="Kids play area" id="product-cat-3">
                            <label class="form-check-label" for="product-cat-3">Kids play area </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ameneties[]" type="checkbox" value="Parking" id="product-cat-4">
                            <label class="form-check-label" for="product-cat-4"> Parking </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ameneties[]" type="checkbox" value="Terrace" id="product-cat-5">
                            <label class="form-check-label" for="product-cat-5"> Terrace </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ameneties[]" type="checkbox" value="Power backup" id="product-cat-8">
                            <label class="form-check-label" for="product-cat-8"> Power backup </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="ameneties[]" type="checkbox" value="Swimming Pool " id="product-cat-9">
                            <label class="form-check-label" for="product-cat-9">Swimming Pool</label>
                        </div>
                    </div>
                </div> <!-- card end// -->
            </aside> <!-- col end// -->
        </div> <!-- row end// -->

        <div class="content-footer">
            <div>
                <input type="hidden" value="<?php echo $cp_id; ?>" placeholder="Type here" name="cp_id" class="form-control">
                <button type="submit" name="submit" class="btn btn-primary">Publish now</a>
            </div>
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
    $site_area = $_POST["site_area"];
    $cp_id =  $_POST["cp_id"];




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
            $_SESSION['upload'] = "Invalid file extension.";
        }
    } else {
        $_SESSION['upload'] = "Please select a file.";
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

            $_SESSION['upload'] = "<h1 class='fail'>Failed to add Image. Please try later!!</h1>";
            echo ("<script>location.href = '" . SITEURL . "/cp/properties.php';</script>");
            die();
        }
    } else {


        $site_image = "";
    }






    // ================================Sql Insert Query========================================
    // =================================================================================



    $sql = "INSERT INTO tbl_sites SET
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
         featured=1,
         site_area='$site_area',
         cp_id=$cp_id
    ";

    $res = mysqli_query($conn, $sql);


    if ($res == TRUE) {

        $_SESSION['add'] = "<h1 class='suc'>Property Uploaded successfully!!</h1>";
        echo ("<script>location.href = '" . SITEURL . "/cp/properties.php';</script>");
    } else {

        $_SESSION['add'] = "<h1 class='fail'>Some error occurs. Please try later!!</h1>";
        echo ("<script>location.href = '" . SITEURL . "/cp/properties.php';</script>");
    }
}
?>