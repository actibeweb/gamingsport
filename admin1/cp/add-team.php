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


                <div class="mb-4">
                    <label class="form-label">Create Password (Save password)</label>
                    <input type="password" placeholder="Type here" name="member_password" class="form-control" id="product_name">
                </div>


                <div class="mb-4">
                    <label class="form-label">Level</label>
                    <select class="form-select" name="level_id">
                        <option value="1">Executive</option>
                        <option value="2">Sales Executive</option>
                        <option value="3">Sr. Sale Manager</option>
                        <option value="4">Assistant Manager</option>
                        <option value="5">Manager</option>
                        <option value="6">Senior Manager</option>
                        <option value="7">Area Manager</option>
                        <option value="8">AGM Marketing</option>
                        <option value="9">GM Marketing</option>
                        <option value="10">AVP Marketing</option>
                        <option value="11">VP Marketing</option>
                    </select>
                </div>


                <div class="mb-4">
                    <label for="product_name" class="form-label">Adhaar Number</label>
                    <input type="text" placeholder="Type here" name="unique_id" class="form-control" id="product_name">
                </div>


                <div class="mb-4">
                    <label for="product_name" class="form-label">Email Address</label>
                    <input type="text" placeholder="Type here" name="member_email" class="form-control" id="product_name">
                </div>


                <div class="mb-4">
                    <label for="product_name" class="form-label">Phone Number</label>
                    <input type="text" placeholder="Type here" name="member_phone" class="form-control" id="product_name">
                </div>


                <div class="mb-4">
                    <label for="product_name" class="form-label">Address</label>
                    <textarea name="member_address" class="form-control" cols="30" rows="10"></textarea>
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
    $member_phone = $_POST["member_phone"];
    $member_email = $_POST["member_email"];
    $unique_id = $_POST["unique_id"];
    $member_address = $_POST["member_address"];
    $member_username = random_username($cp_name);
    $member_password = md5($_POST["member_password"]);
    $level_id = $_POST["level_id"];;


    // ===========================Check unique id===================================================
    // =============================================================================================


    $sql = "SELECT *  FROM  tbl_team  ";
    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {

        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {

                $unique_id_now = $rows['unique_id'];

                if ($unique_id == $unique_id_now) {

                    $_SESSION['add'] = "<h1 class='fail'>Sorry! This member is already in someone's group.</h1>";
                    echo ("<script>location.href = '" . SITEURL . "/cp/team.php';</script>");
                    $already_in = 1;
                }
                else{
                    $already_in=0;
                }
            }
        }
    }





    // ================================Sql Insert Query========================================
    // =================================================================================

    if ($already_in == 0) {

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
                unique_id='$unique_id',
                member_address='$member_address',
                member_email='$member_email',
                member_phone='$member_phone',
                level_id=$level_id,
                cp_id=$cp_id
                ";

                $res = mysqli_query($conn, $sql);



                if ($res == TRUE) {

                    $_SESSION['add'] = "<h1 class='suc'>Congrats!! New Member is now added in your team.</h1>";
                    echo ("<script>location.href = '" . SITEURL . "/cp/team.php';</script>");
                } else {

                    $_SESSION['add'] = "<h1 class='fail'>Sorry!!Team Member not added. Try later!!</h1>";
                    echo ("<script>location.href = '" . SITEURL . "/cp/team.php';</script>");
                }
            }
        }
    }
}
?>