<?php
include('partials/menu.php');
?>

<?php
echo  $site_id = $_GET['site_id'];
echo  $filename1 = $_GET['site_image'];
echo  $filename2 = $_GET['site_video'];


if(!empty($filename1)){
    
    $filePath1 = "./images/sites/" . $filename1;
    if (file_exists($filePath1)) {
        unlink($filePath1);
        echo "File Successfully Delete.";
    } else {
        echo "File does not exists";
    }


}

if(!empty($filename2)){
    
   
    $filePath2 = "./images/sites/" . $filename2;
    if (file_exists($filePath2)) {
        unlink($filePath2);
        echo "File Successfully Delete.";
    } else {
        echo "File does not exists";
    }

    
}    




$sql = "DELETE  FROM tbl_sites WHERE site_id=$site_id";


$res = mysqli_query($conn, $sql);



if ($res == TRUE) {


    // echo "Team Member Deleted";
    $_SESSION['delete'] = "<div class='colorText'>Blog Deleted Sucessfully<div>";
    echo ("<script>location.href = '" . SITEURL . "/cp/properties.php';</script>");
} else {


    $_SESSION['delete'] = "Blog Deletion failure";
    echo ("<script>location.href = '" . SITEURL . "/cp/properties.php';</script>");

    // echo "Team Member not deleted";

}



?>