<?php
include('partials/menu.php');


if (isset($_SESSION['add '])) {
    echo $_SESSION['add '];
    unset($_SESSION['add ']);
}

?>







<!-- =============================HTML FORM ==================================== -->
<!-- ==================================================================================== -->




<section class="content-main" style="max-width: 720px">

    <div class="content-header">
        <h2 class="content-title">Add New Team Member </h2>

    </div>

    <div class="card mb-4">
        <div class="card-body">




            <form method="POST" id="form2">

                <div class="mb-4">
                    <label for="product_name" class="form-label">Name</label>
                    <input type="text" placeholder="Type here" name="member_name" class="form-control" id="product_name">

                </div>



                <?php

                ?>



                <div class="mb-4">
                    <label class="form-label">Create Password</label>
                    <input type="password" placeholder="Type here" name="member_password" class="form-control" id="product_name">
                </div>


                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div> <!-- card end// -->

</section> <!-- content-main end// -->






<?php

function random_username($string)
{
    return vsprintf('%s%s%d', [...sscanf(strtolower($string), '%s %2s'), random_int(0, 10000)]);
}



if (isset($_POST['submit'])) {

    $member_name = $_POST["member_name"];
    $member_username = random_username($member_name);
    $member_password = md5( $_POST["member_password"]);


    // $sql = "INSERT INTO tbl_team SET
    // member_name='$member_name'
    // ";


    // $res = mysqli_query($conn, $sql);


    // ================================Sql Insert Query========================================
    // =================================================================================


    $check_sql = "SELECT * FROM tbl_team WHERE member_username='$member_username'";
    $check_res = mysqli_query($conn, $check_sql);
    if ($check_res == TRUE) {
        $check_count = mysqli_num_rows($check_res);
        if ($check_count > 0) {
            $_SESSION['add'] = "Username Already Taken";
            echo ("<script>location.href = '" . SITEURL . "/cp/add-team.php';</script>");
        } else {

            $sql = "INSERT INTO tbl_team SET
                member_name='$member_name',
                member_username='$member_username',
                member_password='$member_password',
                cp_id=$cp_id
                ";


            $res = mysqli_query($conn, $sql);



            if ($res == TRUE) {

                $_SESSION['add'] = "true";
                echo ("<script>location.href = '" . SITEURL . "/cp/team.php';</script>");
            } else {

                $_SESSION['add'] = "false";
                echo ("<script>location.href = '" . SITEURL . "/cp/team.php';</script>");
            }
        }
    }
}
?>