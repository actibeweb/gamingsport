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
                        <div>
                            <label class="form-label">Property Image</label>
                            <input class="form-control" name="images[]" type="file" multiple="multiple" required>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <label class="form-label">Property Video</label>
                            <input class="form-control" name="files[]" type="file">
                        </div>
                    </div>
                </div> <!-- card end// -->
            </div> <!-- col end// -->
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
    // File upload configuration 
    $targetDir = "./images/sites/site-img/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['images']['name']);
    if (!empty($fileNames)) {
        foreach ($_FILES['images']['name'] as $key => $val) {
            // File upload path 
            $fileName = basename($_FILES['images']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server 
                if (move_uploaded_file($_FILES["images"]["tmp_name"][$key], $targetFilePath)) {
                    // Image db insert sql 
                    $insertValuesSQL .= "('" . $fileName . "', 10),";
                } else {
                    $errorUpload .= $_FILES['images']['name'][$key] . ' | ';
                }
            } else {
                $errorUploadType .= $_FILES['images']['name'][$key] . ' | ';
            }
        }

        // Error message 
        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
        $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
        $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database 

            $sql = "INSERT INTO tbl_site_images  (site_image, site_id) VALUES $insertValuesSQL";

            $res = mysqli_query($conn, $sql);



            // $insert = $db->query("INSERT INTO tbl_site_images (site_image, site_id) VALUES $insertValuesSQL");
            if ($res) {
                $statusMsg = "Files are uploaded successfully." . $errorMsg;
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = "Upload failed! " . $errorMsg;
        }
    } else {
        $statusMsg = 'Please select a file to upload.';
    }
}










if (isset($_POST['submity'])) {
    $j = 0; //Variable for indexing uploaded image 

    $target_path = "./images/sites/"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) { //loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png"); //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i])); //explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable

        $target_path = $target_path . md5(uniqid()) .
            "." . $ext[count($ext) - 1]; //set the target path with a new name of image
        $j = $j + 1; //increment the number of uploaded images according to the images in array       

        if (($_FILES["file"]["size"][$i] < 100000) //Approx. 100kb images can be uploaded.
            && in_array($file_extension, $validextensions)
        ) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) { //if file moved to uploads folder
                echo $j .
                    ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else { //if file was not moved.
                echo $j .
                    ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else { //if file size and file type was incorrect.
            echo $j .
                ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }
}

if (isset($_POST['submitt'])) {

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
        $_SESSION['message'] = "Please select a file.";
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

            $_SESSION['upload'] = "Failed to upload Image";
            echo ("<script>location.href = '" . SITEURL . "/cp/add-site.php';</script>");
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
         site_area='$site_area',
         cp_id=$cp_id
    ";

    $res = mysqli_query($conn, $sql);


    if ($res == TRUE) {

        $_SESSION['add'] = "true";
        echo ("<script>location.href = '" . SITEURL . "/cp/add-site.php';</script>");
    } else {

        $_SESSION['add'] = "false";
        echo ("<script>location.href = '" . SITEURL . "/cp/add-site.php';</script>");
    }
}
?>