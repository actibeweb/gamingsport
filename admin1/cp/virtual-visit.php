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
                            <label class="form-label">Select Multiple Images</label>
                            <input class="form-control" name="images[]" type="file" multiple="multiple" required>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <label class="form-label">Select Multiple Videos</label>
                            <input class="form-control" name="files[]" type="file" multiple="multiple" required>
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






    // ==============Add Videos==================================================
    // ==========================================================================


    $last_id = $_GET['site_id'];

    // File upload configuration 
    $targetDir = "./images/sites/site-vid/";
    $allowTypes = array("mp4", "avi", "3gp", "mov", "mpeg");

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames)) {
        foreach ($_FILES['files']['name'] as $key => $val) {
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server 
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                    // Image db insert sql 
                    $insertValuesSQL .= "('" . $fileName . "', '" . $last_id . "' ),";
                } else {
                    $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                }
            } else {
                $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
            }
        }

        // Error message 
        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
        $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
        $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            // Insert image file name into database 

            $sql = "INSERT INTO tbl_site_videos (site_video, site_id) VALUES $insertValuesSQL";

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




    // =============Add site Image=========================================
    // ======================================================================

    

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
                      $insertValuesSQL .= "('" . $fileName . "',  '" . $last_id . "'),";
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
?>


