<?php
include('partials/menu.php');
?>



<!-- =============================Visit Id, Site Id, CP id ==================================== -->
<!-- ==================================================================================== -->



<?php

$sale_id = $_GET['sale_id'];

$sql = "SELECT * FROM tbl_sales WHERE sale_id=$sale_id";
$res = mysqli_query($conn, $sql);

if ($res == TRUE) {
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        // echo "Admin Available";
        $row = mysqli_fetch_assoc($res);
        $site_id = $row['site_id'];
        $cp_id = $row['cp_id'];
        $sale_amount = $row['sale_amount'];
        $buyer_name = $row['buyer_name'];
        $cp_name = $row['cp_name'];
    }
}



?>



<section class="content-main" style="max-width: 720px">

    <div class="content-header">
        <h2 class="content-title">Sales Form </h2>
        <div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form method="POST">
                <div class="mb-4">
                    <label for="product_name" class="form-label"> Sales Amount</label>
                    <input type="text" placeholder="Type here" value=' <?php echo $sale_amount; ?>' name="sale_amount" class="form-control" id="product_name" readonly>
                    <input type="hidden" placeholder="Type here" name="sale_id" value="<?php echo $sale_id; ?>" class="form-control" id="product_name">

                </div>

                <div class="mb-4">
                    <label class="form-label">Buyer Name</label>
                    <input type="text" placeholder="Type here" name="buyer_name" value="<?php echo $buyer_name; ?>" class="form-control" id="product_name" readonly>
                </div>

                <div class="mb-4">
                    <label class="form-label">Channel Partner</label>
                    <input type="text" placeholder="Type here" name="cp_name" value="<?php echo $cp_name; ?>" class="form-control" id="product_name" readonly>
                </div>

                <div class="mb-4">
                    <label class="form-label">Select Agent </label>
                    <select class="form-select" name="member_username">



                        <!-- =====================All Agents of CP============================ -->
                        <!-- ================================================================-->


                        <?php
                        $sql = "SELECT *  FROM  tbl_team WHERE cp_id=$cp_id  ";
                        $res = mysqli_query($conn, $sql);

                        if ($res == TRUE) {

                            $count = mysqli_num_rows($res);


                            if ($count > 0) {
                                while ($rows = mysqli_fetch_assoc($res)) {
                                    $member_username = $rows["member_username"];
                                    $member_image = $rows["member_image"];

                        ?>

                                    <option value="<?php echo $member_username ?>"><?php echo $member_username ?></option>



                        <?php
                                }
                            } else {
                            }
                        }



                        ?>

                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Agent Profit [in Rs]</label>
                    <input type="text" placeholder="Type here" name="member_profit" class="form-control" id="product_name">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div> <!-- card end// -->

</section> <!-- content-main end// -->





<!-- -------------------------  -->
<!-- ================Sale Form Post ============ -->

<?php


if (isset($_POST['submit'])) {
    $member_username = $_POST["member_username"];
    $member_profit = $_POST["member_profit"];
    $sale_id = $_POST["sale_id"];
    date_default_timezone_set('Asia/Kolkata');
    $member_sale_time = date('Y-m-d H:i:s');;


    // =================Insert Sales Data==========================
    // ===========================================================
    $sql = "UPDATE  tbl_sales SET
      member_username='$member_username',
      member_sale_time='$member_sale_time',
      member_profit='$member_profit'
      WHERE sale_id=$sale_id
      ";

    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {


        // Add the money into member current achieved sales 
        $current_sale_sql = "SELECT *  FROM  tbl_team WHERE member_username='$member_username' AND cp_id=$cp_id";
        $current_sale_res = mysqli_query($conn, $current_sale_sql);

        if ($current_sale_res == TRUE) {

            $current_sale_count = mysqli_num_rows($current_sale_res);


            if ($current_sale_count == 1) {
                $current_sale_rows = mysqli_fetch_assoc($current_sale_res);
                $current_sale = $current_sale_rows['current_sale'];
            }
        }

        $int_current_sale = (float) $current_sale;

        $int_member_profit = (float) $member_profit;

        $new_current_sale = $int_current_sale + $int_member_profit;

        //   change int to string 

        $c_sale =  (string) $new_current_sale;


        $sql = "UPDATE tbl_team SET
        current_sale='$c_sale'
        WHERE member_username='$member_username'
        ";

        $res = mysqli_query($conn, $sql);

        if ($res == TRUE) {


            $_SESSION['add'] = "true";
            echo ("<script>location.href = '" . SITEURL . "/cp/sales.php';</script>");
        } else {
            $_SESSION['add'] = "false";
            echo ("<script>location.href = '" . SITEURL . "/cp/sales.php';</script>");
        }

        $_SESSION['add'] = "true";
        echo ("<script>location.href = '" . SITEURL . "/cp/sales.php';</script>");
    } else {
        $_SESSION['add'] = "false";
        echo ("<script>location.href = '" . SITEURL . "/cp/sales.php';</script>");
    }
}
?>

<?php
include('partials/footer.php');
?>