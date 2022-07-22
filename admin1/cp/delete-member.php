<?php
include('partials/menu.php');
?>

<?php
echo  $member = $_GET['member'];
echo  $filename1 = $_GET['image'];


if(!empty($filename1)){
    
    $filePath1 = "./images/team/" . $filename1;
    if (file_exists($filePath1)) {
        unlink($filePath1);
        echo "File Successfully Delete.";
    } else {
        echo "File does not exists";
    }


}





$sql = "DELETE  FROM tbl_team WHERE member_username='$member'";


$res = mysqli_query($conn, $sql);



if ($res == TRUE) {


    // echo "Team Member Deleted";
    $_SESSION['delete'] = "<div class='colorText'>Blog Deleted Sucessfully<div>";
    echo ("<script>location.href = '" . SITEURL . "/cp/team.php';</script>");
} else {


    $_SESSION['delete'] = "Blog Deletion failure";
    echo ("<script>location.href = '" . SITEURL . "/cp/team.php';</script>");

    // echo "Team Member not deleted";

}



?>